<?php

class Image extends Eloquent {
	protected $guarded = array();
    protected $table = 'images';
    protected $primaryKey = 'id';

	public static $rules = array(
        'id' => 'required',
        'image_path' => 'required',
        'id_post' => 'required'
    );
}
