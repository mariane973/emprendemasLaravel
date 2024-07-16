<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedore extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function productos() {
        return $this->hasMany(Producto::class);
    }

    public function ofertas() {
        return $this->hasMany(Oferta::class);
    }

    public function servicios() {
        return $this->hasMany(Servicio::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}