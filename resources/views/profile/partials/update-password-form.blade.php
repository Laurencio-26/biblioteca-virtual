<section>
    <header>
        <h2 class="h5 text-primary">
            {{ __('Cambiar Contraseña') }}
        </h2>
        <p class="text-muted">
            {{ __('Asegúrate de usar una contraseña segura.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        {{-- Contraseña actual --}}
        <div class="mb-3">
            <label for="current_password" class="form-label">{{ __('Contraseña actual') }}</label>
            <input type="password" name="current_password" id="current_password" class="form-control">
            @error('current_password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Nueva contraseña --}}
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Nueva contraseña') }}</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Confirmación --}}
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Confirmar contraseña') }}</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            @error('password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">{{ __('Guardar cambios') }}</button>
    </form>
</section>
