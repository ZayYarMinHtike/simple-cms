<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Manager;
use App\User;

class AdminManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'name'  => 'thiha',
            'email' => 'thiha@gmail.com',
            'password'  => Hash::make("123456"),
            'is_super'  => true
        ]);

        Manager::create([
            'name'  => 'zymh',
            'email' => 'zymh@gmail.com',
            'password'  => Hash::make("123456"),
            'is_manager'  => true
        ]);

        User::create([
            'name' => 'koko',
            'email' => 'koko@gmail.com',
            'password' => Hash::make("123456"),
        ]);

        User::create([
            'name' => 'popo',
            'email' => 'popo@gmail.com',
            'password' => Hash::make("123456"),
        ]);

        
    }
}
