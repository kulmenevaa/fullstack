<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'surname'           => 'Kulmenev',
            'name'              => 'Andrey',
            'patronymic'        => 'Alexandrovich',
            'phone'             => '+7 (000) 000 00 00',
            'email'             => 'andrey.kulmenev@yandex.ru',
            'email_verified_at' => now(),
            'password'          => Hash::make('12345678'),
            'role_id'           => Role::where('name', 'admin')->first()->id
        ]);
    }
}
