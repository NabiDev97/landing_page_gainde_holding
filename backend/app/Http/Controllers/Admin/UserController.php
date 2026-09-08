<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\StreamedResponse;

class UserController extends Controller
{
    public function index()
    {
        $q = request('q');
        $is_admin = request('is_admin');

        $query = User::query();
        if ($q) {
            $query->where(function($s) use ($q) {
                $s->where('name', 'like', "%{$q}%")->orWhere('email', 'like', "%{$q}%");
            });
        }
        if ($is_admin !== null && $is_admin !== '') {
            $query->where('is_admin', (bool)$is_admin);
        }

        // Export CSV
        if (request('export') === 'csv') {
            $users = $query->orderBy('id')->get();
            $filename = 'users-' . date('Ymd_His') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            ];

            $callback = function() use ($users) {
                $out = fopen('php://output', 'w');
                fputcsv($out, ['id','name','email','is_admin','created_at']);
                foreach ($users as $u) {
                    fputcsv($out, [$u->id, $u->name, $u->email, $u->is_admin ? '1' : '0', $u->created_at]);
                }
                fclose($out);
            };

            return response()->stream($callback, 200, $headers);
        }

        $users = $query->orderBy('id', 'desc')->paginate(20)->withQueryString();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'sometimes|boolean',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => isset($data['is_admin']) ? (bool)$data['is_admin'] : false,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'sometimes|boolean',
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->is_admin = isset($data['is_admin']) ? (bool)$data['is_admin'] : false;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour.');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé.');
    }
}
