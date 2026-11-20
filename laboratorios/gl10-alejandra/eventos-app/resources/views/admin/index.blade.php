<x-layout>
    <h1 class="text-2xl font-bold mb-6">Panel de Administración</h1>

    <div class="bg-white rounded-xl border shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="p-3">ID</th>
                    <th class="p-3">Nombre</th>
                    <th class="p-3">Correo</th>
                    <th class="p-3">Rol</th>
                    <th class="p-3">Eventos creados</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr class="border-b">
                        <td class="p-3">{{ $usuario->id }}</td>
                        <td class="p-3">{{ $usuario->name }}</td>
                        <td class="p-3">{{ $usuario->email }}</td>
                        <td class="p-3">{{ $usuario->rol }}</td>
                        <td class="p-3">{{ $usuario->eventos_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>