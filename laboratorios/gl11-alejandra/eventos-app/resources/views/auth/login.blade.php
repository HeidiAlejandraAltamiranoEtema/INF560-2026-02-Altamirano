<x-layout>
    <div class="max-w-md mx-auto bg-white p-6 rounded-xl border shadow-sm">
        <h1 class="text-2xl font-bold mb-4">Iniciar sesión</h1>

        @if ($errors->any())
            <div class="mb-4 rounded bg-red-100 p-3 text-red-800 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Correo</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Contraseña</label>
                <input type="password" name="password" required class="w-full border rounded px-3 py-2">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Entrar
            </button>
        </form>
    </div>
</x-layout>