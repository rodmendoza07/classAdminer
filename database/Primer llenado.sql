/* Inicio de llenado catálogos */
insert into nemachtilkali.nm_bunit (
	nmbu_name
) values (
	'Emporio Salsa'
);

insert into nemachtilkali.nm_branchoffice (
	nmbo_nombre
    , nmbo_calle
    , nmbo_next
    , nmbo_nint
    , nmbo_colonia
    , nmbo_mun
    , nmbo_estado
    , nmbo_telefono
    , nmbo_email
    , nmbo_cp
    , nmbo_bu
) values (
	'Narvarte'
    , 'Anaxagoras'
    , '27'
    , ''
    , 'Narvarte Poniente'
    , 'Benito Juárez'
    , 'CDMX'
    , '5554592524'
    , ''
    , '03020'
    , 1
);

insert into nemachtilkali.nm_config(
	nmconf_value
) values (
	'@emporiosalsa.mx'
);

insert into nemachtilkali.nm_catusers (
	nmcu_desc
) values (
	'Administrador'
), ('Staff');

insert into nemachtilkali.nm_catclases (
	nmcclas_desc
) values (
	'Salsa'
), ('Dancehall'), ('Afrobeat'), ('Bachata');

insert into nemachtilkali.nm_cathorarios (
	nmch_hinicio
    , nmch_hfinal
    , nmch_dia
) values (
	'19:00'
    , '20:00'
    , 'Lunes'
), (
	'20:00'
    , '21:00'
    , 'Lunes'
), (
	'21:00'
    , '22:00'
    , 'Lunes'
), (
	'19:00'
    , '20:00'
    , 'Martes'
), (
	'20:00'
    , '21:00'
    , 'Martes'
), (
	'21:00'
    , '22:00'
    , 'Martes'
), (
	'19:00'
    , '20:00'
    , 'Miércoles'
), (
	'20:00'
    , '21:00'
    , 'Miércoles'
), (
	'21:00'
    , '22:00'
    , 'Miércoles'
), (
	'19:00'
    , '20:00'
    , 'Jueves'
), (
	'20:00'
    , '21:00'
    , 'Jueves'
), (
	'21:00'
    , '22:00'
    , 'Jueves'
), (
	'19:00'
    , '20:00'
    , 'Viernes'
), (
	'20:00'
    , '21:00'
    , 'Viernes'
), (
	'21:00'
    , '22:00'
    , 'Viernes'
), (
	'12:00'
    , '13:00'
    , 'Sábado'
), (
	'13:00'
    , '14:00'
    , 'Sábado'
), (
	'14:00'
    , '15:00'
    , 'Sábado'
);

insert into nemachtilkali.nm_catpagos (
	nmcp_desc
    , nmcp_amount
) values (
	'Membresía Gold'
    , 900
), (
	'Membresía Silver'
    , 900
), (
	'Membresía Bronze'
    , 900
), (
	'Mes membresia Gold'
    , 900
), (
	'Mes membresía Silver'
    , 900
), (
	'Mes membresía Bronze'
    , 900
), (
	'Mes sin membresía'
    , 900
), (
	'Clase Individual'
    , 900
);

insert into nemachtilkali.nm_catmembership (
	nmcm_desc
) values (
	'Membresía Gold'
), (
	'Membresía Silver'
), (
	'Membresía Bronze'
);
/* Fin catálogos */

/* Usuario Administrador */
insert into nemachtilkali.nm_usuario (
	nmu_uname
    , nmu_nombre
    , nmu_apaterno
    , nmu_materno
    , nmu_pass
    , nmu_email
    , nmu_catu
    , nmu_bo
) values (
	'admin'
    , 'Administrador'
    , 'Emporio'
    , 'Salsa'
    , md5(concat('admin__3mp0r10@emporiosalsa.mx'))
    , 'Administrador@emporiosalsa.mx'
    , 1
    , 1
), (
	'ivan'
    , 'Ivan'
    , 'Soria'
    , ''
    , md5(concat('ivan__3mp0r10@emporiosalsa.mx'))
    , 'isoria@emporiosalsa.mx'
    , 2
    , 1 
);

insert into nm_appmenu ( 
	nmapp_link
    , nmapp_cuid
) values (
	'<li class="active"><a href="index.php" class="list"><em class="fa fa-address-card">&nbsp;</em> Asistencias</a></li>'
    , 1
), (
	'<li><a href="#" class="payment"><em class="fa fa-dollar">&nbsp;</em> Pagos</a></li>'
    , 1
), (
	'<li><a href="#" class="nclient"><em class="fa fa-user-plus">&nbsp;</em> Registro de clientes</a></li>'
    , 1
), (
	'<li><a href="#" class="reports"><em class="fa fa-line-chart">&nbsp;</em> Reportes</a></li>'
    , 1
), (
	'<li><a href="#" class="config"><em class="fa fa-cogs">&nbsp;</em> Configuración</a></li>'
    , 1
), (
	'<li class="active"><a href="index.php" class="list"><em class="fa fa-address-card">&nbsp;</em> Asistencias</a></li>'
    , 2
), (
	'<li><a href="#" class="payment"><em class="fa fa-dollar">&nbsp;</em> Pagos</a></li>'
    , 2
), (
	'<li><a href="#" class="nclient"><em class="fa fa-user-plus">&nbsp;</em> Registro de clientes</a></li>'
    , 2
);