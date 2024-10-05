<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class S03_UserSeeder extends Seeder
{
    public static function run(): void
    {
        User::create([
            'username' => 'AB1ADMIN',
            'name' => 'admin',
            'email' => 'admin@aaran.com',
            'usertype' => 'admin',
            'password' => bcrypt('123456789'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'username' => 'AB0001',
            'name' => 'sundar',
            'email' => 'sundar@sundar.com',
            'password' => bcrypt('kalarani'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'username' => 'AB0002',
            'name' => 'Developer',
            'email' => 'developer@aaran.org',
            'password' => bcrypt('123456789'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);


        User::create([
            'username' => 'AB0003',
            'name' => 'audit',
            'email' => 'audit@aaran.org',
            'password' => bcrypt('123456789'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

//        User::create([
//            'name' => 'Jagadeesh',
//            'email' => 'Jagadeesh@aaran.org',
//            'password' => bcrypt('123456789'),
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//            'tenant_id' => '1',
//            'role_id' => '1'
//        ]);
//
//        User::create([
//            'name' => 'Divya',
//            'email' => 'divya@aaran.org',
//            'password' => bcrypt('123456789'),
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//            'tenant_id' => '1',
//            'role_id' => '1'
//        ]);
//
//        User::create([
//            'name' => 'Alagiri Sankar',
//            'email' => 'alagiri@aaran.org',
//            'password' => bcrypt('123456789'),
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//            'tenant_id' => '1',
//            'role_id' => '1'
//        ]);
    }
}
