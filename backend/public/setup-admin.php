<?php
// Temporary admin creation script.
// WARNING: remove this file after use.

// Check secret
$secret = getenv('ADMIN_SETUP_SECRET');
if (empty($secret) || !isset($_GET['secret']) || $_GET['secret'] !== $secret) {
    http_response_code(403);
    echo 'Forbidden';
    exit;
}

$email = $_GET['email'] ?? getenv('ADMIN_EMAIL') ?? 'admin@example.com';
$password = $_GET['password'] ?? getenv('ADMIN_PASSWORD') ?? null;
if (empty($password)) {
    http_response_code(400);
    echo 'Password required via ?password= or ADMIN_PASSWORD env var';
    exit;
}

require __DIR__ . '/autoload.php';
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Bootstrap the framework so Eloquent and models work
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Create or update user
$hash = password_hash($password, PASSWORD_BCRYPT);
$user = \App\Models\User::updateOrCreate(
    ['email' => $email],
    [
        'name' => 'Administrateur',
        'password' => $hash,
        'is_admin' => true,
        'email_verified_at' => date('Y-m-d H:i:s'),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ]
);

header('Content-Type: application/json');
echo json_encode(['status' => 'ok', 'email' => $user->email]);
