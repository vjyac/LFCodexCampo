<?php

class GrupoalertasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $grupoalertas = DB::table('grupoalertas')->paginate(10);
        $title = "Grupo Alertas";
        return View::make('grupoalertas.index', array('title' => $title, 'grupoalertas' => $grupoalertas));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('grupoalertas.create');
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
				'grupo_id' => 'required|unique:grupoalertas',
				//'ciudads_id' => 'required'
		];


		if (! grupoalerta::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(grupoalerta::$errors);

		}

		$grupoalerta = new grupoalerta;

		$grupoalerta->grupo_id = Input::get('grupo_id');
		$grupoalerta->fecha = Input::get('fecha');
		$grupoalerta->alerta = Input::get('grupoalerta');
		//$chofer->dni = Input::get('dni');
		//$chofer->licencia = Input::get('licencia');
		//$chofer->telefono = Input::get('telefono');
		//$chofer->email = Input::get('email');

		$grupoalerta->save();

		return Redirect::to('/grupoalertas');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$grupoalerta = grupoalerta::find($id);

		// show the view and pass the nerd to it
		return View::make('grupoalertas.show')
			->with('grupoalerta', $grupoalerta);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$grupoalerta = grupoalerta::find($id);
		$title = "Editar grupoalerta";

        return View::make('grupoalertas.edit', array('title' => $title, 'grupoalerta' => $grupoalerta));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{


		$grupoalerta = grupoalerta::find($id);



		$rules = [
				'grupo_id' => 'required|unique:grupoalertas,grupoalerta,' . $id,
				'fecha' => 'required'
				'alerta' => 'required'
				

		];


		if (! grupoalerta::isValid(Input::all(),$rules)) {
			
			return Redirect::back()->withInput()->withErrors(grupoalerta::$errors);

		}

		$grupoalerta->grupo_id = Input::get('grupo_id');
		$grupoalerta->fecha = Input::get('fecha');
		$grupoalerta->alerta = Input::get('grupoalerta');
		//$chofer->dni = Input::get('dni');
		//$chofer->licencia = Input::get('licencia');
		//$chofer->telefono = Input::get('telefono');
		//$chofer->email = Input::get('email');

		$grupoalerta->save();

		return Redirect::to('/grupoalertas');


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
		
		$grupoalerta = grupoalerta::find($id)->delete();

		return Redirect::to('/grupoalertas');
	}

   public function search(){

        $term = Input::get('term');

        $grupoalertas = DB::table('grupoalertas')->where('alerta', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($grupoalertas) > 0) {

            foreach ($grupoalertas as $grupoalerta)
                {
                    $adevol[] = array(
                        'id' => $grupoalerta->id,
                        'value' => $grupoalerta->grupoalerta,
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
