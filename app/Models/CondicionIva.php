<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CondicionIva extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'condicion_iva';
}
