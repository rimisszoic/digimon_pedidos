<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'vendedor', 'gastos_envio', 'total', 'cerrado'];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function lineas()
    {
        return $this->hasMany(LineaPedido::class);
    }
}
?>