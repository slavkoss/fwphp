--
-- Definition of function `wishlist`.`format_due_date`
--

DROP FUNCTION IF EXISTS `wishlist`.`format_due_date`;

DELIMITER $$

CREATE DEFINER=`root`@`localhost` FUNCTION  `wishlist`.`format_due_date`(
`in_date` VARCHAR(255) CHARSET latin1
) RETURNS varchar(255) CHARSET latin1
    SQL SECURITY INVOKER
BEGIN
return CONCAT(in_date, SPACE(1), 'UTC');
END $$

DELIMITER ;
