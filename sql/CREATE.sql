CREATE TABLE lugar(
	codigo serial NOT NULL unique primary key,
	nombre varchar(60) NOT NULL,
	tipo varchar(60) NOT NULL,
	fk_lugar integer,
	constraint fk_lugar foreign key(fk_lugar) references lugar(codigo)
);
CREATE TABLE PersonaContacto(
	id serial NOT NULL primary key,
	nombre varchar(30) NOT NULL,
	apellido varchar(30) NOT NULL,
	cedula integer NOT NULL unique
);
CREATE TABLE sucursal(
	codigo serial NOT NULL unique primary key,
	nombre varchar(60) NOT NULL,
	capacidad integer NOT NULL,
	email varchar(60) NOT NULL unique,
	capacidad_almacenamiento integer NOT NULL,
	fk_PersonaContacto integer NOT NULL,
	fk_lugar integer NOT NULL,
	constraint fk_lugar foreign key(fk_lugar) references lugar(codigo),
	constraint fk_PersonaContacto foreign key(fk_PersonaContacto) references PersonaContacto(id)
);
CREATE TABLE zona(
	codigo serial NOT NULL unique primary key,
	nombre varchar(30) NOT NULL,
	tipo varchar(30) NOT NULL,
	descripcion varchar(30) NOT NULL,
	dimension_area integer NOT NULL,
	fk_sucursal integer NOT NULL,
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo)
);
CREATE TABLE horario(
	codigo serial NOT NULL unique primary key,
	dia varchar(30) NOT NULL,
	hora_entrada varchar(30),
	hora_salida varchar(30) 
);
CREATE TABLE rol(
	codigo serial NOT NULL unique primary key,
	tipo varchar(30) NOT NULL
);
CREATE TABLE accion(
	codigo serial NOT NULL unique primary key,
	tipo varchar(30) NOT NULL,
	descripcion varchar(30) NOT NULL
);
CREATE TABLE rol_accion(
	clave serial NOT NULL unique primary key,
	fk_rol integer NOT NULL,
	fk_accion integer,
	constraint fk_rol foreign key(fk_rol) references rol(codigo),
	constraint fk_accion foreign key(fk_accion) references accion(codigo)
);
CREATE TABLE pago(
	codigo serial NOT NULL unique primary key,
	monto varchar(30) NOT NULL,
	descripcion varchar(30) NOT NULL,
	cedula integer NOT NULL,
	tipo_moneda varchar(30) default 'Bolívares'  NOT NULL,
	numero_cuenta integer unique,
	banco varchar(30),
	cuenta varchar(30),
	numero_tarjeta integer,
	codigo_seguridad integer,
	tipo varchar(30) NOT NULL,	
	constraint cuenta check(cuenta IN('Ahorro', 'Corriente')),
	constraint tipo check(tipo IN('Efectivo', 'Cheque', 'Transferencia', 'Debito', 'Credito'))
);
CREATE TABLE empleado(
	id serial NOT NULL unique primary key,
	cedula integer NOT NULL,
	nombre varchar(60) NOT NULL,
	apellido varchar(60) NOT NULL,
	email_personal varchar(60) NOT NULL,
	email_empresa varchar(60) NOT NULL,
	fecha_nac varchar(30) NOT NULL,
	nivel_academico varchar(60) NOT NULL,
	profesion varchar(60) NOT NULL,
	estado_civil varchar(60) NOT NULL,
	numero_hijos integer NOT NULL,
	fecha_ingreso varchar(60) NOT NULL,
	fecha_egreso varchar(60),
	activo varchar(30),
	salario integer NOT NULL,
	fk_lugar integer NOT NULL,
	fk_sucursal integer NOT NULL,
	constraint estado_civil check(estado_civil IN('Soltero', 'Casado', 'Divorciado', 'Viudo', 'Comprometido')),
	constraint activo check(activo IN('Si', 'No')),
	constraint fk_lugar foreign key(fk_lugar) references lugar(codigo),
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo)
);
CREATE TABLE cliente(
	id serial NOT NULL unique primary key,
	cedula integer NOT NULL,
	nombre varchar(30) NOT NULL,
	apellido varchar(30) NOT NULL,
	fecha_nac varchar(30) NOT NULL,
	estado_civil varchar(30) NOT NULL,
	empresa varchar(60),
	l_vip varchar(30),
	fk_lugar integer NOT NULL,
	fk_sucursal integer NOT NULL,
	constraint estado_civil check(estado_civil IN('Soltero', 'Casado', 'Divorciado', 'Viudo', 'Comprometido')),
	constraint l_vip check(l_vip IN('Si', 'No')),
	constraint fk_lugar foreign key(fk_lugar) references lugar(codigo),
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo)
);
CREATE TABLE usuario(
	codigo serial NOT NULL unique primary key,
	nombre varchar(30) NOT NULL,
	contraseña varchar(30) NOT NULL,
	fk_cliente integer,
	fk_empleado integer,
	fk_rol integer NOT NULL,
	constraint fk_cliente foreign key (fk_cliente) references cliente(id),
	constraint fk_empleado foreign key (fk_empleado) references empleado(id),
	constraint fk_rol foreign key (fk_rol) references rol(codigo)	
);
CREATE TABLE telefono(
	codigo serial NOT NULL primary key,
	numero varchar(30) NOT NULL,
	tipo varchar(40) NOT NULL,
	fk_sucursal integer,
	fk_cliente integer,
	fk_empleado integer,
	fk_personacontacto integer,
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo),
	constraint fk_cliente foreign key(fk_cliente) references cliente(id),
	constraint fk_empleado foreign key(fk_empleado) references empleado(id),
	constraint fk_personacontacto foreign key(fk_personacontacto) references personacontacto(id)	
);
CREATE TABLE ruta(
	id serial NOT NULL primary key,
	costo integer NOT NULL,
	duracion integer NOT NULL,
	fk_sucursal_origen integer NOT NULL,
	fk_sucursal_destino integer NOT NULL,
	constraint fk_sucursal_origen foreign key(fk_sucursal_origen) references sucursal(codigo),
	constraint fk_sucursal_destino foreign key(fk_sucursal_destino) references sucursal(codigo)
);
CREATE TABLE tipoenvio(
	codigo serial NOT NULL primary key,
	nombre varchar(40) NOT NULL
);

CREATE TABLE tipopaquete(
	codigo serial NOT NULL primary key,
	nombre varchar(40) NOT NULL,
	costo integer NOT NULL
);


CREATE TABLE paquete(
	codigo serial NOT NULL primary key,
	peso numeric NOT NULL,
	profundidad numeric NOT NULL,
	ancho numeric NOT NULL,
	alto numeric NOT NULL,
	fk_tipopaquete integer NOT NULL,
	constraint fk_tipopaquete foreign key(fk_tipopaquete) references tipopaquete(codigo)
);

CREATE TABLE envio(
	numero serial NOT NULL primary key,
	costo integer,
	fk_cliente_envia integer NOT NULL,
	fk_tipoenvio integer NOT NULL,
	fk_paquete integer NOT NULL,
	fk_telefono integer NOT NULL,
	nombre_recibe varchar(60) NOT NULL,
	apellido_recibe varchar(60) NOT NULL,
	email_recibe varchar(60) NOT NULL,
	fk_ruta integer NOT NULL,
	constraint fk_cliente_envia foreign key(fk_cliente_envia) references cliente(id),
	constraint fk_tipoenvio foreign key(fk_tipoenvio) references tipoenvio(codigo),
	constraint fk_paquete foreign key(fk_paquete) references paquete(codigo),
	constraint fk_telefono foreign key(fk_telefono) references telefono(codigo),
	constraint fk_ruta foreign key(fk_ruta) references ruta(id)
);

