<section>
    <header>
        <h2 class="h5 text-primary">
            {{ __('Información del Perfil') }}
        </h2>
        <p class="text-muted">
            {{ __("Actualiza tu nombre, correo electrónico y tu foto de perfil.") }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('patch') 

      {{-- Foto de perfil --}}
<div class="mb-3 text-center">

    {{-- Imagen actual o por defecto --}}
    <div class="position-relative d-inline-block">
        <img id="preview-avatar"
             src="{{ $user->avatar ? asset('storage/' . $user->avatar) 
                 : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=0D8ABC&color=fff&size=80' }}"
             class="rounded-circle shadow-sm mb-2"
             width="120" height="120"
             style="object-fit: cover;">

        {{-- Icono de cámara encima --}}
        <label for="avatar" class="position-absolute bottom-0 end-0 bg-dark text-white rounded-circle p-2"
               style="cursor:pointer;">
            <i class="bi bi-camera"></i>
        </label>
    </div>

    {{-- Input oculto para seleccionar archivo --}}
    <input type="file" class="form-control mt-2 d-none" name="avatar" id="avatar" accept="image/*">

    <small class="text-muted d-block">Formatos permitidos: JPG, PNG (máx 2MB)</small>
    @error('avatar') <div class="text-danger">{{ $message }}</div> @enderror
</div>

{{-- Script para vista previa --}}
<script>
    document.getElementById('avatar').addEventListener('change', function (event) {
        let reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview-avatar').src = e.target.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    });
</script>



        {{-- Nombre --}}
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input id="name" name="name" type="text" 
                   class="form-control" value="{{ old('name', $user->name) }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Correo --}}
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Correo electrónico') }}</label>
            <input id="email" name="email" type="email" 
                   class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Botón --}}
        <button class="btn btn-primary">{{ __('Guardar cambios') }}</button>
    </form>
</section>
