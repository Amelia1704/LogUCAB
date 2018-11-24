CREATE TABLE lugar(
	codigo serial NOT NULL unique primary key,
	nombre varchar(60) NOT NULL,
	tipo varchar(60) NOT NULL,
	fk_lugar integer,
	constraint fk_lugar foreign key(fk_lugar) references lugar(codigo)
);
CREATE TABLE PersonaContacto(
	id serial NOT NULL unique primary key,
	nombre varchar(30) NOT NULL,
	apellido varchar(30) NOT NULL,
	cedula integer NOT NULL unique
);
CREATE TABLE sucursal(
	codigo serial NOT NULL unique primary key,
	nombre varchar(30) NOT NULL,
	capacidad integer NOT NULL,
	email varchar(30) NOT NULL unique,
	capacidad_almacenamiento integer NOT NULL,
	fk_PersonaContacto integer NOT NULL,
	fk_lugar integer NOT NULL,
	constraint fk_lugar foreign key(fk_lugar) references lugar(codigo),
	constraint fk_PersonaContacto foreign key(fk_PersonaContacto) references PersonaContacto(id)
);
CREATE TABLE proveedor(
	codigo serial NOT NULL unique primary key,
	nombre varchar(30) NOT NULL,
	pagina_web varchar(30) NOT NULL,
	email varchar(30) NOT NULL unique,
	fk_lugar integer NOT NULL,
	constraint fk_lugar foreign key(fk_lugar) references lugar(codigo)
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
	hora_entrada time NOT NULL,
	hora_salida time NOT NULL
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
CREATE TABLE almacen(
	codigo serial NOT NULL unique primary key,
	nombre varchar(30) NOT NULL,
	descripcion varchar(30) NOT NULL, 
	fk_sucursal integer NOT NULL,
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo)
);
CREATE TABLE pago(
	codigo serial NOT NULL unique primary key,
	monto varchar(30) NOT NULL,
	descripcion varchar(30) NOT NULL,
	cedula integer NOT NULL unique,
	tipo_moneda varchar(30) default 'Bolívares'  NOT NULL,
	numero_cuenta integer NOT NULL unique,
	banco varchar(30) NOT NULL,
	cuenta varchar(30) NOT NULL,
	numero_tarjeta integer NOT NULL unique,
	codigo_seguridad integer,
	tipo varchar(30) NOT NULL,	
	constraint cuenta check(cuenta IN('Ahorro', 'Corriente')),
	constraint tipo check(tipo IN('Efectivo', 'Cheque', 'Transferencia', 'Debito', 'Credito'))
);
CREATE TABLE salario(
	id_empleado serial NOT NULL primary key,
	monto_asignado integer NOT NULL,
	dia_trabajado integer NOT NULL
);
CREATE TABLE empleado(
	id serial NOT NULL unique primary key,
	cedula integer NOT NULL,
	nombre varchar(30) NOT NULL,
	apellido varchar(30) NOT NULL,
	email_persona varchar(30) NOT NULL,
	email_empresa varchar(30) NOT NULL,
	fecha_nac varchar(30) NOT NULL,
	nivel_academico varchar(30) NOT NULL,
	profesion varchar(30) NOT NULL,
	estado_civil varchar(30) NOT NULL,
	numero_hijos integer NOT NULL,
	fecha_ingreso date NOT NULL,
	fecha_egreso date,
	activo varchar(30),
	fk_lugar integer NOT NULL,
	fk_salario integer NOT NULL,
	constraint estado_civil check(estado_civil IN('Soltero', 'Casado', 'Divorciado', 'Viudo', 'Comprometido')),
	constraint activo check(activo IN('Si', 'No')),
	constraint fk_lugar foreign key(fk_lugar) references lugar(codigo),
	constraint fk_salario foreign key(fk_salario) references salario(id_empleado)
);
CREATE TABLE cliente(
	id serial NOT NULL unique primary key,
	cedula integer NOT NULL,
	nombre varchar(30) NOT NULL,
	apellido varchar(30) NOT NULL,
	fecha_nac varchar(30) NOT NULL,
	estado_civil varchar(30) NOT NULL,
	empresa varchar(30),
	l_vip varchar(30),
	fk_lugar integer NOT NULL,
	constraint estado_civil check(estado_civil IN('Soltero', 'Casado', 'Divorciado', 'Viudo', 'Comprometido')),
	constraint l_vip check(l_vip IN('Si', 'No')),
	constraint fk_lugar foreign key(fk_lugar) references lugar(codigo)
);
CREATE TABLE usuario(
	codigo serial NOT NULL unique primary key,
	nombre varchar(30) NOT NULL,
	contraseña varchar(30) NOT NULL,
	fk_cliente integer NOT NULL,
	fk_empleado integer NOT NULL,
	constraint fk_cliente foreign key (fk_cliente) references cliente(id),
	constraint fk_empleado foreign key (fk_empleado) references empleado(id)	
);
CREATE TABLE envio(
	numero serial NOT NULL primary key,
	cantidad_paquete integer NOT NULL,
	costo integer NOT NULL,
	fk_cliente_recibe integer NOT NULL,
	fk_cliente_envia integer NOT NULL,
	constraint fk_cliente_recibe foreign key(fk_cliente_recibe) references cliente(id),
	constraint fk_cliente_envia foreign key(fk_cliente_envia) references cliente(id)
);
CREATE TABLE tipopaquete(
	codigo serial NOT NULL primary key,
	nombre varchar(40) NOT NULL
);

CREATE TABLE paquete(
	codigo serial NOT NULL primary key,
	tipo_paquete varchar(30) NOT NULL,
	peso numeric NOT NULL,
	largo numeric NOT NULL,
	ancho numeric NOT NULL,
	alto numeric NOT NULL,
	fk_envio integer NOT NULL,
	fk_tipopaquete integer NOT NULL,
	constraint fk_envio foreign key(fk_envio) references envio(numero),
	constraint fk_tipopaquete foreign key(fk_tipopaquete) references tipopaquete(codigo)
);
CREATE TABLE transporte(
	codigo serial NOT NULL primary key,
	clasificacion varchar(30) NOT NULL,
	capacidad_carga integer NOT NULL,
	serial_motor varchar(30) NOT NULL,
	matricula varchar(30) NOT NULL,
	marca varchar(30) NOT NULL,
	modelo varchar(30) NOT NULL,
	fecha_vehiculo date NOT NULL,
	nacional boolean NOT NULL,
	longitud numeric NOT NULL,
	envergadura numeric NOT NULL,
	area numeric NOT NULL,
	altura numeric NOT NULL,
	ancho_cabina numeric NOT NULL,
	diametro_fuselaje numeric NOT NULL,
	peso_vacio numeric NOT NULL,
	peso_maximo numeric NOT NULL,
	carrera_despeje varchar(30) NOT NULL,
	velocidad_maxima numeric  NOT NULL,
	capacidad_combustible numeric NOT NULL,
	cantidad_motor integer NOT NULL,
	peso numeric NOT NULL,
	descripcion varchar(30) NOT NULL,
	serial_carroceria varchar(30) NOT NULL,
	fk_sucursal integer NOT NULL,
	tipo varchar(30) NOT NULL,
	constraint clasificacion check (clasificacion IN('Terrestre', 'Marítimo', 'Aéreo')),
	constraint tipo check(tipo IN('Camion', 'Motocicleta', 'Avion', 'Barco')),
	constraint fk_sucursal foreign key(fk_sucursal) references sucursal(codigo)
);



