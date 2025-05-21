@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Bienvenido, {{ $usuario->name }}</h2>
    <p>Aquí puedes ver tus pedidos activos y crear nuevos.</p>

    <a href="{{ route('crear.pedido') }}" class="btn btn-primario mb-3">Crear nuevo pedido</a>

    <h4>Mis pedidos</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Vendedor</th>
                    <th>Gastos de envío</th>
                    <th>Total</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->vendedor }}</td>
                    <td>{{ $pedido->gastos_envio }}</td>
                    <td>{{ $pedido->total }}</td>
                    <td>{{ $pedido->cerrado ? 'Cerrado' : 'Abierto' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No tienes pedidos aún.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection