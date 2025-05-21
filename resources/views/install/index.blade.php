@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Instalador de la Aplicación</h2>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form method="POST" action="{{ route('installer.configure') }}">
        @csrf
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Base de Datos</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label>Host</label>
                    <input type="text" name="db_host" class="form-control" required value="127.0.0.1">
                </div>
                <div class="col-md-6">
                    <label>Puerto</label>
                    <input type="number" name="db_port" class="form-control" required value="3306">
                </div>
                <div class="col-md-6">
                    <label>Nombre BD</label>
                    <input type="text" name="db_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Usuario</label>
                    <input type="text" name="db_user" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Contraseña</label>
                    <input type="password" name="db_pass" class="form-control">
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Administrador</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label>Nombre</label>
                    <input type="text" name="admin_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" name="admin_email" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Contraseña</label>
                    <input type="password" name="admin_password" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">Instalar</button>
        </div>
    </form>
</div>
@endsection