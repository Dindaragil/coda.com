<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            // 'id' => '',
            'nama_lengkap' => 'Elon Musk',
            'email' => 'inielon@musk.com',
            // 'password' => md5('112233'),
            'password' => Hash::make('112233'),
            'alamat' => 'mars',
            'type' => 'admin'
        ]);
    }
}
