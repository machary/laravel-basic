<?php

class Island extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'island' => 'required'
	);

    public function province(){
        return $this->has_many('Province');
    }
}
