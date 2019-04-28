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
) values (
	'Membresía'
), (
	'Clase'
);

insert into nemachtilkali.nm_catmembership (
	nmcm_desc
    , nmcm_amount
) values (
	'Membresía Platinum'
    , 900
), (
	'Membresía Gold'
    , 600
), (
	'Membresía Silver'
    , 300
), (
	'Sin membresía'
    , 0
);

insert into nemachtilkali.nm_paquetes(
	nmpk_desc
    , nmpk_amount
    , nmpk_classnumber
    , nmpk_mid
) values (
	'15 clases'
    , 900
    , 15
    , 1
), (
	'8 clases'
    , 560
    , 8
    , 1
), (
	'4 clases'
    , 320
    , 4
    , 1
), (
	'15 clases'
    , 1050
    , 15
    , 2
), (
	'8 clases'
    , 640
    , 8
    , 2
), (
	'4 clases'
    , 360
    , 4
    , 2
), (
	'15 clases'
    , 1050
    , 15
    , 2
), (
	'8 clases'
    , 640
    , 8
    , 2
), (
	'4 clases'
    , 360
    , 4
    , 2
), (
	'15 clases'
    , 1200
    , 15
    , 3
), (
	'8 clases'
    , 720
    , 8
    , 3
), (
	'4 clases'
    , 400
    , 4
    , 3
), (
	'15 clases'
    , 1350
    , 15
    , 4
), (
	'8 clases'
    , 800
    , 8
    , 4
), (
	'4 clases'
    , 440
    , 4
    , 4
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
), (
	'rmendoza'
    , 'Rodrigo'
    , 'Mendoza'
    , ''
    , md5(concat('rmendoza__Rocksystem1@emporiosalsa.mx'))
    , 'rmendoza@ctsnet.mx'
    , 1
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

/*Dump*/
insert into nemachtilkali.nm_clientes(
	nmcl_nombre
    , nmcl_apaterno
    , nmcl_amaterno
    , nmcl_mtel
    , nmcl_ftel
    , nmcl_ucreate
) values (
	'Luis Rodrigo'
    , 'Mendoza'
    , 'Rodríguez'
    , '5514889583'
    , '55986989'
    , 3
);

insert into nemachtilkali.nm_actividadcliente (
	nmac_clid
    , nmac_clasid
) values (
	1
    , 1
);

insert into nemachtilkali.nm_lista (
	nml_createdate
    , nml_cid
    , nml_uid
) values (
	now()
    , 1
    , 3
);

insert into nemachtilkali.nm_pagos (
	nmp_cpid
    , nmp_clid
    , nmp_uid
    , nmp_amount
) values (
	1
    , 1
    , 3
    , 900
), (
	2
    , 1
    , 3
    , 900
);

insert into nemachtilkali.nm_dpagom(
	nmdpm_pid
    , nmdpm_mid
) values(
	1
    , 1
);