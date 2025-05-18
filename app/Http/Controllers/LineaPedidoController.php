<?php

namespace App\Http\Controllers;

use App\Models\LineaPedido;
use Illuminate\Http\Request;

class LineaPedidoController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'nombre_carta' => 'required|string|max:255',
            'codigo' => 'required|string|max:100',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0'
        ]);

        $linea = LineaPedido::create($data);

        return response()->json(['success' => true, 'linea' => $linea]);
    }

    public function update(Request $request, LineaPedido $linea)
    {
        $data = $request->validate([
            'nombre_carta' => 'required|string|max:255',
            'codigo' => 'required|string|max:100',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0'
        ]);

        $linea->update($data);

        return response()->json(['success' => true, 'linea' => $linea]);
    }

    public function destroy(LineaPedido $linea)
    {
        $linea->delete();
        return response()->json(['success' => true]);
    }
}
?>