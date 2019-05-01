<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); // полное очищение таблицы пользователей и обнуление инкремента ключа id
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@example.com';
        $user->email_verified_at = now(); 
        $user->password =  Hash::make('123456'); 
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
