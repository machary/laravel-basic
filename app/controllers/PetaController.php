<?php

class PetaController extends BaseController {

    protected $peta;

    public function __construct(Peta $peta)
    {
        $this->peta = $peta;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('pages.peta');
	}

    public function response(){
        if(Request::ajax()){
          return Peta::all();
        }
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $input = Input::all();
            $validation = Validator::make($input, Peta::$rules);

            if ($validation->passes())
            {
                $this->peta->create($input);

                return Redirect::route('peta.index');
            }

            return Redirect::route('peta.index')
                ->withInput()
                ->withErrors($validation)
                ->with('message', 'There were validation errors.');

	}

    public function simpan(){
        $input = Input::all();
        if(Request::ajax()){
            $validation = Validator::make($input, Peta::$rules);
            if ($validation->passes())
            {
                $this->peta->create($input);
            }
            else{
                return "All field required";
            }

        }
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        //
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        //
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
       //
	}

    public function hapus($id){
       $this->peta->find($id)->delete();
      return Redirect::route('peta.index');
    }

}
