USE `nemachtilkali`;
DROP procedure IF EXISTS `sp_getinfouser`;

DELIMITER $$
USE `nemachtilkali`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getinfouser`(
	in tokken varchar(50)
)
BEGIN
    declare userid int;
    declare nombrecompleto varchar(100);
    declare roles int;
    declare roled varchar(50);
    DECLARE `_rollback` BOOL DEFAULT 0;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
		SET `_rollback` = 1;
		ROLLBACK;
        RESIGNAL;
    END;
    
    set userid = (select nmus_userid from nm_usess where nmus_token = tokken and nmus_status = 1);
    
    if userid > 0 then
		set nombrecompleto = (select concat(u.nmu_nombre, ' ', u.nmu_apaterno, ' ' , u.nmu_materno) from nm_usuario u where u.nmu_id = userid);
        set roles = (select nmu_catu from nm_usuario where nmu_id = userid);
        set roled = (select nmcu_desc from nm_catusers where nmcu_id = roles);
        
        select
			nombrecompleto
            , roled as job
			, a.nmapp_link as link
        from nm_appmenu a
        where a.nmapp_cuid = roles;
	else
		SIGNAL SQLSTATE '45000'
		SET message_text = 'Sin privilegios.';
    end if;

END$$

DELIMITER ;
