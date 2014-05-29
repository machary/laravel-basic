<?php

class ProvincesController extends BaseController {

	/**
	 * Province Repository
	 *
	 * @var Province
	 */
	protected $province;

	public function __construct(Province $province)
	{
		$this->province = $province;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$provinces = Province::all();

		return View::make('provinces.index', compact('provinces'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $island_options = Island::lists('island','id');
		return View::make('provinces.create',compact('island_options'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Province::$rules);

		if ($validation->passes())
		{
			$this->province->create($input);

			return Redirect::route('provinces.index');
		}

		return Redirect::route('provinces.create')
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
		$province = $this->province->findOrFail($id);

		return View::make('provinces.show', compact('province'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$province = $this->province->find($id);

		if (is_null($province))
		{
			return Redirect::route('provinces.index');
		}

		return View::make('provinces.edit', compact('province'));
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
		$validation = Validator::make($input, Province::$rules);

		if ($validation->passes())
		{
			$province = $this->province->find($id);
			$province->update($input);

			return Redirect::route('provinces.show', $id);
		}

		return Redirect::route('provinces.edit', $id)
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
		$this->province->find($id)->delete();

		return Redirect::route('provinces.index');
	}

}
