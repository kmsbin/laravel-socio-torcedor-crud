<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model {
    use HasFactory;
    public $incrementing = true;
    protected $fillable = ['nome_completo', 'id'];

    function sociosClubes() {
        return $this->belongTo('App\Models\SocioClube');
    }
}
