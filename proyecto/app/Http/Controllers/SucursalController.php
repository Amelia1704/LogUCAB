<?php

namespace logUcab\Http\Controllers;

use Illuminate\Http\Request;

use logUcab\Http\Requests;

use logUcab\Sucursal;
use Illuminate\Support\Facades\Redirect;
use logUcab\Http\Requests\SucursalFormRequest;
use DB;

class SucursalController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));
    		$sucursales=DB::table('sucursal as s')
    		->join('lugar as l', 's.fk_lugar', '=', 'l.codigo')
    		->join('personacontacto as p', 's.fk_personacontacto', '=', 'p.id')
    		->select('s.codigo', 's.nombre', 's.capacidad', 's.email','s.capacidad_almacenamiento', 'l.nombre as lugar', 'p.nombre as contacto', 'p.cedula as contacto2')
    		->where('s.nombre','!=','inactivo')
            ->where('s.codigo','LIKE','%'.$query.'%')
	   		->orderBy('s.codigo', 'asc')
    		->paginate(7);
    		return view('sucursal.ver.index', ["sucursales"=>$sucursales, "searchText"=>$query]);
    	}
    }

    public function create(){
        $lugar=DB::table('lugar')->where('tipo', '=', 'Parroquia')->get();
        $personacontacto=DB::table('personacontacto')->where('nombre', '!=', 'inactivo')->get();
    	return view("sucursal.ver.create",["lugar"=>$lugar],["personacontacto"=>$personacontacto]);
    }

    public function store(SucursalFormRequest $request){
    	$sucursal=new Sucursal;	
    	$sucursal->nombre=$request->get('nombre');
    	$sucursal->capacidad=$request->get('capacidad');
    	$sucursal->email=$request->get('email');
    	$sucursal->capacidad_almacenamiento=$request->get('capacidad_almacenamiento');
    	$sucursal->fk_lugar=$request->get('fk_lugar');
    	$sucursal->fk_personacontacto=$request->get('fk_personacontacto');
    	$sucursal->save();
    	return Redirect::to('sucursal/ver');	
    }

    public function show($id){
		return view("sucursal.ver.show",["sucursal"=>Sucursal::findOrFail($id)]);
    }

    public function edit($id){
        $sucursal=Sucursal::findOrFail($id);
        $lugar=DB::table('lugar')->where('tipo', '=', 'Parroquia')->get();
        $personacontacto=DB::table('personacontacto')->where('nombre', '!=', 'inactivo')->get();
        return view("sucursal.ver.edit",["sucursal"=>$sucursal, "lugar"=>$lugar, "personacontacto"=>$personacontacto]);
    }

    public function update(SucursalFormRequest $request, $id){
    	$sucursal=Sucursal::findOrFail($id);
    	$sucursal->nombre=$request->get('nombre');
    	$sucursal->capacidad=$request->get('capacidad');
    	$sucursal->email=$request->get('email');
    	$sucursal->capacidad_almacenamiento=$request->get('capacidad_almacenamiento');
    	$sucursal->fk_lugar=$request->get('fk_lugar');
    	$sucursal->fk_personacontacto=$request->get('fk_personacontacto');
    	$sucursal->update();
    	return Redirect::to('sucursal/ver');	
    }    

    public function destroy($id){
    	$sucursal=Sucursal::findOrFail($id);
    	$sucursal->nombre='inactivo';  
    	$sucursal->update();
    	return Redirect::to('sucursal/ver');	
    }    
}
