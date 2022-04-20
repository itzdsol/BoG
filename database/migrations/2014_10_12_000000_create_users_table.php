<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('app_version', 50)->nullable()->default(null);
            $table->string('profile_pic')->nullable()->default(null);
            //$table->string('dial_code', 50)->nullable()->default(null);
            //$table->string('phone', 20)->nullable()->default(null);
            //$table->date('dob')->nullable()->default(null);
            $table->string('login_type', 50)->nullable()->default('email');
            $table->string('provider_id')->nullable()->default(null);
            $table->unsignedBigInteger('user_type')->nullable()->default(1);
            $table->string('is_email_verified', 50)->nullable()->default('false');
            $table->string('device_id')->nullable()->default(null);
            $table->string('device_model')->nullable()->default(null);
            $table->string('os', 50)->nullable()->default(null);
            $table->string('fb_uid')->nullable()->default(null);
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->string('reset_password_code', 10)->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
