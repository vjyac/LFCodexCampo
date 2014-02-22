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
			'movimientomotivos_id' => 'required|exists:movimientomotivos,id',
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
		$movimientosganaderia->movimientomotivos_id = Input::get('movimientomotivos_id');
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
			'movimientomotivos_id' => 'required|exists:movimientomotivos,id',
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
		$movimientosganaderia->movimientomotivos_id = Input::get('movimientomotivos_id');
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




	public function cerrar($id)
	{


		// busco el movimiento ganaderia
		$movimientosganaderia = Movimientosganaderia::find($id);
		
		// sumatoria de kilos de movimientos ganaderia cuerpo
		$kilos = DB::table('movimientosganaderiascuerpos')
							->where('movimientosganaderias_id', '=', $id)
							->sum('kilos');

		// cantidad de items en movimiento ganaderia cuerpo
		$cuerpos = intval(DB::table('movimientosganaderiascuerpos')
							->where('movimientosganaderias_id', '=', $id)
							->count());

		// cantidad de items vacios si existiera en movimiento ganaderia cuerpo
		$cuerpos_vacios = intval(DB::table('movimientosganaderiascuerpos')
							->where('movimientosganaderias_id', '=', $id)
							->where('kilos', '=', '0')
							->count());



		$peso_neto = $movimientosganaderia->peso_neto;

		$cuerpo_kilos_nuevo = 0;

		if ($cuerpos_vacios > 0) {
			if ($peso_neto > 0) {

				$peso_neto_restante = $peso_neto - $kilos;

				if ($peso_neto_restante <= 0 ) {
					return Redirect::back()->with('message', 'No puedo cerrar porque si al Peso Neto le descuento los kilos ya cargados no sobra nada para agrear al item sobrante.');	
				}

				$cuerpo_kilos_nuevo = $peso_neto_restante / $cuerpos_vacios;

				DB::table('movimientosganaderiascuerpos')
		        	->where('movimientosganaderias_id', '=', $id)
		        	->where('kilos', '=', 0)
		        	->update(array('kilos' => $cuerpo_kilos_nuevo));
			}
			
		}

		DB::table('movimientosganaderias')
        	->where('id', '=', $id)
        	->update(array('estado' => 'cerrado'));



		$movimientosganaderiascuerpos = DB::table('movimientosganaderiascuerpos')
							->where('movimientosganaderias_id', '=', $id)
							->get();



		foreach ($movimientosganaderiascuerpos as $movimientosganaderiascuerpo)
			{


				// Verifica que la caravana exista, sino la agrega
				$caravana = DB::table('caravanas')
		        	->where('caravana', '=', $movimientosganaderiascuerpo->caravana)
		        	->first();

				if ($caravana)
					{
						$caravana_id = $caravana->id;
						$caravana = Caravana::find($caravana->id);
					} else {
						$caravana = new Caravana;

					}

					if ($movimientosganaderia->tipo_movimiento=='ingreso') {
						$caravana->estado = 'viva';
					} elseif ($movimientosganaderia->tipo_movimiento=='egreso') {
						$caravana->estado = 'vendida';
					} else {
						$caravana->estado = 'muerta';
					}

					$caravana->caravana = $movimientosganaderiascuerpo->caravana;
					$caravana->save();
					$caravana_id = $caravana->id;


				$movimientoscaravanasgrupos = DB::table('movimientoscaravanasgrupos')
					->where('movimientosganaderias_id', '=', $movimientosganaderia->id)
					->where('caravanas_id', '=', $caravana_id)
					->where('grupos_id', '=', $movimientosganaderia->grupos_id)
					->first();


				// var_dump($movimientoscaravanasgrupos);
				// die;

				if (is_null($movimientoscaravanasgrupos)) {
					$movimientoscaravanasgrupos = new Movimientoscaravanasgrupo();
				} else {
					$movimientoscaravanasgrupos_id = $movimientoscaravanasgrupos->id;
					
					$movimientoscaravanasgrupos = Movimientoscaravanasgrupo::find($movimientoscaravanasgrupos_id);
				}
					// Agrega o actualiza el movimiento de la caravana en el grupo

					$movimientoscaravanasgrupos->movimientosganaderias_id = $movimientosganaderia->id;
					$movimientoscaravanasgrupos->caravanas_id = $caravana_id;
					$movimientoscaravanasgrupos->grupos_id = $movimientosganaderia->grupos_id;
					$movimientoscaravanasgrupos->kilos = $movimientosganaderiascuerpo->kilos;

					$movimientoscaravanasgrupos->save();





			}
		




		return Redirect::to('/movimientosganaderias/');
		
	}


















	public function showfleteporproveedor()
	{

		$title = "Reporte fletes por proveedor";
        return View::make('movimientosganaderias.showfleteporproveedor', array('title' => $title));

	}




	public function reportefleteporproveedor()
	{

		$rules = [
			'fecha_desde' => 'required',
			'fecha_hasta' => 'required',
			'proveedorcliente_id' => 'required|exists:clientesproveedors,id',
		];


		if (! Movimientosganaderia::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Movimientosganaderia::$errors);

		}

		$proveedorcliente_id = Input::get('proveedorcliente_id');

		$clientesproveedor = Clientesproveedor::find($proveedorcliente_id);

		$productos_id = Input::get('productos_id',0);
		

		$fecha_desde = date("Y-m-d", strtotime(Input::get('fecha_desde')));
		$fecha_hasta = date("Y-m-d", strtotime(Input::get('fecha_hasta')));	


		$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('CodexControl.com');
		$pdf->SetTitle('Fletes por Proveedor');

		// set default header data
		// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, 'CodexCampo', 'by Codex S.R.L. - www.codexcontrol.com');

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('dejavusans', '', 10); 

		// add a page
		$pdf->AddPage();


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		$html = "";

		$html .= '<h1>Ganaderia Fletes por proveedor</h1><br>';
		$html .= '<h4>Proveedor: ' . $clientesproveedor->clientesproveedor . '</h4>';
		
		$html .= '<h4>desde: ' . $fecha_desde . ' hasta: ' . $fecha_hasta . '</h4>';


		$total_peso_neto = 0;

		$vehiculos = DB::table('vehiculos')
		->where('clientesproveedors_id', '=', $proveedorcliente_id)->get();

		foreach ($vehiculos as $vehiculo) 
		{


				$movimientosganaderias = DB::table('movimientosganaderias')
				->where('vehiculos_id', '=', $vehiculo->id)
				->where('fecha', '>=', $fecha_desde)
				->where('fecha', '<=', $fecha_hasta);
				$movimientosganaderias = $movimientosganaderias->orderBy('fecha');
				$movimientosganaderias = $movimientosganaderias->get();


				if (count($movimientosganaderias)) {

					$html .= "<h4>Vehiculo: " . $vehiculo->patente . "</h4>";
					$html .= "<table>";

					$html .= "<tr>";
				        $html .= "<td width=\"10%\">Fecha</td>";
				        $html .= "<td width=\"20%\">Nro Doc</td>";
				        $html .= "<td width=\"20%\">Origen</td>";
				        $html .= "<td width=\"20%\">Destino</td>";
				        $html .= "<td width=\"10%\" align=\"right\">P. Bruto</td>";
				        $html .= "<td width=\"10%\" align=\"right\">P. Tara</td>";
				        $html .= "<td width=\"10%\" align=\"right\">P. Neto</td>";

					$html .= "</tr>";


					foreach ($movimientosganaderias as $movimientosganaderia)

						{

							$documentostipo = Documentostipo::find($movimientosganaderia->documentostipos_id);
							$origenlote = Lote::find($movimientosganaderia->origenlotes_id);
							$destinolote = Lote::find($movimientosganaderia->destinolotes_id);
							$establecimientoorigen = Establecimiento::find($origenlote->establecimientos_id);
							$establecimientodestino = Establecimiento::find($destinolote->establecimientos_id);

							$html .= "<tr>";
							$html .= "<td>" . $movimientosganaderia->fecha . "</td>";
					        $html .= "<td>" . $documentostipo->documentostipo . ", " . $movimientosganaderia->numero_documento . "</td>";
							$html .= "<td>" . $origenlote->lote . ", " . $establecimientoorigen->establecimiento . "</td>";
							$html .= "<td>" . $destinolote->lote . ", " . $establecimientodestino->establecimiento . "</td>";

					        $html .= "<td align=\"right\"> " . number_format($movimientosganaderia->peso_bruto,2) . "</td>";
					        $html .= "<td align=\"right\"> " . number_format($movimientosganaderia->peso_tara,2) . "</td>";
					        $html .= "<td align=\"right\"> " . number_format($movimientosganaderia->peso_neto,2) . "</td>";
							$html .= "</tr>";

							$total_peso_neto += $movimientosganaderia->peso_neto;

						}

						$html .= "<tr>";
						$html .= "<td></td>";
						$html .= "</tr>";

						$html .= "</table>";			



					}



		}


			$html .= "<h3>TOTAL: " . number_format($total_peso_neto,2) . "</h3>";




			// output the HTML content
			$pdf->writeHTML($html, true, false, true, false, '');

			// reset pointer to the last page
			$pdf->lastPage();

			//Close and output PDF document
			$pdf->Output('reporte_producto_por_proveedor.pdf', 'I');





		
	}





























	public function showegresos()
	{

		$title = "Reporte egresos por motivo";
        return View::make('movimientosganaderias.showegresos', array('title' => $title));

	}




	public function reporteegresos()
	{



		$rules = [
			'fecha_desde' => 'required',
			'fecha_hasta' => 'required',
			'movimientomotivos_id' => 'required|exists:movimientomotivos,id',
		];

		if (! Movimientosganaderia::isValid(Input::all(),$rules)) {
			return Redirect::back()->withInput()->withErrors(Movimientosganaderia::$errors);
		}

		$movimientomotivos_id= Input::get('movimientomotivos_id');
		$proveedorcliente_id = Input::get('proveedorcliente_id',0);

		if ($proveedorcliente_id > 0) {
			$clientesproveedors = Clientesproveedor::find($proveedorcliente_id);
		} else {
			$clientesproveedors = Clientesproveedor::all();
		}
		

		$fecha_desde = date("Y-m-d", strtotime(Input::get('fecha_desde')));
		$fecha_hasta = date("Y-m-d", strtotime(Input::get('fecha_hasta')));	


		$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('CodexControl.com');
		$pdf->SetTitle('Fletes por Proveedor');

		// set default header data
		// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, 'CodexCampo', 'by Codex S.R.L. - www.codexcontrol.com');

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('dejavusans', '', 10); 

		// add a page
		$pdf->AddPage();


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		$html = "";

		$html .= '<h1>Ganaderia egresos por motivos</h1><br>';		
		$html .= '<h4>desde: ' . $fecha_desde . ' hasta: ' . $fecha_hasta . '</h4>';


		$total_peso_neto_general = 0;

		foreach ($clientesproveedors as $clientesproveedor) {

				$html .= '<h4>Cliente: ' . $clientesproveedor->clientesproveedor . '</h4>';

				$total_peso_neto = 0;



				$movimientosganaderias = DB::table('movimientosganaderias')
				->where('destinolotes_id', '=', $clientesproveedor->id)
				->where('tipo_movimiento', '=', 'egreso')
				->where('movimientomotivos_id', '=', $movimientomotivos_id)
				->where('fecha', '>=', $fecha_desde)
				->where('fecha', '<=', $fecha_hasta);
				$movimientosganaderias = $movimientosganaderias->orderBy('fecha');
				$movimientosganaderias = $movimientosganaderias->get();


				if (count($movimientosganaderias)) {


					$html .= "<table>";

					$html .= "<tr>";
				        $html .= "<td width=\"10%\">Fecha</td>";
				        $html .= "<td width=\"15%\">Nro Doc</td>";
				        $html .= "<td width=\"15%\">Caravana</td>";
				        $html .= "<td width=\"15%\">Producto</td>";
				        $html .= "<td width=\"10%\">Grupo</td>";
				        $html .= "<td width=\"10%\">Kilos</td>";
				        $html .= "<td width=\"25%\">Observaciones</td>";

					$html .= "</tr>";


					foreach ($movimientosganaderias as $movimientosganaderia)

						{


						$movimientosganaderiascuerpos = DB::table('movimientosganaderiascuerpos')
						->where('movimientosganaderias_id', '=', $movimientosganaderia->id)
						->get();

						if (count($movimientosganaderiascuerpos)) {


							foreach ($movimientosganaderiascuerpos as $movimientosganaderiascuerpo)

								{

									$documentostipo = Documentostipo::find($movimientosganaderia->documentostipos_id);
									$producto = Producto::find($movimientosganaderiascuerpo->productos_id);
									$grupo = Grupo::find($movimientosganaderia->grupos_id);

									$html .= "<tr>";
									$html .= "<td>" . $movimientosganaderia->fecha . "</td>";
							        $html .= "<td>" . $documentostipo->documentostipo . ", " . $movimientosganaderia->numero_documento . "</td>";
									$html .= "<td>" . $movimientosganaderiascuerpo->caravana . "</td>";
									$html .= "<td>" . $producto->producto . "</td>";
									$html .= "<td>" . $grupo->grupo . "</td>";

							        $html .= "<td align=\"right\"> " . number_format($movimientosganaderiascuerpo->kilos,2) . "</td>";
									$html .= "<td>" . $movimientosganaderiascuerpo->observaciones . "</td>";
									$html .= "</tr>";

									$total_peso_neto += $movimientosganaderiascuerpo->kilos;

								}

							}

						}

					$html .= "<tr>";
					$html .= "<td></td>";
					$html .= "</tr>";

					$html .= "</table>";			
					$html .= "<br><br>";
					$html .= "Subtotal: " . $total_peso_neto;
					$html .= "<br>";

					$total_peso_neto_general += $total_peso_neto;

				}

			}

			$html .= "<br><br>";
			$html .= "Subtotal: " . $total_peso_neto_general;
			$html .= "<br>";

			// $html .= "<h3>TOTAL: " . number_format($total_peso_neto,2) . "</h3>";




			// output the HTML content
			$pdf->writeHTML($html, true, false, true, false, '');

			// reset pointer to the last page
			$pdf->lastPage();

			//Close and output PDF document
			$pdf->Output('reporte_producto_por_proveedor.pdf', 'I');





		
	}






















   

}
