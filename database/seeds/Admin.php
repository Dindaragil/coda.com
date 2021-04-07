<?php

use Illuminate\Database\Seeder;

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
            'id' => '1',
            'nama_lengkap' => 'Elon Musk',
            'email' => 'ceritanyainielon@musk.com',
            'password' => md5('112233'),
            'alamat' => 'mars',
            'type' => 'admin'
        ]);
    }
}
