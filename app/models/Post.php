<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Eloquent implements SluggableInterface
{
	protected $guarded = array();

	public static $rules = array(
		'author' => 'required',
		'title' => 'required',
		'content' => 'required',
		'status' => 'required'

	);
    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug'
    );

}
