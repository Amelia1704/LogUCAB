@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="table-responsive">

			<h3>Agregar nuevo cliente</h3>
			@if (count($errors)>0)
			<div class="aler alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>				
			</div>
		@endif



		{!!Form::open(array('url'=>'cliente/lista', 'method'=>'POST', 'autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="cedula">Cédula</label>
			<input type="text" name="cedula" class="form-control" placeholder="Cedula">	
		</div>
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" placeholder="Nombre">	
		</div>	
		<div class="form-group">
			<label for="apellido">Apellido</label>
			<input type="text" name="apellido" class="form-control" placeholder="Apellido">	
		</div>
		<div class="form-group">
			<label for="fecha_nac">Fecha de nacimiento</label>
			<input type="text" name="fecha_nac" class="form-control" placeholder="Fecha de nacimiento">	
		</div>	
		<div class="form-group">
			<label for="estado_civil">Estado civil</label>
			<input type="text" name="estado_civil" class="form-control" placeholder="Estado Civil">	
		</div>		
		<div class="form-group">
			<label for="empresa">Empresa</label>
			<input type="text" name="empresa" class="form-control" placeholder="Empresa">
		</div>
		<div class="form-group">
			<label for="l_vip">Cliente L-VIP</label>
			<input type="text" name="l_vip" class="form-control" placeholder="Cliente L-VIP">	
		</div>	
		<div class="form-group">
			<label for="direccion">Direccion</label>
					<select name="fk_lugar" class="form-control">
						@foreach ($lugar as $lug)
						<option value="{{$lug->codigo}}">{{$lug->nombre}}</option>
						@endforeach
					</select>					
		</div>	
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Borrar</button>
			
		</div>

			{!!Form::close()!!}

		</div>
	  			</div>		
	</div>
@endsection