<?php

class ElementosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $elementos = DB::table('elementos')->paginate(10);
        $title = "Elemento";
        return View::make('elementos.index', array('title' => $title, 'elementos' => $elementos));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('elementos.create');
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

				'grupo_id' => 'required|unique:elementos'

		];


		if (! grupo_id::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(grupo_id::$errors);

		}


		$elemento = new elemento;
		$elemento->grupo_id = Input::get('grupo_id');
		
		$elemento->save();

		return Redirect::to('/elementos');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$elemento = grupo_id::find($id);

		// show the view and pass the nerd to it
		return View::make('elementos.show')
			->with('grupo_id', $elemento);

	}

	/* Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 *movimientomovimientomotivoRespmovimientomotivo*/

	public function edit($id)
	{
		$elemento = grupo_id::find($id);
		$title = "Editar elemento";

        return View::make('elementos.edit', array('title' => $title, 'grupo_id' => $elemento));
	}

	/**
	 * Update the smovimientomotivod rmovimientomotivo in stomoviiento *
	 * @param  int  $id
	 * @return Rmovimientomotivos	 */

	public function update($id) {


		$elemento = grupo_id::find($id);


		$rules = [
				'grupo_id' => 'required|unique:elementos,elemento,' . $id

		];



		if (! grupo_id::isValid(Input::all(),$rules)) {
			
			return Redirect::back()->withInput()->withErrors(grupo_id::$errors);

		}


		$elemento->grupo_id = Input::get('grupo_id');
		$elemento->save();

		return Redirect::to('/elementos');


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
		
		$elemento = grupo_id::find($id)->delete();

		return Redirect::to('/elementos');
	}

   public function search(){

        $term = Input::get('term');

        $elementos = DB::table('elementos')->where('grupo_id', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($elementos) > 0) {

            foreach ($elementos as $elemento)
                {
                    $adevol[] = array(
                        'id' => $elemento->id,
                        'value' => $elemento->grupo_id,
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
