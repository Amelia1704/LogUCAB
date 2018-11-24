@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Sucursal: {{ $sucursal->nombre }}</h3>
			@if (count($errors)>0)
			<div class="aler alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>				
			</div>
		@endif



		{!!Form::model($sucursal,['method'=>'PATCH', 'route'=>['ver.update', $sucursal->codigo]])!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre"required value="{{$sucursal->nombre}}" class="form-control">
		</div>	
		<div class="form-group">
			<label for="capacidad">Capacidad (m2)</label>
			<input type="text" name="capacidad"required value="{{$sucursal->capacidad}}" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" required value="{{$sucursal->email}}" class="form-control">
		</div>	
		<div class="form-group">
			<label for="capacidad_almacenamiento">Capacidad de almacenamiento</label>
			<input type="text" name="capacidad_almacenamiento"required value="{{$sucursal->capacidad_almacenamiento}}" class="form-control">
		</div>		
		<div class="form-group">
			<label for="fk_lugar">Direccion</label>
					<select name="fk_lugar" class="form-control">
						@foreach ($lugar as $lug)
						@if ($lug->codigo==$sucursal->fk_lugar)
						<option value="{{$lug->codigo}}" selected>{{$lug->nombre}}</option>@else
						<option value="{{$lug->codigo}}">{{$lug->nombre}}</option>
						@endif
						@endforeach
					</select>	
		</div>
		<div class="form-group">
			<label for="fk_personacontacto">Contacto</label>
					<select name="fk_personacontacto" class="form-control">
						@foreach ($personacontacto as $per)
						@if ($per->id==$sucursal->fk_personacontacto)
						<option value="{{$per->id}}" selected>{{$per->cedula}}</option>@else
						<option value="{{$per->id}}">{{$per->cedula}}</option>
						@endif
						@endforeach
					</select>	
		</div>	

		<div class="form-group">
			<a href="{{URL::action('SucursalController@index')}}"><button class="btn btn-primary" type="submit">Guardar</button></a>
			<button class="btn btn-danger" type="reset">Borrar</button>
			
		</div>

			{!!Form::close()!!}

		</div>		
	</div>
@endsection