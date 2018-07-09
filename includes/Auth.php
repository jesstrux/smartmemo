<?php
	class Auth{
		public static function isAdmin(){
			$user = getUsers::byId($_SESSION['user_id']);
			return $user['user_role_id'] == 2;
		}
	}