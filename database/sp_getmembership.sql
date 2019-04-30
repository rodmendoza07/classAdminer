USE `nemachtilkali`;
DROP procedure IF EXISTS `sp_getmembership`;

DELIMITER $$
USE `nemachtilkali`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getmembership`()
BEGIN
    DECLARE `_rollback` BOOL DEFAULT 0;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
		SET `_rollback` = 1;
		ROLLBACK;
        RESIGNAL;
    END;
    
    select
		cm.nmcm_id as val
		, case
			when cm.nmcm_id = 1 then concat('<span class="bg-platinum">&nbsp;&nbsp;',cm.nmcm_desc,'&nbsp;&nbsp;</span>')
            when cm.nmcm_id = 2 then concat('<span class="bg-gold">&nbsp;&nbsp;',cm.nmcm_desc,'&nbsp;&nbsp;</span>')
            when cm.nmcm_id = 3 then concat('<span class="bg-silver">&nbsp;&nbsp;',cm.nmcm_desc,'&nbsp;&nbsp;</span>')
            when cm.nmcm_id = 4 then concat('<span class="bg-danger">&nbsp;&nbsp;',cm.nmcm_desc,'&nbsp;&nbsp;</span>')
		end as membership
		from nm_catmembership cm;

END$$

DELIMITER ;
