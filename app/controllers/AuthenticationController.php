<?php

class AuthenticationController extends BaseController{

	public $restful = true;

	public function login(){
		if (Auth::user()){
			Return Redirect::to('vehicles');
		}
		Return View::make("login");
	}

	public function auth(){
		$input = Input::all();
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))){
		    return Redirect::intended('vehicles');
		}
		return Redirect::to('login')->with('message','Error al ingresar los datos')->withInput();
		
	}
}