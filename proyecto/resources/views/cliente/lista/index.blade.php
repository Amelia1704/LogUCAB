@extends('layouts.admin')
@section('contenido')

<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Clientes LogUCAB <a href="lista/create"><button class="btn btn-success">Nuevo</button></a></h3>
	@include('cliente.lista.search')
</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<td>ID</td>
					<td>Cédula</td>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Fecha de nacimiento</td>
					<td>Estado Civil</td>
					<td>Empresa</td>
					<td>Cliente L-VIP</td>
					<td>Dirección</td>
					<td>Opciones</td>
				</thead>

				@foreach ($clientes as $cli)
				<tr>
					<td>{{ $cli->id }}</td> 
					<!-- se utiliza llave llave para mostrar texto en laravel -->
					<td>{{ $cli->cedula }}</td>
					<td>{{ $cli->nombre }}</td>
					<td>{{ $cli->apellido }}</td>
					<td>{{ $cli->fecha_nac }}</td>
					<td>{{ $cli->estado_civil }}</td>
					<td>{{ $cli->empresa }}</td>
					<td>{{ $cli->l_vip }}</td>
					<td>{{ $cli->lugar }}</td>
					<td>
						<a href="{{URL::action('ClienteController@edit',$cli->id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$cli->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('cliente.lista.modal')
				@endforeach
			</table>
		</div>
		{{$clientes->render()}}
	</div>
</div>

@endsection