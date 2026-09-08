<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (!$email || !$password) {
            $this->command->warn(
                'ADMIN_EMAIL ou ADMIN_PASSWORD n\'est pas configuré. Seeder admin ignoré.'
            );

            return;
        }

        User::updateOrCreate(
            [
                'email' => $email,
            ],
            [
                'name' => 'Administrateur',
                'password' => Hash::make($password),
                'is_admin' => true,
            ]
        );

        $this->command->info("Compte administrateur créé/mis à jour : {$email}");
    }
}
