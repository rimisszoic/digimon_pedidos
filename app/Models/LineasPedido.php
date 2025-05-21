<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LineaPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido_id', 'usuario_id', 'nombre_carta', 'codigo',
        'cantidad', 'precio_unitario', 'pagado'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
?>