<?php

namespace logUcab\Http\Controllers;

use Illuminate\Http\Request;

use logUcab\Http\Requests;
use logUcab\Cliente;
use Illuminate\Support\Facades\Redirect;
use logUcab\Http\Requests\ClienteFormRequest;
use DB;

class ClienteController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));
    		$clientes=DB::table('cliente as c')
    		->join('lugar as l', 'c.fk_lugar', '=', 'l.codigo')
    		->select('c.id', 'c.cedula', 'c.nombre', 'c.apellido','c.fecha_nac',
    		'c.estado_civil','c.empresa','c.l_vip', 'l.nombre as lugar')
    		->where('c.nombre','!=','inactivo')
            ->where('c.cedula','LIKE','%'.$query.'%')         
	   		->orderBy('c.id', 'asc')
    		->paginate(7);
    		return view('cliente.lista.index', ["clientes"=>$clientes, "searchText"=>$query]);
    	}
    }

    public function create(){
        $lugar=DB::table('lugar')->where('tipo', '=', 'Parroquia')->get();
    	return view("cliente.lista.create",["lugar"=>$lugar]);
    }

    public function store(ClienteFormRequest $request){
    	$cliente=new Cliente;
    	$cliente->cedula=$request->get('cedula');    	
    	$cliente->nombre=$request->get('nombre');
    	$cliente->apellido=$request->get('apellido');
    	$cliente->fecha_nac=$request->get('fecha_nac');
    	$cliente->estado_civil=$request->get('estado_civil');
    	$cliente->empresa=$request->get('empresa');
    	$cliente->l_vip=$request->get('l_vip');
    	$cliente->fk_lugar=$request->get('fk_lugar');
    	$cliente->save();
    	return Redirect::to('cliente/lista');	
    }

    public function show($id){
		return view("cliente.lista.show",["cliente"=>Cliente::findOrFail($id)]);
    }

    public function edit($id){
        $cliente=Cliente::findOrFail($id);
        $lugar=DB::table('lugar')->where('tipo', '=', 'Parroquia')->get();
        return view("cliente.lista.edit",["cliente"=>$cliente, "lugar"=>$lugar]);
    }

    public function update(ClienteFormRequest $request, $id){
    	$cliente=Cliente::findOrFail($id);
    	$cliente->cedula=$request->get('cedula');    	
    	$cliente->nombre=$request->get('nombre');
    	$cliente->apellido=$request->get('apellido');
    	$cliente->fecha_nac=$request->get('fecha_nac');
    	$cliente->estado_civil=$request->get('estado_civil');
    	$cliente->empresa=$request->get('empresa');
    	$cliente->l_vip=$request->get('l_vip');
    	$cliente->fk_lugar=$request->get('fk_lugar');
    	$cliente->update();
    	return Redirect::to('cliente/lista');	
    }    

    public function destroy($id){
    	$cliente=Cliente::findOrFail($id);
    	$cliente->nombre='inactivo';  
    	$cliente->update();
    	return Redirect::to('cliente/lista');	
    }
}
