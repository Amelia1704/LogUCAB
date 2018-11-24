@extends('layouts.admin')
@section('contenido')

<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Sucursales <a href="ver/create"><button class="btn btn-success">Agregar</button></a></h3>
	@include('sucursal.ver.search')
</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<td><center>COD</center></td>
					<td><center>Nombre</center></td>
					<td><center>Capacidad (m2)</center></td>
					<td><center>Email</center></td>
					<td><center>Almacenamiento(m2)</center></td>
					<td><center>Dirección</center></td>
					<td><center>Nombre Contacto</center></td>
					<td><center>CI Contacto</center></td>
					<td><center>Opciones</center></td>
				</thead>

				@foreach ($sucursales as $suc)
				<tr>
					<td>{{ $suc->codigo }}</td> 
					<!-- se utiliza llave llave para mostrar texto en laravel -->
					<td>{{ $suc->nombre }}</td>
					<td>{{ $suc->capacidad }}</td>
					<td>{{ $suc->email }}</td>
					<td><center>{{ $suc->capacidad_almacenamiento }}</center></td>
					<td>{{ $suc->lugar }}</td>
					<td>{{ $suc->contacto }}</td>
					<td>{{ $suc->contacto2 }}</td>
					<td>
						<a href="{{URL::action('SucursalController@edit',$suc->codigo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$suc->codigo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('sucursal.ver.modal')
				@endforeach
			</table>
		</div>
		{{$sucursales->render()}}
	</div>
</div>

@endsection