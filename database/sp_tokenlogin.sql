USE `nemachtilkali`;
DROP procedure IF EXISTS `sp_tokenlogin`;

DELIMITER $$
USE `nemachtilkali`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tokenlogin`(
	in username varchar(50)
    , in passwordd varchar(50)
    )
BEGIN
    declare comparepass1 varchar(50);
    declare comparepass2 varchar(50);
	declare activetoken int;
    declare tokenid int;
    declare megakey varchar(50);
    declare userid int;
    declare tokencompare1 varchar(50);
    DECLARE `_rollback` BOOL DEFAULT 0;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
		SET `_rollback` = 1;
		ROLLBACK;
        RESIGNAL;
    END;
    
    set userid = (select ifnull(nmu_id,0) from nm_usuario where nmu_uname = username);
    set activetoken = (select count(*) from nm_usess where nmus_status = 1 and nmus_userid = userid );
    set tokenid = (select nmus_id from nm_usess where nmus_status = 1 and nmus_userid = userid );
    set megakey = (select nmconf_value from nm_config where nmconf_id = 1);
    set comparepass1 = (select md5(concat(username,'__',passwordd,megakey)));
    set comparepass2 = (select nmu_pass from nm_usuario where nmu_id = userid);
    set tokencompare1 = (select md5(concat(username,megakey,'-',curdate(),'-',passwordd)));
    
    if comparepass1 = comparepass2 then
		if activetoken = 0 then
			START TRANSACTION;
			update nm_usess set
				nmus_status = 0
			where nmus_id = tokenid;
            insert into nm_usess (
				nmus_token
                , nmus_userid
            ) values (
				tokencompare1
                , userid
            );
            IF `_rollback` THEN
					SIGNAL SQLSTATE '45000'
					SET message_text = 'Algo ha ido mal, intentalo más tarde.';
			ELSE
				COMMIT;
                select tokencompare1 as response;
			end if;
		else
				START TRANSACTION;
				update nm_usess set
					nmus_status = 0
				where nmus_id = tokenid;
				insert into nm_usess (
					nmus_token
					, nmus_userid
				) values (
					tokencompare1
					, userid
				);
				IF `_rollback` THEN
						SIGNAL SQLSTATE '45000'
						SET message_text = 'Algo ha ido mal, intentalo más tarde.';
				ELSE
					COMMIT;
					select tokencompare1 as response;
				end if;
		end if;
	else
		SIGNAL SQLSTATE '45000'
		SET message_text = 'Credenciales inválidas2.';
    end if;

END$$

DELIMITER ;
