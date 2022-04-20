<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Firebase\Auth\Token\Exception\InvalidToken;
//use Kreait\Firebase\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Auth\SignInResult\SignInResult;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use Crypt;
use Hash;
use Validator;
use File;
use Mail;
use DB;

class UserController extends BaseController
{
    public $successStatus = 200;
    public function __constructor(){
        #$this->middleware('auth:api');
    }

    public function signup(Request $request)
    {
        $input = $request->json()->all();
        $validator = Validator::make($request->json()->all(), [
            'loginType' => [
                'required',
                Rule::in(['google', 'fb', 'apple']),
            ],
        ]);
        if ($validator->fails()) {
            return $this->sendError('Invalid loginType field');
        }

        if (!isset($input['email']) && empty($input['email'])) {
            return $this->sendError('The email field is required.');
        }

        if (!isset($input['authentication']) && empty($input['authentication'])) {
            return $this->sendError('The authentication field is required.');
        }

        if ($input['loginType']=="email" && !isset($input['password']) && empty($input['password'])) {
            return $this->sendError('The password field is required.');
        }

        if ($input['authentication'] == "0" && $input['loginType']=="email" && !isset($input['first_name']) && empty($input['first_name'])) {
            return $this->sendError('The first name field is required.');
        }

        if ($input['authentication'] == "0"){
            if (User::where('email', base64_decode($input['email']))->exists()) {
                return $this->sendError('email already exists');
            }
        }

        if ($input['authentication'] == "1"){
            if (!User::where('email', base64_decode($input['email']))->exists()) {
                return $this->sendError('Email is not registered!');
            }
        }

        if (User::where('email', base64_decode($input['email']))->exists()) {
            $user = User::where('email', base64_decode($input['email']))->first();
            if($input['loginType']=="email"){
                if(isset($input['password'])){
                    if(Auth::attempt(
                        ['email' => base64_decode($input['email']),
                        'password' => base64_decode($input['password'])
                        ]
                    )){
                        $user = Auth::user();
                        $user_id = $user->id;
                        $api_token = Str::random(60);

                        $os_type = isset($input['os']) ? $input['os'] : $user->os;
                        $device_id = isset($input['deviceId']) ? $input['deviceId'] : $user->device_id;

                        User::where('id', $user_id)->update(['api_token' => $api_token,'login_type'=>$input['loginType'],
                        'device_id'=>$device_id,'os'=>$os_type]);

                        $success['token'] = $api_token;
                        $success['first_name'] = $user->first_name;
                        $success['last_name'] = $user->last_name;
                        $success['email'] = $user->email;
                        $success['login_type'] = $input['loginType'];
                        return $this->sendResponse($success, 'User login successfully.');
                    } else{
                        return $this->sendError('Incorrect password.');
                    }
                }else{
                    return $this->sendError('please enter your password.');
                }
            }else{
                //if(User::where(['email'=> base64_decode($input['email']),'login_type'=>$input['loginType']])->exists()){
                    $user_id = $user->id;
                    $api_token = Str::random(60);

                    $os_type = isset($input['os']) ? $input['os'] : $user->os;
                    $device_id = isset($input['deviceId']) ? $input['deviceId'] : $user->device_id;

                    User::where('id', $user_id)->update(['api_token' => $api_token,'login_type'=>$input['loginType'],
                    'device_id'=>$device_id,'os'=>$os_type]);

                    $success['token'] = $api_token;
                    $success['first_name'] = $user->first_name;
                    $success['last_name'] = $user->last_name;
                    $success['email'] = $user->email;
                    $success['login_type'] = $input['loginType'];
                    return $this->sendResponse($success, 'User login successfully.');
                /* }else{
                    return $this->sendError('email is register with another login account');
                } */

            }
        }else{
            $api_token = Str::random(60);

            if ($input['loginType']=="email" && !isset($input['password'])) {
                return $this->sendError('Validation Error.', ['password'=>['The password field is required.']], 401);
            }

            $input['first_name'] = isset($input['first_name']) ? $input['first_name'] : '';
            $input['last_name'] = isset($input['last_name']) ? $input['last_name'] : '';
            $input['email'] = base64_decode($input['email']);
            $input['password'] = isset($input['password']) ? bcrypt(base64_decode($input['password'])) : '';
            $input['app_version'] = isset($input['appVersion']) ? $input['appVersion'] : NULL;
            $input['login_type'] = isset($input['loginType']) ? $input['loginType'] : NULL;
            $input['provider_id'] = isset($input['providerId']) ? $input['providerId'] : NULL;
            $input['device_id'] = isset($input['deviceId']) ? $input['deviceId'] : NULL;
            $input['is_email_verified'] = isset($input['isEmailVerified']) ? $input['isEmailVerified'] : NULL;
            $input['device_model'] = isset($input['deviceModel']) ? $input['deviceModel'] : NULL;
            $input['fb_uid'] = isset($input['uid']) ? $input['uid'] : NULL;
            $input['os'] = isset($input['os']) ? $input['os'] : NULL;
            $input['api_token'] = $api_token;
            $user = User::create($input);
            if($user){
                $success['token'] =  $api_token;
                $success['first_name'] = $user->first_name;
                $success['last_name'] = $user->last_name;
                $success['email'] = $user->email;
                $success['login_type'] = $user->login_type;
                return $this->sendResponse($success, 'User register successfully.');
            }else{

            }
        }
    }

