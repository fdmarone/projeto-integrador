<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $users = User::when($q, fn($s) =>
                $s->where('name','like',"%$q%")->orWhere('email','like',"%$q%"))
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('admin.users.index', compact('users','q'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'  => ['required','string','max:255'],
            'email' => ['required','email','max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update($data);
        return redirect()->route('admin.users.index')->with('ok','Usuário atualizado.');
    }

    public function toggleAdmin(User $user)
    {
        $user->is_admin = ! (bool) $user->is_admin;
        $user->save();

        return back()->with('ok', 'Permissão de admin atualizada.');
    }

    public function destroy(User $user)
    {
        abort_if(auth()->id() === $user->id, 403); // não apagar a si mesmo
        $user->delete();

        return back()->with('ok','Usuário removido.');
    }
}
