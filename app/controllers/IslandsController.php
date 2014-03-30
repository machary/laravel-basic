<?php

class IslandsController extends BaseController {

	/**
	 * Island Repository
	 *
	 * @var Island
	 */
	protected $island;

	public function __construct(Island $island)
	{
		$this->island = $island;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$islands = $this->island->all();

		return View::make('islands.index', compact('islands'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('islands.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Island::$rules);

		if ($validation->passes())
		{
			$this->island->create($input);

			return Redirect::route('islands.index');
		}

		return Redirect::route('islands.create')
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
		$island = $this->island->findOrFail($id);

		return View::make('islands.show', compact('island'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$island = $this->island->find($id);

		if (is_null($island))
		{
			return Redirect::route('islands.index');
		}

		return View::make('islands.edit', compact('island'));
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
		$validation = Validator::make($input, Island::$rules);

		if ($validation->passes())
		{
			$island = $this->island->find($id);
			$island->update($input);

			return Redirect::route('islands.show', $id);
		}

		return Redirect::route('islands.edit', $id)
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
		$this->island->find($id)->delete();

		return Redirect::route('islands.index');
	}

}
