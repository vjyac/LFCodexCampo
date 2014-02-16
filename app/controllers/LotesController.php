<?php

class LotesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $lotes = DB::table('lotes')->paginate(10);
        $title = "Lotes";
        return View::make('lotes.index', array('title' => $title, 'lotes' => $lotes));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('lotes.create');
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
				'lote' => 'required',
				'establecimientos_id' => 'required'
		];


		if (! lote::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(lote::$errors);

		}

		$lote = new lote;

		$lote->lote = Input::get('lote');
		$lote->establecimientos_id = Input::get('establecimientos_id');
		$lote->superficie_m2 = Input::get('superficie_m2');
		$lote->observaciones = Input::get('observaciones');

		$lote->save();

		return Redirect::to('/lotes');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$lote = lote::find($id);

		// show the view and pass the nerd to it
		return View::make('lotes.show')
			->with('lote', $lote);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lote = lote::find($id);
		$title = "Editar lote";

        return View::make('lotes.edit', array('title' => $title, 'lote' => $lote));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{


		$lote = lote::find($id);



		$rules = [
				'lote' => 'required',
				'establecimientos_id' => 'required'

		];

		if (! lote::isValid(Input::all(),$rules)) {
			
			return Redirect::back()->withInput()->withErrors(lote::$errors);

		}

		$lote->establecimientos_id = Input::get('establecimientos_id');
		$lote->lote = Input::get('lote');
		$lote->superficie_m2 = Input::get('superficie_m2');
		$lote->observaciones = Input::get('observaciones');

		$lote->save();

		return Redirect::to('/lotes');


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
		
		$lote = lote::find($id)->delete();

		return Redirect::to('/lotes');
	}

   public function search(){

        $term = Input::get('term');

        $lotes = DB::table('lotes')->where('lote', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($lotes) > 0) {

            foreach ($lotes as $lote)
                {

                	$establecimiento = establecimiento::find($lote->establecimientos_id);
                	$clientesproveedor = clientesproveedor::find($establecimiento->clientesproveedors_id);

                    $adevol[] = array(
                        'id' => $lote->id,
                        'value' => $lote->lote . ', ' . $establecimiento->establecimiento  . ', ' . $clientesproveedor->clientesproveedor,
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
