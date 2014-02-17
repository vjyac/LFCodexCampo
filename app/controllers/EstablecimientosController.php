<?php

class EstablecimientosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $establecimientos = DB::table('establecimientos')->paginate(10);
        $title = "Establecimientos";
        return View::make('establecimientos.index', array('title' => $title, 'establecimientos' => $establecimientos));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('establecimientos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		// var_dump(Input::All());
		// die;


		$rules = [
				'establecimiento' => 'required|unique:establecimientos',
				'clientesproveedors_id' => 'required',
				'ciudads_id' => 'required'
		];


		if (! Establecimiento::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Establecimiento::$errors);

		}

		$establecimiento = new Establecimiento;

		$establecimiento->establecimiento = Input::get('establecimiento');
		$establecimiento->clientesproveedors_id = Input::get('clientesproveedors_id');
		$establecimiento->ciudads_id = Input::get('ciudads_id');

		$establecimiento->save();

		return Redirect::to('/establecimientos');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$establecimiento = Establecimiento::find($id);

		// show the view and pass the nerd to it
		return View::make('establecimientos.show')
			->with('establecimiento', $establecimiento);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$establecimiento = Establecimiento::find($id);
		$title = "Editar establecimiento";

        return View::make('establecimientos.edit', array('title' => $title, 'establecimiento' => $establecimiento));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{


		$establecimiento = Establecimiento::find($id);



		$rules = [
				'establecimiento' => 'required|unique:establecimientos,establecimiento,' . $id,
				'ciudads_id' => 'required'
				

		];


		if (! Establecimiento::isValid(Input::all(),$rules)) {
			
			return Redirect::back()->withInput()->withErrors(Establecimiento::$errors);

		}

		$establecimiento->establecimiento = Input::get('establecimiento');
		$establecimiento->clientesproveedors_id = Input::get('clientesproveedors_id');

		$establecimiento->save();

		return Redirect::to('/establecimientos');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$input = Input::all();
		
		$establecimiento = Establecimiento::find($id)->delete();

		return Redirect::to('/establecimientos');
	}



   public function search(){

        $term = Input::get('term');

        $establecimientos = DB::table('establecimientos')->where('establecimiento', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($establecimientos) > 0) {

            foreach ($establecimientos as $establecimiento)
                {
                    $adevol[] = array(
                        'id' => $establecimiento->id,
                        'value' => $establecimiento->establecimiento,
                    );
            }
        } else {
                    $adevol[] = array(
                        'id' => 0,
                        'value' => 'no hay coincidencias para ' .  $term
                    );            
        }

        return json_encode($adevol);


    }
   

	public function finders()
	{


		$texto = Input::get('texto');
		$establecimientos = DB::table('establecimientos')->where('establecimiento', 'like', '%' . $texto . '%')->paginate(10);

        // $establecimientos = DB::table('establecimientos')->get();

        $title = "Buscando Establecimientos";
        return View::make('establecimientos.index', array('title' => $title, 'establecimientos' => $establecimientos));

	}


}
