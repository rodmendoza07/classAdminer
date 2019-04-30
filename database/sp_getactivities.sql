USE `nemachtilkali`;
DROP procedure IF EXISTS `sp_getactivities`;

DELIMITER $$
USE `nemachtilkali`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getactivities`()
BEGIN
    DECLARE `_rollback` BOOL DEFAULT 0;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
		SET `_rollback` = 1;
		ROLLBACK;
        RESIGNAL;
    END;
    
    select
		cc.nmcclas_id as val
		, case 
			when cc.nmcclas_id = 1 then concat('<span class="bg-info">&nbsp;&nbsp;',cc.nmcclas_desc,'&nbsp;&nbsp;</span>')
            when cc.nmcclas_id = 2 then concat('<span class="bg-success">&nbsp;&nbsp;',cc.nmcclas_desc,'&nbsp;&nbsp;</span>')
            when cc.nmcclas_id = 3 then concat('<span class="bg-warning">&nbsp;&nbsp;',cc.nmcclas_desc,'&nbsp;&nbsp;</span>')
            when cc.nmcclas_id = 4 then concat('<span class="bg-teal">&nbsp;&nbsp;',cc.nmcclas_desc,'&nbsp;&nbsp;</span>')
		end as actividad
	from nm_catclases cc;

END$$

DELIMITER ;
