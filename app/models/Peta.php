<?php

class Peta extends Eloquent {
	protected $guarded = array();
    protected $table = "coordinate";

	public static $rules = array(
        'lat' =>'required',
        'long'=>'required',
        'title' => 'required'
    );
}
