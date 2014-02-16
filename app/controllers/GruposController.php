<?php

class GruposController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $grupos = DB::table('grupos')->paginate(10);
        $title = "Grupos";
        return View::make('grupos.index', array('title' => $title, 'grupos' => $grupos));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('grupos.create');
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

				'grupo' => 'required|unique:grupos'

		];


		if (! grupo::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(grupo::$errors);

		}


		$grupo = new grupo;
		$grupo->grupo = Input::get('grupo');
		
		$grupo->save();

		return Redirect::to('/grupos');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$grupo = grupo::find($id);

		// show the view and pass the nerd to it
		return View::make('grupos.show')
			->with('grupo', $grupo);

	}

	/* Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 *movimientomovimientomotivoRespmovimientomotivo*/

	public function edit($id)
	{
		$grupo = grupo::find($id);
		$title = "Editar grupo";

        return View::make('grupos.edit', array('title' => $title, 'grupo' => $grupo));
	}

	/**
	 * Update the smovimientomotivod rmovimientomotivo in stomoviiento *
	 * @param  int  $id
	 * @return Rmovimientomotivos	 */

	public function update($id) {


		$grupo = grupo::find($id);


		$rules = [
				'grupo' => 'required|unique:grupos,grupo,' . $id

		];



		if (! grupo::isValid(Input::all(),$rules)) {
			
			return Redirect::back()->withInput()->withErrors(grupo::$errors);

		}


		$grupo->grupo = Input::get('grupo');
		$grupo->save();

		return Redirect::to('/grupos');


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
		
		$grupo = grupo::find($id)->delete();

		return Redirect::to('/grupos');
	}

   public function search(){

        $term = Input::get('term');

        $grupos = DB::table('grupos')->where('grupo', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($grupos) > 0) {

            foreach ($grupos as $grupo)
                {
                    $adevol[] = array(
                        'id' => $grupo->id,
                        'value' => $grupo->grupo,
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
