<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get the authenticated user
        $usuario = Auth::user();

        // Fetch the user's orders
        $pedidos = $usuario->pedidos()->with('lineas')->latest()->get();

        // Pass the orders to the view
        return view('usuario.dashboard', compact('usuario', 'pedidos'));
    }

    public function verPedidosAbiertos()
    {
        $pedidos = Pedido::where('cerrado', false)->with('cliente')->get();
        return view('usuario.pedidos-abiertos', compact('pedidos'));
    }

    public function crearPedido()
    {
        return view('usuario.crear-pedido');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'vendedor' => 'required|string|max:255',
            'gastos_envio' => 'required|numeric|min:0'
        ]);

        // Create a new order
        $pedido = Pedido::create([
            'cliente_id' => Auth::id(),
            'vendedor' => $request->vendedor,
            'gastos_envio' => $request->gastos_envio,
            'total' => 0,
            'cerrado' => false,
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Pedido creado correctamente');
    }
}
?>