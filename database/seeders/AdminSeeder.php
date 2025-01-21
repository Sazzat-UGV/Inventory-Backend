<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'              => 'Asikul Islam Sazzat',
            'email'             => 'admin@gmail.com',
            'phone'             => '01700000000',
            'email_verified_at' => now(),
            'password'          => Hash::make(1234),
            'remember_token'    => Str::random(10),
        ]);
    }
}
