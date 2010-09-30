<?php

class User extends UserEntity implements PW {
	public function valid_login($login) {
		return preg_match('#^\S{1,128}$#',$login);
	}
	public function valid_pw($pw) {
		return preg_match('#.{6,64}#',$pw);
	}
	public function encode_pw($pw) {
		return md5($pw);
	}
	public function get_login($id) {
		return $this->getone($id);
	}
}
