<?php

class ChofersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $chofers = DB::table('chofers')->paginate(10);
        $title = "Choferes";
        return View::make('chofers.index', array('title' => $title, 'chofers' => $chofers));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('chofers.create');
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
				'chofer' => 'required|unique:chofers',
				'ciudads_id' => 'required'
		];


		if (! chofer::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(chofer::$errors);

		}

		$chofer = new chofer;

		$chofer->chofer = Input::get('chofer');
		$chofer->domicilio = Input::get('domicilio');
		$chofer->ciudads_id = Input::get('ciudads_id');
		$chofer->dni = Input::get('dni');
		$chofer->licencia = Input::get('licencia');
		$chofer->telefono = Input::get('telefono');
		$chofer->email = Input::get('email');
		$chofer->estado = Input::get('estado');

		$chofer->save();

		return Redirect::to('/chofers');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$chofer = chofer::find($id);

		// show the view and pass the nerd to it
		return View::make('chofers.show')
			->with('chofer', $chofer);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$chofer = chofer::find($id);
		$title = "Editar chofer";

        return View::make('chofers.edit', array('title' => $title, 'chofer' => $chofer));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{


		$chofer = chofer::find($id);



		$rules = [
				'chofer' => 'required|unique:chofers,chofer,' . $id,
				'ciudads_id' => 'required'
				

		];


		if (! chofer::isValid(Input::all(),$rules)) {
			
			return Redirect::back()->withInput()->withErrors(chofer::$errors);

		}

		$chofer->chofer = Input::get('chofer');
		$chofer->domicilio = Input::get('domicilio');
		$chofer->ciudads_id = Input::get('ciudads_id');
		$chofer->dni = Input::get('dni');
		$chofer->licencia = Input::get('licencia');
		$chofer->telefono = Input::get('telefono');
		$chofer->email = Input::get('email');
		$chofer->estado = Input::get('estado');

		$chofer->save();

		return Redirect::to('/chofers');


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
		
		$chofer = chofer::find($id)->delete();

		return Redirect::to('/chofers');
	}

   public function search(){

        $term = Input::get('term');

        $chofers = DB::table('chofers')->where('chofer', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($chofers) > 0) {

            foreach ($chofers as $chofer)
                {
                    $adevol[] = array(
                        'id' => $chofer->id,
                        'value' => $chofer->chofer,
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