    public function emailsignup(Request $request)
    {
        $input = $request->json()->all();
        $validator = Validator::make($request->json()->all(), [
            'loginType' => [
                'required',
                Rule::in(['email']),
            ],
        ]);
        if ($validator->fails()) {
            return $this->sendError('Invalid loginType field');
        }

        if (!isset($input['email']) && empty($input['email'])) {
            return $this->sendError('The email field is required.');
        }

        if (!isset($input['authentication']) && empty($input['authentication'])) {
            return $this->sendError('The authentication field is required.');
        }

        if ($input['loginType']=="email" && !isset($input['password']) && empty($input['password'])) {
            return $this->sendError('The password field is required.');
        }

        if ($input['authentication'] == "0" && $input['loginType']=="email" && !isset($input['first_name']) && empty($input['first_name'])) {
            return $this->sendError('The first name field is required.');
        }

        if ($input['authentication'] == "0"){
            if (User::where('email', base64_decode($input['email']))->exists()) {
                return $this->sendError('email already exists');
            }
        }

        if ($input['authentication'] == "1"){
            if (!User::where('email', base64_decode($input['email']))->exists()) {
                return $this->sendError('Email is not registered!');
            }
        }

        if (User::where('email', base64_decode($input['email']))->exists()) {
            $user = User::where('email', base64_decode($input['email']))->first();
            if($input['loginType']=="email"){
                if(isset($input['password'])){
                    if(Auth::attempt(
                        ['email' => base64_decode($input['email']),
                        'password' => base64_decode($input['password'])
                        ]
                    )){
                        $user = Auth::user();
                        $user_id = $user->id;
                        $api_token = Str::random(60);

                        if($user->is_email_verified == "false"){
                            //$code = random_int(1000, 9999);
                            //User::where('id', $user->id)->update(['reset_password_code' => $code]);

                            /* $message = 'For email verified  use this otp: '.$code;
                            $details = [
                                'title' => 'Mail from stillmanapp.com',
                                'body' => $message
                            ];

                            Mail::to(base64_decode($input['email']))->send(new \App\Mail\MyTestMail($details)); */


                            $response = [
                                'success' => "2",
                                'message' => "email is not verified.",
                                //"data" => ["code" => (string)$code]
                            ];
                            return response()->json($response, 200);

                            //return $this->sendError($success ,'email is not verified.');
                        }

                        $os_type = isset($input['os']) ? $input['os'] : $user->os;
                        $device_id = isset($input['deviceId']) ? $input['deviceId'] : $user->device_id;

                        User::where('id', $user_id)->update(['api_token' => $api_token,'login_type'=>$input['loginType'],
                        'device_id'=>$device_id,'os'=>$os_type]);

                        $success['token'] = $api_token;
                        $success['first_name'] = $user->first_name;
                        $success['last_name'] = $user->last_name;
                        $success['email'] = $user->email;
                        //$success['dob'] = Carbon::createFromFormat('Y-m-d', $user->dob)->format('m/d/Y');
                        //$success['dial_code'] = $user->dial_code;
                        //$success['phone'] = $user->phone;
                        //$success['authentication'] = "1";
                        $success['login_type'] = $input['loginType'];
                        //$success['profile_pic'] = $user->profile_pic;
                        return $this->sendResponse($success, 'User login successfully.');
                    } else{
                        /* $code = random_int(1000, 9999);
                        User::where('id', $user->id)->update(['reset_password_code' => $code]);

                        $message = 'For email verified  use this otp: '.$code;
                        $details = [
                            'title' => 'Mail from stillmanapp.com',
                            'body' => $message
                        ];

                        Mail::to(base64_decode($input['email']))->send(new \App\Mail\MyTestMail($details));

                        //$success['code'] = (string)$code;
                        $response = [
                            'success' => "2",
                            'message' => "email is not verified.",
                            "data" => ["code" => (string)$code]
                        ];
                        return response()->json($response, 404); */
                        return $this->sendError('Incorrect password.');
                    }
                }else{
                    return $this->sendError('please enter your password.');
                }
            }else{
                //if(User::where(['email'=> base64_decode($input['email']),'login_type'=>$input['loginType']])->exists()){
                    $user_id = $user->id;
                    $api_token = Str::random(60);

                    $os_type = isset($input['os']) ? $input['os'] : $user->os;
                    $device_id = isset($input['deviceId']) ? $input['deviceId'] : $user->device_id;

                    User::where('id', $user_id)->update(['api_token' => $api_token,'login_type'=>$input['loginType'],
                    'device_id'=>$device_id,'os'=>$os_type]);

                    $success['token'] = $api_token;
                    $success['name'] = $user->name;
                    $success['email'] = $user->email;
                    //$success['dob'] = Carbon::createFromFormat('Y-m-d', $user->dob)->format('d/m/Y');
                    //$success['dial_code'] = $user->dial_code;
                    //$success['phone'] = $user->phone;
                    $success['login_type'] = $input['loginType'];
                    //$success['profile_pic'] = $user->profile_pic;
                    return $this->sendResponse($success, 'User login successfully.');
                /* }else{
                    return $this->sendError('email is register with another login account');
                } */

            }
        }else{
            $api_token = Str::random(60);

            if ($input['loginType']=="email" && !isset($input['password'])) {
                return $this->sendError('Validation Error.', ['password'=>['The password field is required.']], 401);
            }
            //$code = random_int(1000, 9999);
            $input['first_name'] = isset($input['first_name']) ? $input['first_name'] : '';
            $input['last_name'] = isset($input['last_name']) ? $input['last_name'] : '';
            $input['email'] = base64_decode($input['email']);
            $input['password'] = isset($input['password']) ? bcrypt(base64_decode($input['password'])) : '';
            //$input['phone'] = isset($input['phone']) ? base64_decode($input['phone']) : NULL;
            //$input['dob'] = isset($input['dob']) ? Carbon::createFromFormat('d/m/Y', $input['dob'])->format('Y-m-d') : NULL;
            $input['app_version'] = isset($input['appVersion']) ? $input['appVersion'] : NULL;
            $input['login_type'] = isset($input['loginType']) ? $input['loginType'] : NULL;
            //$input['profile_pic'] = isset($input['profilePic']) ? $input['profilePic'] : NULL;
            $input['provider_id'] = isset($input['providerId']) ? $input['providerId'] : NULL;
            $input['device_id'] = isset($input['deviceId']) ? $input['deviceId'] : NULL;
            $input['is_email_verified'] = isset($input['isEmailVerified']) ? $input['isEmailVerified'] : NULL;
            $input['device_model'] = isset($input['deviceModel']) ? $input['deviceModel'] : NULL;
            $input['fb_uid'] = isset($input['uid']) ? $input['uid'] : NULL;
            $input['os'] = isset($input['os']) ? $input['os'] : NULL;
            //$input['dial_code'] = isset($input['dialCode']) ? base64_decode($input['dialCode']) : NULL;
            //$input['reset_password_code'] = $code;
            $input['api_token'] = $api_token;
            $user = User::create($input);
            if($user){

                /* $message = 'For email verified  use this otp: '.$code;
                $details = [
                    'title' => 'Mail from stillmanapp.com',
                    'body' => $message
                ];
                Mail::to(base64_decode($input['email']))->send(new \App\Mail\MyTestMail($details)); */

                //$success['code'] = (string)$code;
                $success['token'] =  $api_token;
                $success['first_name'] = $user->first_name;
                $success['last_name'] = $user->last_name;
                $success['email'] = $user->email;
                //$success['dob'] = Carbon::createFromFormat('Y-m-d', $user->dob)->format('d/m/Y');
                //$success['dial_code'] = $user->dial_code;
                //$success['phone'] = $user->phone;
                $success['login_type'] = $user->login_type;
                //$success['profile_pic'] = $user->profile_pic;
                return $this->sendResponse($success, 'User register successfully.');
            }else{

            }
        }
    }

