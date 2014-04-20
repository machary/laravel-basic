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
            if(Input::hasFile('image_path')){
                $destinationPath    = 'uploads/images/'; // The destination were you store the image.
                $file = Input::file('image_path');
                $filename = $file->getClientOriginalName(); // Original file name that the end user used for it.
                Image::make($file->getRealPath())
                       ->resize(null, 100, true, false) //resize ($width,$height,$ratio, $upsize )
                       ->save($destinationPath.'thumbs/'.$filename);

                $file->move($destinationPath, $filename); // Now we move the file to its new home.
                $input['image_path'] = $filename;
            }
            else{
                $input['image_path'] = '';
            }

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
		$post = $this->post->findOrFail($id);

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
		$post = $this->post->find($id);

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
            $oldimage = Post::find($id);
            if(Input::hasFile('image_path')){
                $destinationPath    = 'uploads/images/'; // The destination were you store the image.
                $file = Input::file('image_path');
                $filename = $file->getClientOriginalName(); // Original file name that the end user used for it.

                //find old image and delete it
                File::delete($destinationPath. $oldimage['image_path']);
                File::delete($destinationPath.'thumbs/'.$oldimage['image_path']);

                Image::make($file->getRealPath())
                    ->resize(null, 100, true, false) //resize ($width,$height,$ratio, $upsize )
                    ->save($destinationPath.'thumbs/'.$filename);

                $file->move($destinationPath, $filename); // Now we move the file to its new home.
                $input['image_path'] = $filename;
            }
            else{
                $input['image_path'] = $oldimage['image_path'];
            }

			$post = $this->post->find($id);
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
        $destinationPath    = 'uploads/images/'; // The destination were you store the image.
        File::delete($destinationPath. $image['image_path']);
        File::delete($destinationPath.'thumbs/'.$image['image_path']);

        $this->post->find($id)->delete();

		return Redirect::route('posts.index');
	}

}
