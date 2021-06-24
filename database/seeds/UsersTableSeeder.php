<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'dob' => '1991-11-05',
            'password' => \Hash::make('admin123')
        ]);
        $admin->roles()->attach(1);
        $subadmin = User::create([
            'name' => 'subadmin',
            'email' => 'subadmin@admin.com',
            'dob' => '1991-11-05',
            'password' => \Hash::make('admin123')
        ]);
        $subadmin->roles()->attach(2);
        $user = User::create([
            'name' => 'user',
            'email' => 'user@admin.com',
            'dob' => '1991-11-05',
            'password' => \Hash::make('admin123')
        ]);
        $user->roles()->attach(3);
    }
}
