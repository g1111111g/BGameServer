<?php
class SQL{
	public static $getUserById = 'SELECT * FROM car_user WHERE UserID = :userid';
	public static $getUserByAccountID = 'SELECT * FROM car_user WHERE AccountID = :accountid';
	public static $getDateList = 'SELECT * FROM car_date';

	public static $getCurrDbIdByTableName = "SELECT CurrId FROM car_ids WHERE TableName = :tname";
	public static $insertDbIdWithTableName = "INSERT INTO car_ids VALUES(:tname, 1);";
	public static $updateDbIdByTableName = "UPDATE car_ids SET CurrId = CurrId + 1 WHERE TableName = :tname";
	public static $getIdFromDb = 'CALL update_and_get_id(:tablename)';
}
?>
