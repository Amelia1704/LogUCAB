<?php
namespace logUcab;

use Illuminate\Database\Eloquent\Model;

class sucursal extends Model
{
    protected $table = 'sucursal';
    protected $primaryKey = 'codigo';

    public $timestamps = false;

    protected $fillable = [
    	'nombre',
    	'capacidad',
    	'email',
    	'capacidad_almacenamiento',
    	'fk_lugar',
    	'fk_personacontacto'

    ];
    protected $guarded = [

    ];

}
