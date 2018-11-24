@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{ $cliente->nombre }}</h3>
			@if (count($errors)>0)
			<div class="aler alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>				
			</div>
		@endif



		{!!Form::model($cliente,['method'=>'PATCH', 'route'=>['lista.update', $cliente->id]])!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="cedula">Cédula</label>
			<input type="text" name="cedula" required value="{{$cliente->cedula}}" class="form-control">
		</div>
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre"required value="{{$cliente->nombre}}" class="form-control">
		</div>	
		<div class="form-group">
			<label for="apellido">Apellido</label>
			<input type="text" name="apellido"required value="{{$cliente->apellido}}" class="form-control">
		</div>
		<div class="form-group">
			<label for="fecha_nac">Fecha de nacimiento</label>
			<input type="text" name="fecha_nac" required value="{{$cliente->fecha_nac}}" class="form-control">
		</div>	
		<div class="form-group">
			<label for="estado_civil">Estado civil</label>
			<input type="text" name="estado_civil"required value="{{$cliente->estado_civil}}" class="form-control">
		</div>		
		<div class="form-group">
			<label for="empresa">Empresa</label>
			<input type="text" name="empresa" required value="{{$cliente->empresa}}" class="form-control">
		</div>
		<div class="form-group">
			<label for="l_vip">Cliente L-VIP</label>
			<input type="text" name="l_vip" required value="{{$cliente->l_vip}}" class="form-control">
		</div>	
		<div class="form-group">
			<label for="fk_lugar">Direccion</label>
					<select name="fk_lugar" class="form-control">
						@foreach ($lugar as $lug)
						@if ($lug->codigo==$cliente->fk_lugar)
						<option value="{{$lug->codigo}}" selected>{{$lug->nombre}}</option>@else
						<option value="{{$lug->codigo}}">{{$lug->nombre}}</option>
						@endif
						@endforeach
					</select>	
		</div>	

		<div class="form-group">
			<a href="{{URL::action('ClienteController@index')}}"><button class="btn btn-primary" type="submit">Guardar</button></a>
			<button class="btn btn-danger" type="reset">Borrar</button>
			
		</div>

			{!!Form::close()!!}

		</div>		
	</div>
@endsection