CREATE TABLE transporte(
	codigo serial NOT NULL primary key,
	clasificacion varchar(30) NOT NULL,
	capacidad_carga integer NOT NULL,
	serial_motor varchar(30) NOT NULL,
	matricula varchar(30) NOT NULL,
	marca varchar(30) NOT NULL,
	modelo varchar(30) NOT NULL,
	fecha_vehiculo varchar(30) NOT NULL,
	longitud numeric,
	envergadura numeric,
	area numeric,
	altura numeric,
	ancho_cabina numeric,
	diametro_fuselaje numeric,
	peso_vacio numeric,
	peso_maximo numeric,
	carrera_despeje varchar(30),
	velocidad_maxima numeric,
	capacidad_combustible numeric,
	cantidad_motor integer,
	peso numeric,
	descripcion varchar(30),
	serial_carroceria varchar(30),
	fk_sucursal integer NOT NULL,
	tipo varchar(30) NOT NULL,
	constraint clasificacion check (clasificacion IN('Terrestre', 'Marítimo', 'Aéreo')),
	constraint tipo check(tipo IN('Camion', 'Motocicleta', 'Avion', 'Barco')),
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo)
);
CREATE TABLE servicio(
	codigo serial NOT NULL primary key,
	tipo varchar(40) NOT NULL,
	pagina_web varchar(40) NOT NULL,
	descripcion varchar(60) NOT NULL
);
CREATE TABLE transporte_servicio(
	codigo serial NOT NULL primary key,
	fecha_entrega varchar(40) NOT NULL,
	fecha_salida_prevista varchar(40) NOT NULL,
	fecha_proxima varchar(40) NOT NULL,
	fecha_salida_real varchar(40),
	fk_transporte integer,
	fk_servicio integer,
	constraint fk_transporte foreign key(fk_transporte) references transporte(codigo),
	constraint fk_servicio foreign key(fk_servicio) references servicio(codigo)
);
CREATE TABLE fallatransporte(
	codigo serial NOT NULL primary key,
	tipo varchar(40) NOT NULL,
	descripcion varchar(60) NOT NULL,
	fk_transporte_servicio integer NOT NULL,
	constraint fk_transporte_servicio foreign key(fk_transporte_servicio) references transporte_servicio(codigo)	
);

