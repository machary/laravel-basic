<?php

class Role extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'role_name' => 'required'
	);
}
