<?php 

include 'crud.php';
/**
* Auth Class
*/
class Auth {
	
	public function isAdmin(){
		return ($_SESSION['sess_user']['sess_peran'] == "admin");
	}

	public function isHumas(){
		return ($_SESSION['sess_user']['sess_peran'] == "humas");
	}
	
}

 ?>
