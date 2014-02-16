<?php

class DocumentostiposController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $documentostipos = DB::table('documentostipos')->paginate(10);
        $title = "Documentos Tipos";
        return View::make('documentostipos.index', array('title' => $title, 'documentostipos' => $documentostipos));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('documentostipos.create');
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
				'documentostipo' => 'required|unique:documentostipos'

		];


		if (! documentostipo::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(documentostipo::$errors);

		}

		$documentostipo = new documentostipo;

		$documentostipo->documentostipo = Input::get('documentostipo');

		$documentostipo->save();

		return Redirect::to('/documentostipos');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$documentostipo = documentostipo::find($id);

		// show the view and pass the nerd to it
		return View::make('documentostipos.show')
			->with('documentostipo', $documentostipo);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$documentostipo = documentostipo::find($id);
		$title = "Editar documentos tipos";

        return View::make('documentostipos.edit', array('title' => $title, 'documentostipo' => $documentostipo));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$documentostipo = documentostipo::find($id);

		$rules = [
				'documentostipo' => 'required|unique:documentostipos,documentostipo,' . $id
		];

		if (! documentostipo::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(documentostipo::$errors);

		}

		$documentostipo->documentostipo = Input::get('documentostipo');

		$documentostipo->save();

		return Redirect::to('/documentostipos');


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
		
		$documentostipo = documentostipo::find($id)->delete();

		return Redirect::to('/documentostipos');
	}


   public function search(){

        $term = Input::get('term');

        $documentostipos = DB::table('documentostipos')->where('documentostipo', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($documentostipos) > 0) {

            foreach ($documentostipos as $documentostipo)
                {
                    $adevol[] = array(
                        'id' => $documentostipo->id,
                        'value' => $documentostipo->documentostipo,
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
