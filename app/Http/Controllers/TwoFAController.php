<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Session, DB;
use App\Models\UserCode;
  
class TwoFAController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('2fa');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'code1'=>'required',
            'code2'=>'required',
            'code3'=>'required',
            'code4'=>'required',
        ]);

        $code = (int)$request->code1.$request->code2.$request->code3.$request->code4;
        $find = UserCode::where('user_id', auth()->user()->id)
                        ->where('code', $code)
                        ->where('updated_at', '>=', now()->subMinutes(2))
                        ->first();
  
        if (!is_null($find)) {
            DB::table('user_codes')->where('id', $find->id)->delete();
            Session::put('user_2fa', auth()->user()->id);
            if(auth()->user()->user_type==2){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('home');
            }
        }
  
        return back()->with('error', 'You entered wrong code.');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resend()
    {
        auth()->user()->generateCode();
  
        return back()->with('success', 'We sent you code on your email.');
    }
}