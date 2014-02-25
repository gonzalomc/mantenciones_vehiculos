<?php

class Review extends Eloquent {
	protected $guarded = array();

	public static $rules = array();


	public function vehicle(){
		return $this->belongsTo('Vehicle');
	}
}
