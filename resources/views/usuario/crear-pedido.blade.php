@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Crear nuevo pedido</h2>
    <form action="{{ route('guardar.pedido') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="vendedor" class="form-label">Nombre del vendedor (MKM)</label>
            <input type="text" name="vendedor" id="vendedor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="gastos_envio" class="form-label">Gastos de envío (€)</label>
            <input type="number" name="gastos_envio" id="gastos_envio" step="0.01" min="0" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primario">Crear pedido</button>
    </form>
</div>
@endsection