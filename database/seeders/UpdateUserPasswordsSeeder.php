<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UpdateUserPasswordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        foreach ($users as $user) {
            // Eğer şifre md5 ise, bcrypt ile güncelle
            if (strlen($user->password) === 32) {  // MD5 hash'in uzunluğu 32 karakterdir
                // Şifreyi bcrypt ile hash'le
                $user->password = Hash::make($user->password);
                $user->save();
            }
        }
    }
}
