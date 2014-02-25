<?php

class Vehicle extends Eloquent {
	protected $guarded = array();

	public static $rules = array();


	public function review(){
		return $this->hasMany('Review');
	}
}
