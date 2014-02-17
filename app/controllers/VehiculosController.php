<?php

class VehiculosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $vehiculos = DB::table('vehiculos')->paginate(10);
        $title = "vehiculos";
        return View::make('vehiculos.index', array('title' => $title, 'vehiculos' => $vehiculos));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('vehiculos.create');
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



			// id
			// patente
			// descripcion
			// tara_kg
			// clienteproveedors_id
			// carga_maxima_kg
			// estado



		$rules = [
				'patente' => 'required|unique:vehiculos',
				'clientesproveedors_id' => 'required'
		];



		if (! Vehiculo::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Vehiculo::$errors);

		}

		$vehiculo = new Vehiculo;

		$vehiculo->patente = Input::get('patente');
		$vehiculo->descripcion = Input::get('descripcion');
		$vehiculo->tara_kg = Input::get('tara_kg');
		$vehiculo->clientesproveedors_id = Input::get('clientesproveedors_id');
		$vehiculo->carga_maxima_kg = Input::get('carga_maxima_kg');
		$vehiculo->estado = Input::get('estado');

		$vehiculo->save();

		return Redirect::to('/vehiculos');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$vehiculo = Vehiculo::find($id);

		// show the view and pass the nerd to it
		return View::make('vehiculos.show')
			->with('vehiculo', $vehiculo);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vehiculo = Vehiculo::find($id);
		$title = "Editar vehiculo";

        return View::make('vehiculos.edit', array('title' => $title, 'vehiculo' => $vehiculo));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{



		// var_dump(Input::All());
		// die;


		$vehiculo = Vehiculo::find($id);



		$rules = [
				'patente' => 'required|unique:vehiculos,patente,' . $id,
				'clientesproveedors_id' => 'required'
				

		];


		if (! Vehiculo::isValid(Input::all(),$rules)) {
			
			return Redirect::back()->withInput()->withErrors(Vehiculo::$errors);

		}

		$vehiculo->patente = Input::get('patente');
		$vehiculo->descripcion = Input::get('descripcion');
		$vehiculo->tara_kg = Input::get('tara_kg');
		$vehiculo->clientesproveedors_id = Input::get('clientesproveedors_id');
		$vehiculo->carga_maxima_kg = Input::get('carga_maxima_kg');
		$vehiculo->estado = Input::get('estado');

		$vehiculo->save();

		return Redirect::to('/vehiculos');


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
		
		$vehiculo = Vehiculo::find($id)->delete();

		return Redirect::to('/vehiculos');
	}

   public function search(){

        $term = Input::get('term');

        $vehiculos = DB::table('vehiculos')->where('patente', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($vehiculos) > 0) {

            foreach ($vehiculos as $vehiculo)
                {
                    $adevol[] = array(
                        'id' => $vehiculo->id,
                        'value' => $vehiculo->patente,
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
   

}
