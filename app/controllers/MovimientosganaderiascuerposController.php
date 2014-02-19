<?php

class MovimientosganaderiascuerposController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        
        $ventasmovimientos = DB::table('ventasmovimientos')->paginate(10);
        $title = "Ventas movimientos";
        return View::make('ventasmovimientos.index', array('title' => $title, 'ventasmovimientos' => $ventasmovimientos));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('ventasmovimientos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// $input = Input::all();
		// var_dump($input);
		// die;

		$rules = [
			'movimientosganaderias_id' => 'exists:movimientosganaderias,id',
			'productos_id' => 'exists:productos,id',
			'caravana' => 'required',
		];


		if (! Movimientosganaderiascuerpo::isValid(Input::all(),$rules)) {
			return Redirect::back()->withInput()->withErrors(Movimientosganaderiascuerpo::$errors);
		}


		$movimientosganaderiascuerpo = new Movimientosganaderiascuerpo;


	  	$movimientosganaderiascuerpo->movimientosganaderias_id = Input::get('movimientosganaderias_id');
		$movimientosganaderiascuerpo->productos_id = Input::get('productos_id');
		$movimientosganaderiascuerpo->caravana = Input::get('caravana');
		$movimientosganaderiascuerpo->kilos = Input::get('kilos',0);
		$movimientosganaderiascuerpo->observaciones = Input::get('observaciones','');

		$movimientosganaderiascuerpo->save();

		return Redirect::to('/movimientosganaderias/' . $movimientosganaderiascuerpo->movimientosganaderias_id);

	}




	public function borrar($id)
	{

		$movimientosganaderiascuerpo = Movimientosganaderiascuerpo::find($id);
		$movimientosganaderias_id = $movimientosganaderiascuerpo->movimientosganaderias_id;
		$movimientosganaderiascuerpo->delete();

		return Redirect::to('/movimientosganaderias/' . $movimientosganaderias_id);
		
	}


    

}
