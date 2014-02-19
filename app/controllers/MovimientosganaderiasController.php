<?php

class MovimientosganaderiasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $movimientosganaderias = DB::table('movimientosganaderias')->orderBy('id', 'desc')->paginate(10);
        $title = "Movimientos Ganaderias";
        return View::make('movimientosganaderias.index', array('title' => $title, 'movimientosganaderias' => $movimientosganaderias));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('movimientosganaderias.create');
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
			'fecha' => 'required',
			'documentostipos_id' => 'required|exists:documentostipos,id',
			'numero_documento' => 'required',
			'origenlotes_id' => 'required|exists:lotes,id',
			'destinolotes_id' => 'required|exists:lotes,id',
			'grupos_id' => 'required|exists:grupos,id',
			'chofers_id' => 'required|exists:chofers,id',
			'peso_bruto' => 'required|numeric',			
			'peso_tara' => 'required|numeric',
			
		];


		if (! Movimientosganaderia::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Movimientosganaderia::$errors);

		}

		$movimientosganaderia = new Movimientosganaderia;


		$movimientosganaderia->fecha = date("Y-m-d", strtotime(Input::get('fecha')));
		$movimientosganaderia->tipo_movimiento = Input::get('tipo_movimiento');
		$movimientosganaderia->documentostipos_id = Input::get('documentostipos_id');
		$movimientosganaderia->numero_documento = Input::get('numero_documento');
		$movimientosganaderia->origenlotes_id = Input::get('origenlotes_id');
		$movimientosganaderia->destinolotes_id = Input::get('destinolotes_id');
		$movimientosganaderia->grupos_id = Input::get('grupos_id');
		$movimientosganaderia->nro_cabezas = Input::get('nro_cabezas');
		$movimientosganaderia->chofers_id = Input::get('chofers_id');
		$movimientosganaderia->vehiculos_id = Input::get('vehiculos_id');
		$movimientosganaderia->peso_bruto = Input::get('peso_bruto');
		$movimientosganaderia->peso_tara = Input::get('peso_tara');
		$movimientosganaderia->peso_neto = Input::get('peso_neto',0);
		$movimientosganaderia->estado = "abierto";
		

		$movimientosganaderia->save();

		return Redirect::to('/movimientosganaderias');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$movimientosganaderia = Movimientosganaderia::find($id);

		// show the view and pass the nerd to it
		return View::make('movimientosganaderias.show')
			->with('movimientosganaderia', $movimientosganaderia);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$movimientosganaderia = Movimientosganaderia::find($id);
		$title = "Editar Movimiento ganaderia";

        return View::make('movimientosganaderias.edit', array('title' => $title, 'movimientosganaderia' => $movimientosganaderia));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{


		// var_dump(Input::all());
		// die;


		$movimientosganaderia = Movimientosganaderia::find($id);



		$rules = [
			'fecha' => 'required',
			'documentostipos_id' => 'required|exists:documentostipos,id',
			'numero_documento' => 'required',
			'origenlotes_id' => 'required|exists:lotes,id',
			'destinolotes_id' => 'required|exists:lotes,id',
			'grupos_id' => 'required|exists:grupos,id',
			'chofers_id' => 'required|exists:chofers,id',
			'vehiculos_id' => 'required|exists:vehiculos,id',
			'peso_tara' => 'required|numeric',
			'peso_neto' => 'required|numeric',
			
		];

		if (! Movimientosganaderia::isValid(Input::all(),$rules)) {
			return Redirect::back()->withInput()->withErrors(Movimientosganaderia::$errors);
		}

		$movimientosganaderia->fecha = date("Y-m-d", strtotime(Input::get('fecha')));
		$movimientosganaderia->tipo_movimiento = Input::get('tipo_movimiento');
		$movimientosganaderia->documentostipos_id = Input::get('documentostipos_id');
		$movimientosganaderia->numero_documento = Input::get('numero_documento');
		$movimientosganaderia->origenlotes_id = Input::get('origenlotes_id');
		$movimientosganaderia->destinolotes_id = Input::get('destinolotes_id');
		$movimientosganaderia->grupos_id = Input::get('grupos_id');
		$movimientosganaderia->nro_cabezas = Input::get('nro_cabezas');
		$movimientosganaderia->chofers_id = Input::get('chofers_id');
		$movimientosganaderia->vehiculos_id = Input::get('vehiculos_id');
		$movimientosganaderia->peso_bruto = Input::get('peso_bruto');
		$movimientosganaderia->peso_tara = Input::get('peso_tara');
		$movimientosganaderia->peso_neto = Input::get('peso_neto',0);
		$movimientosganaderia->estado = "abierto";
		
		$movimientosganaderia->save();

		return Redirect::to('/movimientosganaderias');


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

		
		$movimiento = Movimientosganaderia::find($id)->delete();

		return Redirect::to('/movimientosganaderias');
	}


































   

}
