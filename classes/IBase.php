<?php
interface IBase{
	public function beginTransaction();
	public function commit();
	public function rollBack();
}
?>
