<?php

class RolesController extends BaseController {

	/**
	 * Role Repository
	 *
	 * @var Role
	 */
	protected $role;

	public function __construct(Role $role)
	{
		$this->role = $role;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = $this->role->all();

		return View::make('roles.index', compact('roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('roles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Role::$rules);

		if ($validation->passes())
		{
			$this->role->create($input);

			return Redirect::route('roles.index');
		}

		return Redirect::route('roles.create')
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
		$role = $this->role->findOrFail($id);

		return View::make('roles.show', compact('role'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role = $this->role->find($id);

		if (is_null($role))
		{
			return Redirect::route('roles.index');
		}

		return View::make('roles.edit', compact('role'));
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
		$validation = Validator::make($input, Role::$rules);

		if ($validation->passes())
		{
			$role = $this->role->find($id);
			$role->update($input);

			return Redirect::route('roles.show', $id);
		}

		return Redirect::route('roles.edit', $id)
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
		$this->role->find($id)->delete();

		return Redirect::route('roles.index');
	}

}
