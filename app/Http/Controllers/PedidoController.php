<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function index()
    {
        return response()->json(Pedido::with('lineas', 'cliente')->get());
    }

    public function show($id)
    {
        $pedido = Pedido::with('lineas', 'cliente')->findOrFail($id);
        return response()->json($pedido);
    }

    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required|numeric|min:0',
            'gastos_envio' => 'required|numeric|min:0'
        ]);

        $pedido = Pedido::create([
            'cliente_id' => Auth::id(),
            'total' => $request->total,
            'gastos_envio' => $request->gastos_envio
        ]);

        return response()->json(['success' => true, 'pedido' => $pedido]);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        $request->validate([
            'total' => 'required|numeric|min:0',
            'gastos_envio' => 'required|numeric|min:0'
        ]);

        $pedido->update($request->only(['total', 'gastos_envio']));

        return response()->json(['success' => true, 'pedido' => $pedido]);
    }

    public function destroy($id)
    {
        Pedido::destroy($id);
        return response()->json(['success' => true]);
    }
}
?>