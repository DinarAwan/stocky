<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin123'),
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            'name'=>'manager gudang',
            'email'=>'manager.gudang@gmail.com',
            'password'=>Hash::make('manager123'),
            'role' => 'manager_gudang'
        ]);
        DB::table('users')->insert([
            'name'=>'staf gudang',
            'email'=>'staf.gudang@gmail.com',
            'password'=>Hash::make('staf123'),
            'role' => 'staf_gudang'
        ]);
    }
}
