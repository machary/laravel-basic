<?php

class Slideshow extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'image' => 'required'
	);
}
