<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocioClube extends Model
{
    use HasFactory;
    public $incrementing = true;

    protected $fillable = ['id_socio', 'id_clube', 'id'];

    public function sociosClubes() {
        return $this->hasMany('App\Models\Socio');
        return $this->hasMany('App\Models\Clube');
    }
}