    public function email_verify(Request $request)
    {
        $input = $request->json()->all();
        if (!isset($input['email']) && empty($input['email'])) {
            return $this->sendError('The email field is required.');
        }

        if (!isset($input['code']) && empty($input['code'])) {
            return $this->sendError('The code field is required.');
        }

        if (User::where('email',$input['email'])->exists()) {
            $user = User::where(['email'=> $input['email'],'reset_password_code'=>$input['code']])->first();
            if($user){

                $api_token = Str::random(60);
                User::where('id', $user->id)->update(['reset_password_code' => '','is_email_verified'=>'true','api_token' => $api_token]);

                $success['token'] = $api_token;
                $success['first_name'] = $user->first_name;
                $success['last_name'] = $user->last_name;
                $success['email'] = $user->email;
                $success['login_type'] = $user->login_type;
                //$success['dob'] = Carbon::createFromFormat('Y-m-d', $user->dob)->format('d/m/Y');
                //$success['dial_code'] = $user->dial_code;
                //$success['phone'] = $user->phone;
                //$success['profile_pic'] = $user->profile_pic;

                return $this->sendResponse($success, 'login and email verify successfully .');

                /* User::where('id', $user->id)->update(['reset_password_code' => '','is_email_verified'=>'true']);
                $success['login_type'] = $user->login_type;
                $success['uid'] = $user->fb_uid;
                return $this->sendResponse($success, 'email verify successfully.'); */
            }else{
                return $this->sendError('invalid OTP.');
            }
        }else{
            return $this->sendError('email address not found.');
        }
    }

