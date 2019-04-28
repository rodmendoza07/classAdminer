USE `nemachtilkali`;
DROP procedure IF EXISTS `sp_getclientinfo`;

DELIMITER $$
USE `nemachtilkali`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getclientinfo`()
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
        , cc.nmcclas_desc as actividad
        , date_format(lista.nml_createdate, '%d/%m/%Y') as ultimavisita
        , cm.nmcm_desc as tipomembresia
        , date_format(date_add(cm.nmcm_createdate, interval 1 year), '%d/%m/%Y') as expira
    from nm_clientes c
		inner join nm_actividadcliente ac on (c.nmcl_id = ac.nmac_clid)
        inner join nm_catclases cc on (ac.nmac_clasid = cc.nmcclas_id)
        inner join nm_lista lista on (lista.nml_cid = c.nmcl_id and lista.nml_lastvisit = 1)
        inner join nm_pagos p on (p.nmp_clid = c.nmcl_id and p.nmp_status = 1 and p.nmp_cpid = 1)
        inner join nm_dpagom pm on (pm.nmdpm_pid = p.nmp_id) 
        inner join nm_catmembership cm on (pm.nmdpm_mid = cm.nmcm_id);

END$$

DELIMITER ;
