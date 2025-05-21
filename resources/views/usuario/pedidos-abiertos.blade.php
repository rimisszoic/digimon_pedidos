@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Pedidos abiertos</h2>
    <p>Únete a un pedido existente si te interesa el vendedor y condiciones.</p>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Vendedor</th>
                    <th>Cliente</th>
                    <th>Gastos de envío</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->vendedor }}</td>
                    <td>{{ $pedido->cliente->name }}</td>
                    <td>{{ $pedido->gastos_envio }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-acento">Unirse</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No hay pedidos abiertos disponibles.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="text-end mt-4">
        <a href="{{ route('crear.pedido') }}" class="btn btn-primario">Crear nuevo pedido</a>
    </div>
</div>
@endsection