    public function resend_email_otp(Request $request)
    {
        $input = $request->json()->all();
        if (!isset($input['email']) && empty($input['email'])) {
            return $this->sendError('The email field is required.');
        }

        if (!isset($input['loginType']) && empty($input['loginType'])) {
            return $this->sendError('The loginType field is required.');
        }

        if (User::where('email',$input['email'])->exists()) {
            if($input['loginType'] == "email"){
                $user = User::where(['email'=> $input['email'],'login_type'=>$input['loginType']])->first();
                if($user){
                    $code = random_int(1000, 9999);
                    User::where('id', $user->id)->update(['reset_password_code' => $code]);

                    $message = 'For email verified  use this otp: '.$code;

                    $details = [
                        'title' => 'Mail from bog.com',
                        'body' => $message
                    ];

                    Mail::to($input['email'])->send(new \App\Mail\MyTestMail($details));

                    $success['code'] = (string)$code;
                    $success['login_type'] = $user->login_type;
                    $success['uid'] = $user->fb_uid;
                    return $this->sendResponse($success, 'OTP has been sent on register email.');
                }else{
                    return $this->sendError('This email is associated with another provider login.');
                }
            }else{
                return $this->sendError('This email is associated with another provider login.');
            }
        }else{
            return $this->sendError('email address not found.');
        }
    }

