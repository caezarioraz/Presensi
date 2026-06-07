<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
    Admin::create([
        'username' => 'admin',
        'password' => Hash::make('123456')
    ]);

    Mahasiswa::create([
        'nim' => '2021001',
        'nama' => 'Budi',
        'password' => Hash::make('123456')
    ]);
}