CREATE TABLE asistencia(
	codigo serial NOT NULL primary key,
	fecha varchar(40) NOT NULL,
	fk_empleado integer,
	constraint fk_empleado foreign key(fk_empleado) references empleado(id)
);
CREATE TABLE empleado_horario(
	clave serial NOT NULL primary key,
	detalle varchar(40) NOT NULL,
	fk_empleado integer NOT NULL,
	fk_horario integer NOT NULL,
	constraint fk_empleado foreign key(fk_empleado) references empleado(id),
	constraint fk_horario foreign key(fk_horario) references horario(codigo)
);
CREATE TABLE accion_usuario(
	codigo serial NOT NULL primary key,
	fecha varchar(40) NOT NULL,
	descripción varchar(40) NOT NULL,
	fk_accion integer NOT NULL,
	fk_usuario integer NOT NULL,
	constraint fk_accion foreign key(fk_accion) references accion(codigo),
	constraint fk_usuario foreign key(fk_usuario) references usuario(codigo)
);
CREATE TABLE puerto(
	codigo serial NOT NULL primary key,
	nombre varchar(40) NOT NULL,
	puestos_atraque integer NOT NULL,
	cantidad_muelles integer NOT NULL,
	longitud integer NOT NULL,
	ancho integer NOT NULL,
	calado integer NOT NULL,
	uso varchar(40) NOT NULL,
	fk_sucursal integer NOT NULL,
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo)
);
CREATE TABLE area(
	codigo serial NOT NULL primary key,
	tipo varchar(40) NOT NULL,
	constraint tipo check(tipo IN('Area techada', 'Area cubierta'))
);
CREATE TABLE sucursal_envio(
	clave serial NOT NULL primary key,
	fecha_entrega varchar(40) NOT NULL,
	fk_sucursal integer NOT NULL,
	fk_envio integer NOT NULL,
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo),
	constraint fk_envio foreign key(fk_envio) references envio(numero)
	
);
CREATE TABLE sucursal_envio_destino(
	clave serial NOT NULL primary key,
	fecha_salida varchar(40) NOT NULL,
	fk_sucursal integer NOT NULL,
	fk_envio integer NOT NULL,
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo),
	constraint fk_envio foreign key(fk_envio) references envio(numero)
	
);
CREATE TABLE empleado_zona(
	clave serial NOT NULL primary key,
	descripcion varchar(40) NOT NULL,
	fk_empleado integer NOT NULL,
	fk_zona integer NOT NULL,
	constraint fk_empleado foreign key(fk_empleado) references empleado(id),
	constraint fk_zona foreign key(fk_zona) references zona(codigo)	
);
CREATE TABLE servicio_sucursal(
	clave serial NOT NULL primary key,
	fk_servicio integer NOT NULL,
	fk_sucursal integer NOT NULL,
	constraint fk_servicio foreign key(fk_servicio) references servicio(codigo),
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo)	
);
CREATE TABLE aeropuerto(
	codigo serial NOT NULL primary key,
	nombre varchar(40) NOT NULL,
	cantidad_terminales integer NOT NULL,
	cantidad_pistas integer NOT NULL,
	capacidad integer NOT NULL,
	fk_sucursal integer NOT NULL,
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo)
);
CREATE TABLE envio_transporte(
	clave serial NOT NULL primary key,	
	fecha_entrega varchar(40) NOT NULL,
	fecha_salida varchar(40) NOT NULL,
	fk_transporte integer NOT NULL,
	fk_envio integer NOT NULL,
	constraint fk_transporte foreign key(fk_transporte) references transporte(codigo),
	constraint fk_envio foreign key(fk_envio) references envio(numero)
);
CREATE TABLE reciboenvio(
	codigo serial NOT NULL primary key,	
	nombre varchar(40) NOT NULL,
	monto integer NOT NULL,
	fecha_recibido varchar(40) NOT NULL,
	fecha_entrega varchar(40) NOT NULL
);
CREATE TABLE cliente_pago(
	clave serial NOT NULL primary key,	
	descripcion varchar(40) NOT NULL,
	fk_cliente integer NOT NULL,
	fk_pago integer NOT NULL,
	fk_reciboenvio integer NOT NULL,
	constraint fk_cliente foreign key(fk_cliente) references cliente(id),
	constraint fk_pago foreign key(fk_pago) references pago(codigo),
	constraint fk_reciboenvio foreign key(fk_reciboenvio) references reciboenvio(codigo)
);
CREATE TABLE estatus(
	codigo serial NOT NULL primary key,
	nombre varchar(40) NOT NULL	
);
CREATE TABLE estatus_envio(
	codigo serial NOT NULL primary key,
	fecha varchar(40) NOT NULL,
	fk_estatus integer NOT NULL,
	fk_envio integer NOT NULL,
	constraint fk_estatus foreign key(fk_estatus) references estatus(codigo),
	constraint fk_envio foreign key(fk_envio) references envio(numero)
);

CREATE TABLE gasto(
	codigo serial NOT NULL primary key,
	monto_total integer NOT NULL,
	descripcion varchar(40) NOT NULL,
	fecha varchar(40) NOT NULL,
	fk_sucursal integer NOT NULL,
	fk_servicio integer NOT NULL,
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo),
	constraint fk_servicio foreign key(fk_servicio) references servicio(codigo)
);
CREATE TABLE efectivo(
	codigo serial NOT NULL primary key,
	monto integer NOT NULL,
	descripcion varchar(40) NOT NULL
);
CREATE TABLE pagodestino(
	clave serial NOT NULL primary key,	
	descripcion varchar(40) NOT NULL,
	fk_cliente integer NOT NULL,
	fk_efectivo integer NOT NULL,
	constraint fk_cliente foreign key(fk_cliente) references cliente(id),
	constraint fk_efectivo foreign key(fk_efectivo) references efectivo(codigo)
);
CREATE TABLE ruta_envio(
	clave serial NOT NULL primary key,
	descripcion varchar(40) NOT NULL,
	fk_envio integer NOT NULL,
	fk_ruta integer NOT NULL,
	constraint fk_envio foreign key(fk_envio) references envio(numero),
	constraint fk_ruta foreign key(fk_ruta) references ruta(id)
);

CREATE TABLE ruta_transporte(
	codigo serial NOT NULL primary key, 
	fk_ruta integer NOT NULL,
	fk_transporte integer NOT NULL,
	constraint fk_ruta foreign key(fk_ruta) 	references ruta(id),
	constraint fk_transporte foreign key	(fk_transporte) references transporte(codigo)
);