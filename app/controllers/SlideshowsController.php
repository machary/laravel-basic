<?php

class SlideshowsController extends BaseController {

	/**
	 * Slideshow Repository
	 *
	 * @var Slideshow
	 */
	protected $slideshow;

	public function __construct(Slideshow $slideshow)
	{
		$this->slideshow = $slideshow;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$slideshows = $this->slideshow->all();

		return View::make('slideshows.index', compact('slideshows'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('slideshows.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Slideshow::$rules);

		if ($validation->passes())
		{
            if(Input::hasFile('image')){
                foreach(Input::file('image') as $image){
                    $imagename = time().$image->getClientOriginalName();
                    $upload_path = 'uploads/images/';

                    //make thumbnail for each image
                    Image::make($image->getRealPath())
                        ->resize(100, null, true, false) //resize ($width,$height,$ratio, $upsize )
                        ->save($upload_path.'thumbs/'.$imagename);

                    $image->move($upload_path, $imagename);
                    $input['image'] = $imagename;
                    $this->slideshow->create($input);
                }
            }
            else{
                $input['image'] = '';
            }
			return Redirect::route('slideshows.index');
		}

		return Redirect::route('slideshows.create')
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
		$slideshow = $this->slideshow->findOrFail($id);

		return View::make('slideshows.show', compact('slideshow'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$slideshow = $this->slideshow->find($id);

		if (is_null($slideshow))
		{
			return Redirect::route('slideshows.index');
		}

		return View::make('slideshows.edit', compact('slideshow'));
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
		$validation = Validator::make($input, Slideshow::$rules);

		if ($validation->passes())
		{
			$slideshow = $this->slideshow->find($id);
			$slideshow->update($input);

			return Redirect::route('slideshows.show', $id);
		}

		return Redirect::route('slideshows.edit', $id)
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
		$this->slideshow->find($id)->delete();

		return Redirect::route('slideshows.index');
	}

}
