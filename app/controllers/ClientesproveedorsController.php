<?php

class ClientesproveedorsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $clientesproveedors = DB::table('clientesproveedors')->paginate(10);
        $title = "Clientes & Proveedores";
        return View::make('clientesproveedors.index', array('title' => $title, 'clientesproveedors' => $clientesproveedors));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('clientesproveedors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		// var_dump(Input::all());
		// die;


		$rules = [
			'clientesproveedor' => 'required|unique:clientesproveedors',
			'ciudads_id' => 'exists:ciudads,id'
		];


		if (! Clientesproveedor::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Clientesproveedor::$errors);

		}

/*

	id
	clientesproveedor
	tipo
	ciudads_id
	direccion
	telefono
	email
	estado

*/

		$clientesproveedor = new Clientesproveedor;

		$clientesproveedor->clientesproveedor = Input::get('clientesproveedor');
		$clientesproveedor->tipo = Input::get('tipo');
		$clientesproveedor->ciudads_id = Input::get('ciudads_id');
		$clientesproveedor->direccion = Input::get('direccion');
		$clientesproveedor->telefono = Input::get('telefono');
		$clientesproveedor->email = Input::get('email');
		$clientesproveedor->estado = Input::get('estado');

		$clientesproveedor->save();

		return Redirect::to('/clientesproveedors');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$clientesproveedor = Clientesproveedor::find($id);

		// show the view and pass the nerd to it
		return View::make('clientesproveedors.show')
			->with('clientesproveedor', $clientesproveedor);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$clientesproveedor = Clientesproveedor::find($id);
		$title = "Editar clientesproveedor";

        return View::make('clientesproveedors.edit', array('title' => $title, 'clientesproveedor' => $clientesproveedor));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{



		$clientesproveedor = Clientesproveedor::find($id);

		$rules = [
			'clientesproveedor' => 'required|unique:clientesproveedors,clientesproveedor,' . $id,
			'ciudads_id' => 'exists:ciudads,id'
		];


		if (! Clientesproveedor::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Clientesproveedor::$errors);

		}

		$clientesproveedor->clientesproveedor = Input::get('clientesproveedor');
		$clientesproveedor->tipo = Input::get('tipo');
		$clientesproveedor->ciudads_id = Input::get('ciudads_id');
		$clientesproveedor->direccion = Input::get('direccion');
		$clientesproveedor->telefono = Input::get('telefono');
		$clientesproveedor->email = Input::get('email');
		$clientesproveedor->estado = Input::get('estado');

		$clientesproveedor->save();

		return Redirect::to('/clientesproveedors');

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

		
		$clientesproveedor = Clientesproveedor::find($id)->delete();

		return Redirect::to('/clientesproveedors');
	}

   public function search(){

        $term = Input::get('term');

        $clientesproveedors = DB::table('clientesproveedors')->where('clientesproveedor', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($clientesproveedors) > 0) {

            foreach ($clientesproveedors as $clientesproveedor)
                {
                    $adevol[] = array(
                        'id' => $clientesproveedor->id,
                        'value' => $clientesproveedor->clientesproveedor,
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
