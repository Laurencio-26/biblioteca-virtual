<section>
    <header>
        <h2 class="h5 text-danger">
            {{ __('Eliminar Cuenta') }}
        </h2>
        <p class="text-muted">
            ⚠️ {{ __('Una vez que elimines tu cuenta, todos tus datos y recursos se borrarán permanentemente.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
        @csrf
        @method('delete')

        {{-- Contraseña --}}
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
            <input type="password" name="password" id="password" 
                   class="form-control" placeholder="Ingresa tu contraseña">
            @error('password', 'userDeletion') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Botones --}}
        <button type="submit" class="btn btn-danger"
                onclick="return confirm('⚠️ ¿Seguro que deseas eliminar tu cuenta?')">
            {{ __('Eliminar definitivamente') }}
        </button>
    </form>
</section>
