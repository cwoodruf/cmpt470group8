<?php
class User extends LoginEntity implements PW {
    public function __construct() {
        parent::__construct();
        // the 'Check' key tells the model to look for a static method in the 'Check' class
        $this->schema['email']['checker']['Check'] = 'isemail';
	$this->schema['password']['modifier']['Login'] = 'encode';
    }
    public function valid_login($login) {
        return preg_match('#^\S{1,128}$#',$login);
    }   
    public function valid_pw($pw) {
        return preg_match('#.{6,64}#',$pw);
    }   
    public function encode_pw($pw) {
        // trivial clear text:
        // return $pw;
        // more typical: 
        return Login::encode($pw);
    }   
    public function get_login($id) {
        return $this->getone($id);
    }   
} 
