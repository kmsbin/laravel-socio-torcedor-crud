<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clube extends Model{
    use HasFactory;

    protected $fillable = ['nome_do_clube', 'id'];
    protected $dates = ['deleted_at'];

    public function socioClube() {
        return $this->hasMany('App\Models\SocioClube');
    }
}
