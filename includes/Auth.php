<?php
	class Auth{
		public static function isAdmin(){
			return $_SESSION['user_role_id'] == 2;
		}
	}