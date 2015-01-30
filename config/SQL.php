<?php
class SQL{
	public static $getUserById = "SELECT * FROM car_user WHERE UserID = :userid";
	public static $getUserByAccountID = "SELECT * FROM car_user WHERE AccountID = :accountid";
	public static $getDateList = "SELECT * FROM car_date";
}
?>
