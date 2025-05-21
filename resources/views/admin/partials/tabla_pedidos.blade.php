<?php
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Gastos de Envío</th>
            <th>Nº Líneas</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedidos as $pedido)
        <tr>
            <td>{{ $pedido->id }}</td>
            <td>{{ $pedido->total }}</td>
            <td>{{ $pedido->gastos_envio }}</td>
            <td>{{ $pedido->lineas->count() }}</td>
            <td>
                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarPedido{{ $pedido->id }}"><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger" onclick="eliminarRegistro('{{ route('admin.eliminarPedido', $pedido->id) }}', 'pedido')"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $pedidos->links('pagination::bootstrap-5') !!}

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/crud-alertas.js') }}" defer></script>
@endpush