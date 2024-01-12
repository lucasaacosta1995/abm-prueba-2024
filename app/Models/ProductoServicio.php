<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoServicio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "producto_servicio";

    protected $guarded = [];  

    public function rubro()
    {
        return $this->hasOne(Rubro::class, 'id', 'id_rubro');
    }

    public function unidadMedida()
    {
        return $this->hasOne(UnidadMedida::class, 'id', 'id_unidad_medida');
    }

    public function condicionIva()
    {
        return $this->hasOne(CondicionIva::class, 'id', 'id_condicion_iva');
    }
}