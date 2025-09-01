@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-warning">✏️ Editar Usuario</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña (opcional)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>


                <div class="mb-3">
                    <label class="form-label">Rol</label>
                    <select name="role" class="form-select">
                        <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                        <option value="estudiante" {{ $usuario->role == 'estudiante' ? 'selected' : '' }}>Estudiante</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="activo" {{ $usuario->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ $usuario->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">💾 Actualizar</button>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">⬅ Volver</a>
            </form>
        </div>
    </div>
</div>
@endsection
