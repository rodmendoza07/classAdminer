USE `nemachtilkali`;
DROP procedure IF EXISTS `sp_getclientinfopayment`;

DELIMITER $$
USE `nemachtilkali`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getclientinfopayment`()
BEGIN
    DECLARE `_rollback` BOOL DEFAULT 0;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
		SET `_rollback` = 1;
		ROLLBACK;
        RESIGNAL;
    END;
    
    select
		concat(c.nmcl_nombre, ' ', c.nmcl_apaterno, ' ', c.nmcl_amaterno) as nombre_completo
        , case 
			when cc.nmcclas_id = 1 then concat('<span class="bg-info">&nbsp;&nbsp;',cc.nmcclas_desc,'&nbsp;&nbsp;</span>')
            when cc.nmcclas_id = 2 then concat('<span class="bg-success">&nbsp;&nbsp;',cc.nmcclas_desc,'&nbsp;&nbsp;</span>')
            when cc.nmcclas_id = 3 then concat('<span class="bg-warning">&nbsp;&nbsp;',cc.nmcclas_desc,'&nbsp;&nbsp;</span>')
            when cc.nmcclas_id = 4 then concat('<span class="bg-teal">&nbsp;&nbsp;',cc.nmcclas_desc,'&nbsp;&nbsp;</span>')
            end as actividad
        , date_format(p.nmp_createdate, '%d/%m/%Y') as ultimpagorealizado
        , case
			when cm.nmcm_id = 1 then concat('<span class="bg-platinum">&nbsp;&nbsp;',cm.nmcm_desc,'&nbsp;&nbsp;</span>')
            when cm.nmcm_id = 2 then concat('<span class="bg-gold">&nbsp;&nbsp;',cm.nmcm_desc,'&nbsp;&nbsp;</span>')
            when cm.nmcm_id = 3 then concat('<span class="bg-silver">&nbsp;&nbsp;',cm.nmcm_desc,'&nbsp;&nbsp;</span>')
            when cm.nmcm_id = 4 then concat('<span class="bg-danger">&nbsp;&nbsp;',cm.nmcm_desc,'&nbsp;&nbsp;</span>')
            end as tipomembresia
        , date_format(date_add(pm.nmdpm_createdate, interval 1 year), '%d/%m/%Y') as expira
    from nm_clientes c
		inner join nm_actividadcliente ac on (c.nmcl_id = ac.nmac_clid)
        inner join nm_catclases cc on (ac.nmac_clasid = cc.nmcclas_id)
        inner join nm_lista lista on (lista.nml_cid = c.nmcl_id and lista.nml_lastvisit = 1)
        inner join nm_pagos p on (p.nmp_clid = c.nmcl_id and p.nmp_status = 1 and p.nmp_cpid = 1)
        inner join nm_dpagom pm on (pm.nmdpm_pid = p.nmp_id) 
        inner join nm_catmembership cm on (pm.nmdpm_mid = cm.nmcm_id);

END$$

DELIMITER ;
