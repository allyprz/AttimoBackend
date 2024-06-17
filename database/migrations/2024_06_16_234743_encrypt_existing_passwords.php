<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class EncryptExistingPasswords extends Migration
{

    //php artisan migrate:refresh --step=1 --path=/database/migrations/2024_06_16_234743_encrypt_existing_passwords.php
    public function up()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            $encryptedPassword = bcrypt($user->password);
            DB::table('users')
                ->where('id', $user->id)
                ->update(['password' => $encryptedPassword]);
        }
    }

    public function down()
    {

    }
}