    public function email_check(Request $request)
    {
        $input = $request->json()->all();
        if (!isset($input['email']) && empty($input['email'])) {
            return $this->sendError('The email field is required.');
        }

        if (User::where('email',$input['email'])->exists()) {
            $user = User::where('email', $input['email'])->first();

            $success['loginType'] = $user->login_type;
            $success['uid'] = $user->fb_uid;
            return $this->sendResponse($success, 'email is validate successfully!!');
        }else{
            return $this->sendError('email address not found.');
        }
    }

    public function send_otp(Request $request)
    {
        $input = $request->json()->all();
        if (!isset($input['email']) && empty($input['email'])) {
            return $this->sendError('The email field is required.');
        }

        if (!isset($input['loginType']) && empty($input['loginType'])) {
            return $this->sendError('The loginType field is required.');
        }

        if (User::where('email',$input['email'])->exists()) {
            if($input['loginType'] == "email"){
                $user = User::where(['email'=> $input['email'],'login_type'=>$input['loginType']])->first();
                if($user){
                    $code = random_int(1000, 9999);
                    User::where('id', $user->id)->update(['reset_password_code' => $code]);

                    $message = 'For reset password  use this otp: '.$code;

                    $details = [
                        'title' => 'Mail from bog.com',
                        'body' => $message
                    ];

                    Mail::to($input['email'])->send(new \App\Mail\MyTestMail($details));

                    $success['code'] = (string)$code;
                    $success['login_type'] = $user->login_type;
                    $success['uid'] = $user->fb_uid;
                    return $this->sendResponse($success, 'OTP has been sent on register email.');
                }else{
                    return $this->sendError('This email is associated with another provider login.');
                }
            }else{
                return $this->sendError('This email is associated with another provider login.');
            }
        }else{
            return $this->sendError('email address not found.');
        }
    }

    public function otp_verify(Request $request)
    {
        $input = $request->json()->all();
        if (!isset($input['email']) && empty($input['email'])) {
            return $this->sendError('The email field is required.');
        }

        if (!isset($input['code']) && empty($input['code'])) {
            return $this->sendError('The code field is required.');
        }

        if (User::where('email',$input['email'])->exists()) {
            $user = User::where(['email'=> $input['email'],'reset_password_code'=>$input['code']])->first();
            if($user){
                User::where('id', $user->id)->update(['reset_password_code' => '']);
                $success['login_type'] = $user->login_type;
                $success['uid'] = $user->fb_uid;
                return $this->sendResponse($success, 'OTP is valid.');
            }else{
                return $this->sendError('invalid OTP.');
            }
        }else{
            return $this->sendError('email address not found.');
        }
    }

    public function reset_password(Request $request)
    {
        $input = $request->json()->all();
        if (!isset($input['email']) && empty($input['email'])) {
            return $this->sendError('The email field is required.');
        }

        if (!isset($input['uid']) && empty($input['uid'])) {
            return $this->sendError('The uid field is required.');
        }

        if (!isset($input['password']) && empty($input['password'])) {
            return $this->sendError('The password field is required.');
        }

        if (User::where('email',$input['email'])->exists()) {
            $user = User::where(['email' => $input['email'],'fb_uid'=>$input['uid']])->first();
            if($user){
                User::where('id', $user->id)->update(['password' => bcrypt($input['password'])]);

                $success['login_type'] = $user->login_type;
                $success['uid'] = $user->fb_uid;
                return $this->sendResponse($success, 'Password has been reset successfully.');
            }else{
                return $this->sendError('uid not matched.');
            }
        }else{
            return $this->sendError('email address not found.');
        }
    }
}
