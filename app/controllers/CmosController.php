<?php

class CmosController extends BaseController {

	/**
	 * Cmo Repository
	 *
	 * @var Cmo
	 */
	protected $cmo;

	public function __construct(Cmo $cmo)
	{
		$this->cmo = $cmo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //$obj_cmos = Cmo::select(array('cmos.id','cmos.nama','cmos.perusahaan'));

        //return Datatables::of($obj_cmos)->make();

		$cmos = $this->cmo->all();

		return View::make('cmos.index', compact('cmos'));
	}

    public function response(){
        if(Request::ajax()){
            $obj_cmos = Cmo::select(array('cmos.id','cmos.nama','cmos.perusahaan','cmos.jabatan','cmos.alamat','cmos.telepon','cmos.email'));
            return Datatables::of($obj_cmos)
               ->add_column('Operations','<a href="cmos/{{ $id }}/edit">edit</a>')
               ->remove_column('id') //bisa hapus kalo ga perlu
               ->make();
        }
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cmos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Cmo::$rules);

		if ($validation->passes())
		{
			$this->cmo->create($input);

			return Redirect::route('cmos.index');
		}

		return Redirect::route('cmos.create')
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
		$cmo = $this->cmo->findOrFail($id);

		return View::make('cmos.show', compact('cmo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cmo = $this->cmo->find($id);

		if (is_null($cmo))
		{
			return Redirect::route('cmos.index');
		}

		return View::make('cmos.edit', compact('cmo'));
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
		$validation = Validator::make($input, Cmo::$rules);

		if ($validation->passes())
		{
			$cmo = $this->cmo->find($id);
			$cmo->update($input);

			return Redirect::route('cmos.show', $id);
		}

		return Redirect::route('cmos.edit', $id)
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
		$this->cmo->find($id)->delete();

		return Redirect::route('cmos.index');
	}

}
