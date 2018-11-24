@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="table-responsive">

			<h3>Registrar nueva sucursal</h3>
			@if (count($errors)>0)
			<div class="aler alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>				
			</div>
		@endif



		{!!Form::open(array('url'=>'sucursal/ver', 'method'=>'POST', 'autocomplete'=>'off'))!!}
		{{Form::token()}}

		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" placeholder="Nombre">	
		</div>	
		<div class="form-group">
			<label for="capacidad">Capacidad (m2)</label>
			<input type="text" name="capacidad" class="form-control" placeholder="Capacidad">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" class="form-control" placeholder="Email">	
		</div>	
		<div class="form-group">
			<label for="capacidad_almacenamiento">Capacidad de almacenamiento</label>
			<input type="text" name="capacidad_almacenamiento" class="form-control" placeholder="Capacidad de almacenamiento">	
		</div>			
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
			<label for="contacto">Persona de contacto</label>
					<select name="fk_personacontacto" class="form-control">
						@foreach ($personacontacto as $per)
						<option value="{{$per->id}}">{{$per->cedula}}</option>
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