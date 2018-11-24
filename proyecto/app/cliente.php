<?php

namespace logUcab;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'cedula',
    	'nombre',
    	'apellido',
    	'fecha_nac',
    	'estado_civil',
    	'empresa',
    	'l_vip',
    	'fk_lugar'

    ];
    protected $guarded = [

    ];
}
