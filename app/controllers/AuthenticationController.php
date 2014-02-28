<?php

class AuthenticationController extends BaseController{

	public $restful = true;

	public function login(){
		Return View::make("login");
	}

	public function auth(){
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))){
		    return Redirect::intended('vehicles');
		}
		else{
			return Redirect::intended('login');
		}
	}
}