--
-- Definition of function `wishlist`.`set_due_date`
--

DROP FUNCTION IF EXISTS `wishlist`.`set_due_date`;

DELIMITER $$

CREATE DEFINER=`root`@`localhost` FUNCTION  `wishlist`.`set_due_date`(
`in_date` VARCHAR(255) CHARSET latin1
) RETURNS varchar(255) CHARSET latin1
    SQL SECURITY INVOKER
BEGIN
return SUBSTR(in_date, 1, length(in_date) - 4);
END $$

DELIMITER ;
