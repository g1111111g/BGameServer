<?php
class SQL{
	public static $getUserById = 'SELECT * FROM bgame_user WHERE UserID = :userid';
	public static $getUserByAccountPassword = 'SELECT * FROM bgame_user WHERE Account = :account AND Password = :password';
	public static $updateSessionID = 'UPDATE bgame_user SET SessionID = :sessionid WHERE UserID = :userid';
	public static $insertBgameUser = 'INSERT INTO bgame_user VALUES(:userid, :account, :password, :nickname, :sessionid, now(), now())';
	public static $insertUserCurrency = 'INSERT INTO bgame_user_currency VALUES(:userid, 1, 500),(:userid, 2, 10000)';
	public static $getUserByAccountID = 'SELECT * FROM car_user WHERE AccountID = :accountid';
	public static $getDateList = 'SELECT * FROM car_date';

	public static $getCurrDbIdByTableName = "SELECT CurrId FROM car_ids WHERE TableName = :tname";
	public static $insertDbIdWithTableName = "INSERT INTO car_ids VALUES(:tname, 1);";
	public static $updateDbIdByTableName = "UPDATE car_ids SET CurrId = CurrId + 1 WHERE TableName = :tname";
	public static $getIdFromDb = 'CALL pro_update_and_get_id(:tname)';
}
?>
