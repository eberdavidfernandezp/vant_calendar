<x-guest-layout>

    <!-- Logo de Vant con control de tamaño absoluto por estilo CSS -->
    <div class="flex justify-center mb-6">
        <a href="/" class="flex justify-center w-full">
            <div style="width: 180px;" class="transition-transform duration-300 hover:scale-105">
                <x-application-logo class="w-full h-auto text-[#1C1C1E]" />
            </div>
        </a>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Contenedor del Botón con Animación en Cascada (Oculto hasta llenar campos) -->
        <div id="loginSubmitContainer" class="flex items-center justify-end mt-4 opacity-0 -translate-y-4 max-h-0 overflow-hidden pointer-events-none transition-all duration-500 ease-out">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <x-primary-button class="ms-3 bg-[#5A738E] hover:bg-[#5A738E]/80 text-[#F0F1F2]">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Script para detectar campos llenos y activar la animación en cascada -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const submitContainer = document.getElementById('loginSubmitContainer');

            function checkFormFields() {
                const isEmailFilled = emailInput.value.trim() !== '';
                const isPasswordFilled = passwordInput.value.trim() !== '';

                if (isEmailFilled && isPasswordFilled) {
                    // Despliega el botón suavemente hacia abajo (Efecto Cascada)
                    submitContainer.classList.remove('opacity-0', '-translate-y-4', 'max-h-0', 'pointer-events-none');
                    submitContainer.classList.add('opacity-100', 'translate-y-0', 'max-h-20');
                } else {
                    // Oculta el botón replegándolo hacia arriba
                    submitContainer.classList.remove('opacity-100', 'translate-y-0', 'max-h-20');
                    submitContainer.classList.add('opacity-0', '-translate-y-4', 'max-h-0', 'pointer-events-none');
                }
            }

            // Escuchar cambios en tiempo real
            emailInput.addEventListener('input', checkFormFields);
            passwordInput.addEventListener('input', checkFormFields);

            // Verificación inicial por si el navegador autocompleta
            setTimeout(checkFormFields, 200);
        });
    </script>
</x-guest-layout>