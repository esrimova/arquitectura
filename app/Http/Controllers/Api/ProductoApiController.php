<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductoApiController extends Controller
{
    public function productosProximosAVencer(Request $request)
    {
        $dias = $request->query('dias', 15); // Valor por defecto: 15 días

        $fechaLimite = Carbon::now()->addDays($dias);

        $productos = Producto::whereDate('fecha_vencimiento', '<=', $fechaLimite)
                             ->orderBy('fecha_vencimiento', 'asc')
                             ->get();

        if ($productos->isEmpty()) {
            return response()->json(['estado' => 'ok', 'data' => []], 204);
        }

        return response()->json([
            'estado' => 'ok',
            'data' => $productos
        ]);
    }
}
