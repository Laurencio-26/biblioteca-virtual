@extends('layouts.app') {{-- Usa tu layout principal --}}

@section('content')
<div class="container mt-4">

    {{-- ✅ Mensajes de estado --}}
    @if (session('status') === 'profile-updated')
        <div class="alert alert-success">
            ✅ {{ __('Tu perfil ha sido actualizado correctamente.') }}
        </div>
    @elseif (session('status') === 'password-updated')
        <div class="alert alert-success">
            🔒 {{ __('Tu contraseña ha sido actualizada.') }}
        </div>
    @elseif (session('status') === 'profile-deleted')
        <div class="alert alert-danger">
            ⚠️ {{ __('Tu cuenta ha sido eliminada.') }}
        </div>
    @endif

    <div class="row">
        {{-- Información del perfil --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        {{-- Cambiar contraseña --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

    {{-- Eliminar cuenta --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-danger">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
