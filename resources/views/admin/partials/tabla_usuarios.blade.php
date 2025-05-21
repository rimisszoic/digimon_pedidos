<?php
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ optional($usuario->role)->nombre }}</td>
            <td>
                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario{{ $usuario->id }}"><i class="fas fa-user-edit"></i></button>
                <button class="btn btn-sm btn-danger" onclick="eliminarRegistro('{{ route('admin.eliminarUsuario', $usuario->id) }}', 'usuario')"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $usuarios->links('pagination::bootstrap-5') !!}