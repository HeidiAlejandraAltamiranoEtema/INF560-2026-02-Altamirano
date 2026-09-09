<?php

namespace App\Http\Controllers;

class TiendaController extends Controller
{
    // Catálogo
    public function index()
    {
        return view('tienda.index', [
            'tienda'     => $this->tienda(),
            'categorias' => $this->categorias(),
            'productos'  => $this->productos(),
        ]);
    }

    // Detalle de un producto (BONUS)
    public function show(int $id)
    {
        $producto = collect($this->productos())->firstWhere('id', $id);

        abort_if(is_null($producto), 404);

        return view('tienda.show', [
            'tienda'   => $this->tienda(),
            'producto' => $producto,
        ]);
    }

    // Datos estáticos
    private function tienda(): array
    {
        return ['nombre' => 'ByteStore', 'lema' => 'Tecnología que rinde'];
    }

    private function categorias(): array
    {
        return ['Audio', 'Cómputo', 'Accesorios', 'Wearables'];
    }

    private function productos(): array
    {
        return [
            [
                'id' => 1, 'nombre' => 'Auriculares Aura X200', 'categoria' => 'Audio',
                'precio' => 249.90, 'stock' => 8, 'destacado' => true,
                'imagen' => 'https://picsum.photos/seed/aura200/600/400',
                'descripcion' => 'Cancelación activa de ruido y 30 h de batería.'
            ],
            [
                'id' => 2, 'nombre' => 'Teclado Mecánico Nova K87', 'categoria' => 'Cómputo',
                'precio' => 320.00, 'stock' => 5, 'destacado' => false,
                'imagen' => 'https://picsum.photos/seed/novak87/600/400',
                'descripcion' => 'Switches táctiles e iluminación RGB por tecla.'
            ],
            [
                'id' => 3, 'nombre' => 'Mouse Ergonómico Glide M6', 'categoria' => 'Accesorios',
                'precio' => 95.50, 'stock' => 0, 'destacado' => false,
                'imagen' => 'https://picsum.photos/seed/glidem6/600/400',
                'descripcion' => 'Diseño vertical que reduce la fatiga de muñeca.'
            ],
            [
                'id' => 4, 'nombre' => 'Smartwatch Pulse S3', 'categoria' => 'Wearables',
                'precio' => 540.00, 'stock' => 3, 'destacado' => true,
                'imagen' => 'https://picsum.photos/seed/pulses3/600/400',
                'descripcion' => 'Monitor de ritmo cardíaco y GPS integrado.'
            ],
            [
                'id' => 5, 'nombre' => 'Parlante Bluetooth Boom Mini', 'categoria' => 'Audio',
                'precio' => 180.00, 'stock' => 15, 'destacado' => false,
                'imagen' => 'https://picsum.photos/seed/boommini/600/400',
                'descripcion' => 'Resistente al agua IPX7, 12 h de reproducción.'
            ],
            [
                'id' => 6, 'nombre' => 'Cámara Web Clara 1080', 'categoria' => 'Accesorios',
                'precio' => 130.00, 'stock' => 0, 'destacado' => false,
                'imagen' => 'https://picsum.photos/seed/clara1080/600/400',
                'descripcion' => 'Full HD con enfoque automático y micrófono dual.'
            ],
        ];
    }
}