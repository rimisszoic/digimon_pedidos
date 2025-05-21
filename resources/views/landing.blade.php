@extends('layouts.app')

@section('content')
<section class="bg-primario text-white text-center py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-start">
                <h1 class="display-4 fw-bold mb-3">Gestiona pedidos de cartas de Digimon</h1>
                <p class="lead">Un sistema sencillo y eficaz para realizar y administrar pedidos de cartas del juego de Digimon.</p>
                <a href="{{ route('register') }}" class="btn btn-warning btn-lg px-4">Comenzar</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/digimon-header.png') }}" alt="Cartas Digimon" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="bg-primario text-white text-center py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Características principales</h2>
        <p class="mb-5">Realiza nuevos pedidos de cartas de Digimon de forma rápida y sencilla</p>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="bg-white text-dark p-4 rounded shadow">
                    <i class="fas fa-file-circle-check fa-3x text-primario mb-3"></i>
                    <h5 class="fw-bold">Creación de pedidos</h5>
                    <p>Realiza nuevos pedidos de cartas de Digimon de forma rápida y sencilla.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white text-dark p-4 rounded shadow">
                    <i class="fas fa-users-gear fa-3x text-primario mb-3"></i>
                    <h5 class="fw-bold">Gestión de amigos</h5>
                    <p>Administra tus amigos y comparte tus órdenes de compra para gestionar vuestros pedidos.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white text-dark p-4 rounded shadow">
                    <i class="fas fa-chart-line fa-3x text-primario mb-3"></i>
                    <h5 class="fw-bold">Seguimiento de pedidos</h5>
                    <p>Lleva un control detallado del estado y progreso de todos tus pedidos.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="text-center bg-primario text-white py-5">
    <div class="container">
        <h3 class="fw-bold mb-3">¿Listo para empezar?</h3>
        <p>Regístrate ahora y empieza a gestionar tus pedidos de cartas de Digimon fácilmente.</p>
        <a href="{{ route('register') }}" class="btn btn-warning btn-lg mt-3">Registrarse</a>
    </div>
</section>
@endsection