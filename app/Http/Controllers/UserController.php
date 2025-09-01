<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('name')->paginate(10);

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'                   => 'required|string|max:255',
            'email'                  => 'required|email|max:255|unique:users,email',
            'role'                   => ['required', Rule::in(['admin', 'estudiante'])],
            'estado'                 => 'required|string', 
            'password'               => 'required|string|min:8|confirmed',
        ]);


       User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role ?? 'estudiante', // por defecto estudiante
        'estado' => $request->estado ?? 'activo', // por defecto activo
    ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

   
    public function show(User $usuario)
    {
       
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
    
        $validated = $request->validate([
            'name'                   => 'required|string|max:255',
            'email'                  => ['required','email','max:255', Rule::unique('users','email')->ignore($usuario->id)],
            'role'                   => ['required', Rule::in(['admin', 'estudiante'])],
            'estado'                 => 'required|string', 
            'password'               => 'nullable|string|min:8|confirmed',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['is_active'] = (bool) ($validated['is_active'] ?? true);

        $usuario->update($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $usuario)
    {
        // Opcional: evitar eliminar al usuario autenticado, comentar si no aplica
        // if (auth()->check() && auth()->id() === $usuario->id) {
        //     return redirect()->route('usuarios.index')->with('error', 'No puedes eliminar tu propia cuenta.');
        // }

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
