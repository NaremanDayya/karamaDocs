<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@karamadata.ai');
        $password = env('ADMIN_PASSWORD', 'karama-admin-2026');

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'مسؤول الأكاديمية',
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ]
        );

        $this->command?->warn("Admin login seeded — email: {$email} / password: {$password} (change this before going live).");
    }
}
