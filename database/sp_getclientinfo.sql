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
		concat(c.nmcl_nombre, ' ', c.nmcl_apaterno, ' ', c.nmcl_amaterno) as nombre
        , cc.nmcclas_desc as actividad
        , date_format(l.nml_createdate, '%d/%m/%Y') as lastvisit
        , cm.nmcm_desc as memtype
        , date_format(p.nmp_memdatef, '%d/%m/%Y') as expires
    from nm_clientes c
		inner join nm_actividadcliente ac on (c.nmcl_id = ac.nmac_clid)
        inner join nm_catclases cc on (ac.nmac_clasid = cc.nmcclas_id)
        inner join nm_lista l on (l.nml_cid = c.nmcl_id and l.nml_lastvisit = 1)
        inner join nm_pagos p on (p.nmp_client = c.nmcl_id and nmp_memstatus = 1)
        inner join nm_catmembership cm on (cm.nmcm_id = p.nmp_memtype);

END$$

DELIMITER ;
