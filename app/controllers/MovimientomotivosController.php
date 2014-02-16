<?php

class MovimientomotivosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $movimientomotivos = DB::table('movimientomotivos')->paginate(10);
        $title = "Movimiento motivos";
        return View::make('movimientomotivos.index', array('title' => $title, 'movimientomotivos' => $movimientomotivos));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('movimientomotivos.create');
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

				'movimientomotivo' => 'required|unique:movimientomotivos'

		];


		if (! movimientomotivo::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(movimientomotivo::$errors);

		}


		$movimientomotivo = new movimientomotivo;
		$movimientomotivo->movimientomotivo = Input::get('movimientomotivo');
		
		$movimientomotivo->save();

		return Redirect::to('/movimientomotivos');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$movimientomotivo = movimientomotivo::find($id);

		// show the view and pass the nerd to it
		return View::make('movimientomotivos.show')
			->with('movimientomotivo', $movimientomotivo);

	}

	/* Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 *movimientomovimientomotivoRespmovimientomotivo*/

	public function edit($id)
	{
		$movimientomotivo = movimientomotivo::find($id);
		$title = "Editar movimiento";

        return View::make('movimientomotivos.edit', array('title' => $title, 'movimientomotivo' => $movimientomotivo));
	}

	/**
	 * Update the smovimientomotivod rmovimientomotivo in stomoviiento *
	 * @param  int  $id
	 * @return Rmovimientomotivos	 */

	public function update($id) {


		$movimientomotivo = movimientomotivo::find($id);


		$rules = [
				'movimientomotivo' => 'required|unique:movimientomotivos,movimientomotivo,' . $id

		];



		if (! movimientomotivo::isValid(Input::all(),$rules)) {
			
			return Redirect::back()->withInput()->withErrors(movimientomotivo::$errors);

		}


		$movimientomotivo->movimientomotivo = Input::get('movimientomotivo');
		$movimientomotivo->save();

		return Redirect::to('/movimientomotivos');


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
		
		$movimientomotivo = movimientomotivo::find($id)->delete();

		return Redirect::to('/movimientomotivos');
	}

   public function search(){

        $term = Input::get('term');

        $movimientomotivos = DB::table('movimientomotivos')->where('movimientomotivo', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($movimientomotivos) > 0) {

            foreach ($movimientomotivos as $movimientomotivo)
                {
                    $adevol[] = array(
                        'id' => $movimientomotivo->id,
                        'value' => $movimientomotivo->movimientomotivo,
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
