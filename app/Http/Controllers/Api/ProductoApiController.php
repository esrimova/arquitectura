<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    public function productosProximosAVencer(Request $request)
    {
        // Simulación fija para entrega sin base de datos
        return response()->json([
            'estado' => 'ok',
            'data' => [
                [
                    'id' => 1,
                    'nombre' => 'Leche entera',
                    'categoria' => 'Lácteos',
                    'fecha_vencimiento' => '2025-04-25',
                    'stock' => 8
                ],
                [
                    'id' => 2,
                    'nombre' => 'Pan integral',
                    'categoria' => 'Panadería',
                    'fecha_vencimiento' => '2025-04-23',
                    'stock' => 12
                ]
            ]
        ]);
    }
}
