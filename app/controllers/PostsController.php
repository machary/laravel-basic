<?php

class PostsController extends BaseController {

	/**
	 * Post Repository
	 *
	 * @var Post
	 */
	protected $post;

	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->post->all();

		return View::make('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Post::$rules);

		if ($validation->passes())
		{
			$this->post->create($input);
			return Redirect::route('posts.index');
		}

		return Redirect::route('posts.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $real_id = $this->post->findBySlug($id);
		$post = $this->post->findOrFail($real_id[0]['id']);

		return View::make('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $real_id = $this->post->findBySlug($id);
		$post = $this->post->find($real_id[0]['id']);

		if (is_null($post))
		{
			return Redirect::route('posts.index');
		}

		return View::make('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Post::$rules);

		if ($validation->passes())
		{
            $real_id = $this->post->findBySlug($id);
            $post = $this->post->find($real_id[0]['id']);
			$post->update($input);

			return Redirect::route('posts.show', $id);
		}

		return Redirect::route('posts.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $image = Post::find($id);
        //find old image and delete it
        $destinationPath    = 'uploads/images/'; // The destination where you store the image.
        File::delete($destinationPath. $image['image_path']);
        File::delete($destinationPath.'thumbs/'.$image['image_path']);

        $this->post->find($id)->delete();

		return Redirect::route('posts.index');
	}

}
