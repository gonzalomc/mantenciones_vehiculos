<?php

class AuthenticationController extends BaseController{

	public $restful = true;

	public function login(){
		Return View::make("login");
	}

	public function auth(){
		$input = Input::all();
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))){
		    return Redirect::intended('vehicles');
		}
		else{
			return Redirect::to('login')->with('message','Error al ingresar los datos')->withInput();
		}
	}
}