<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id_pedido',
        'id_mesa',
        'precio_total',
    ];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function platillos()
    {
        return $this->belongsToMany(Platillo::class, 'pedido_platillo')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }

    // Función para recalcular el precio total
    public function recalculateTotal()
    {
        $total = $this->platillos->reduce(function ($carry, $platillo) {
            return $carry + ($platillo->pivot->precio * $platillo->pivot->cantidad);
        }, 0);

        $this->update(['precio_total' => $total]);
    }
}
