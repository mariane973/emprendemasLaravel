<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vendedor() {
        return $this->belongsTo(Vendedore::class, 'vendedor_id');
    }
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria');
    }
    
}