<?php

class Province extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'province' => 'required',
		'id_island' => 'required'
	);

    public function island(){
        return $this->belongsTo('Island');
    }
}
