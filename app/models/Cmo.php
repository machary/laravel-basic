<?php

class Cmo extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nama' => 'required',
		'perusahaan' => 'required',
		'jabatan' => 'required',
		'alamat' => 'required',
		'telepon' => 'required',
		'email' => 'required'
	);



}
