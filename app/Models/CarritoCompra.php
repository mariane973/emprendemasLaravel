<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoCompra extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function producto() {
        return $this->belongsTo(Producto::class);
    }

    public function oferta() {
        return $this->belongsTo(Oferta::class);
    }

    public function servicio() {
        return $this->belongsTo(Servicio::class);
    }
}