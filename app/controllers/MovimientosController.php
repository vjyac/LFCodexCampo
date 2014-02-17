<?php

class MovimientosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $movimientos = DB::table('movimientos')->orderBy('id', 'desc')->paginate(10);
        // $movimientos = DB::table('movimientos')->where('estado', 'abierto')->paginate(10);
        $title = "Movimientos";
        return View::make('movimientos.index', array('title' => $title, 'movimientos' => $movimientos));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('movimientos.create');
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
			'proveedorcliente_id' => 'required|exists:clientesproveedors,id',
			'contratistas_id' => 'required|exists:clientesproveedors,id',
			'documentostipos_id' => 'required|exists:documentostipos,id',
			'chofers_id' => 'required|exists:chofers,id',
			'vehiculos_id' => 'required|exists:vehiculos,id',
			'movimientomotivos_id' => 'required|exists:movimientomotivos,id',
			'lotes_id' => 'required|exists:lotes,id',
			'productos_id' => 'required|exists:productos,id',

			
		];


		if (! Movimiento::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Movimiento::$errors);

		}

		$movimiento = new Movimiento;


		$movimiento->fecha = date("Y-m-d", strtotime(Input::get('fecha')));
		$movimiento->numero_documento = Input::get('numero_documento');
		$movimiento->tipo_movimiento = Input::get('tipo_movimiento');
		$movimiento->proveedorcliente_id = Input::get('proveedorcliente_id');
		$movimiento->contratistas_id = Input::get('contratistas_id');
		$movimiento->documentostipos_id = Input::get('documentostipos_id');
		$movimiento->importe_total = Input::get('importe_total');
		$movimiento->chofers_id = Input::get('chofers_id');
		$movimiento->vehiculos_id = Input::get('vehiculos_id');
		$movimiento->movimientomotivos_id = Input::get('movimientomotivos_id');
		$movimiento->lotes_id = Input::get('lotes_id');
		$movimiento->productos_id = Input::get('productos_id');
		$movimiento->cantidad = Input::get('cantidad');
		$movimiento->peso_bruto = Input::get('peso_bruto');
		$movimiento->peso_tara = Input::get('peso_tara');
		$movimiento->peso_neto = Input::get('peso_neto');
		$movimiento->estado = "cerrado";
		

		


		$movimiento->save();

		return Redirect::to('/movimientos');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$movimiento = Movimiento::find($id);

		// show the view and pass the nerd to it
		return View::make('movimientos.show')
			->with('movimiento', $movimiento);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$movimiento = Movimiento::find($id);
		$title = "Editar movimientos";

        return View::make('movimientos.edit', array('title' => $title, 'movimiento' => $movimiento));
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


		$movimiento = Movimiento::find($id);

		$rules = [
			'fecha' => 'required',
			'proveedorcliente_id' => 'required|exists:clientesproveedors,id',
			'contratistas_id' => 'required|exists:clientesproveedors,id',
			'documentostipos_id' => 'required|exists:documentostipos,id',
			'chofers_id' => 'required|exists:chofers,id',
			'vehiculos_id' => 'required|exists:vehiculos,id',
			'movimientomotivos_id' => 'required|exists:movimientomotivos,id',
			'lotes_id' => 'required|exists:lotes,id',
			'productos_id' => 'required|exists:productos,id',

			
		];


		if (! Movimiento::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Movimiento::$errors);

		}

		$movimiento->fecha = date("Y-m-d", strtotime(Input::get('fecha')));
		$movimiento->numero_documento = Input::get('numero_documento');
		$movimiento->tipo_movimiento = Input::get('tipo_movimiento');
		$movimiento->proveedorcliente_id = Input::get('proveedorcliente_id');
		$movimiento->contratistas_id = Input::get('contratistas_id');
		$movimiento->documentostipos_id = Input::get('documentostipos_id');
		$movimiento->importe_total = Input::get('importe_total');
		$movimiento->chofers_id = Input::get('chofers_id');
		$movimiento->vehiculos_id = Input::get('vehiculos_id');
		$movimiento->movimientomotivos_id = Input::get('movimientomotivos_id');
		$movimiento->lotes_id = Input::get('lotes_id');
		$movimiento->productos_id = Input::get('productos_id');
		$movimiento->cantidad = Input::get('cantidad');
		$movimiento->peso_bruto = Input::get('peso_bruto');
		$movimiento->peso_tara = Input::get('peso_tara');
		$movimiento->peso_neto = Input::get('peso_neto');
		$movimiento->estado = "abierto";
		


		$movimiento->save();

		return Redirect::to('/movimientos');


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

		
		$movimiento = Movimiento::find($id)->delete();

		return Redirect::to('/movimientos');
	}






















	public function showproductoporcontratista()
	{

		$title = "Productos por contratista";
        return View::make('movimientos.showproductoporcontratista', array('title' => $title));

	}




	public function reporteproductoporcontratista()
	{


		$rules = [
			'fecha_desde' => 'required',
			'fecha_hasta' => 'required',
			'contratista_id' => 'required|exists:clientesproveedors,id',
		];


		if (! Movimiento::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Movimiento::$errors);

		}

		$contratista_id = Input::get('contratista_id');
		$clientesproveedor = Clientesproveedor::find($contratista_id);

		$productos_id = Input::get('productos_id',0);
		



		$fecha_desde = date("Y-m-d", strtotime(Input::get('fecha_desde')));
		$fecha_hasta = date("Y-m-d", strtotime(Input::get('fecha_hasta')));	


		$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('CodexControl.com');
		$pdf->SetTitle('Productos por Contratista');

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

		$html .= '<h1>Productos por Contratista</h1><br>';
		$html .= '<h4>Proveedor: ' . $clientesproveedor->clientesproveedor . '</h4>';

		if ($productos_id > 0) {
			$producto = producto::find($productos_id);	
			$html .= '<h4>Producto: ' . $producto->producto . '</h4>';
		} else {
			$html .= '<h4>Producto: Todos</h4>';
		}
		
		$html .= '<h4>desde: ' . $fecha_desde . ' hasta: ' . $fecha_hasta . '</h4>';



		$movimientos = DB::table('movimientos')
		->where('contratistas_id', '=', $contratista_id)
		->where('fecha', '>=', $fecha_desde)
		->where('fecha', '<=', $fecha_hasta);
		if ($productos_id > 0) {
			$movimientos = $movimientos->where('productos_id', '=', $productos_id);
		}
		$movimientos = $movimientos->orderBy('productos_id');
		$movimientos = $movimientos->get();



		$html .= "<table>";

		$html .= "<tr>";
	        $html .= "<td width=\"10%\">Fecha</td>";
	        $html .= "<td width=\"15%\">Lote</td>";
	        $html .= "<td width=\"20%\">Producto</td>";
	        $html .= "<td width=\"10%\">Tipo</td>";
	        $html .= "<td width=\"10%\">Nro Doc</td>";
	        $html .= "<td width=\"10%\" align=\"right\">Cantidad</td>";
	        $html .= "<td width=\"10%\" align=\"right\">P. Neto</td>";
	        $html .= "<td width=\"15%\" align=\"center\">U. Medida</td>";
		$html .= "</tr>";

		$cantidad = 0;
		$peso_neto = 0;
		
		$total_cantidad = 0;
		$total_peso_neto = 0;


		foreach ($movimientos as $movimiento) 
		{



			 if ( $productos_id == "" ) {
				$productos_id = $movimiento->productos_id;
			 }


			if ($productos_id <> $movimiento->productos_id) {

				$html .= "<tr>";
				$html .= "<td></td>";
				$html .= "<td></td>";
		        $html .= "<td></td>";
		        $html .= "<td></td>";
		        $html .= "<td></td>";
		        $html .= "<td align=\"right\"> " . number_format($cantidad,2) . "</td>";
		        $html .= "<td align=\"right\"> " . number_format($peso_neto,2) . "</td>";
		        $html .= "<td></td>";
				$html .= "</tr>";

			$html .= "<tr>";
			$html .= "<td></td>";
			$html .= "</tr>";


				$total_cantidad += $cantidad;
				$total_peso_neto += $peso_neto;

				$cantidad = 0;
				$peso_neto = 0;
				$productos_id = $movimiento->productos_id;
			}

			$documentostipo = Documentostipo::find($movimiento->documentostipos_id);
			$lote = Lote::find($movimiento->lotes_id);
			$establecimiento = Establecimiento::find($lote->establecimientos_id);
			$producto = Producto::find($movimiento->productos_id);
			$productosunidadmedida = Productosunidadmedida::find($producto->productosunidadmedidas_id);

			$html .= "<tr>";
			$html .= "<td>" . $movimiento->fecha . "</td>";
			$html .= "<td>" . $lote->lote . ", " . $establecimiento->establecimiento . "</td>";
			$html .= "<td>" . $producto->producto . "</td>";
	        $html .= "<td>" . $documentostipo->documentostipo . "</td>";
	        $html .= "<td>" . $movimiento->numero_documento . "</td>";
	        $html .= "<td align=\"right\"> " . number_format($movimiento->cantidad,2) . "</td>";
	        $html .= "<td align=\"right\"> " . number_format($movimiento->peso_neto,2) . "</td>";
	        $html .= "<td align=\"center\"> " . $productosunidadmedida->productosunidadmedida . "</td>";
			$html .= "</tr>";

			$cantidad += $movimiento->cantidad;
			$peso_neto += $movimiento->peso_neto;

			}


			$html .= "<tr>";
			$html .= "<td></td>";
			$html .= "<td></td>";
	        $html .= "<td></td>";
	        $html .= "<td></td>";
	        $html .= "<td></td>";
	        $html .= "<td align=\"right\"> " . number_format($cantidad,2) . "</td>";
	        $html .= "<td align=\"right\"> " . number_format($peso_neto,2) . "</td>";
	        $html .= "<td></td>";
			$html .= "</tr>";

			$html .= "<tr>";
			$html .= "<td></td>";
			$html .= "</tr>";


			$html .= "</table>";			


			// output the HTML content
			$pdf->writeHTML($html, true, false, true, false, '');

			// reset pointer to the last page
			$pdf->lastPage();

			//Close and output PDF document
			$pdf->Output('reporte_producto_por_proveedor.pdf', 'I');




		
	}






	public function showfleteporproveedor()
	{

		$title = "Fletes por proveedor";
        return View::make('movimientos.showfleteporproveedor', array('title' => $title));

	}




	public function reportefleteporproveedor()
	{

		$rules = [
			'fecha_desde' => 'required',
			'fecha_hasta' => 'required',
			'proveedorcliente_id' => 'required|exists:clientesproveedors,id',
		];


		if (! Movimiento::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Movimiento::$errors);

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

		$html .= '<h1>Fletes por proveedor</h1><br>';
		$html .= '<h4>Proveedor: ' . $clientesproveedor->clientesproveedor . '</h4>';

		if ($productos_id > 0) {
			$producto = Producto::find($productos_id);	
			$html .= '<h4>Producto: ' . $producto->producto . '</h4>';
		} else {
			$html .= '<h4>Producto: Todos</h4>';
		}
		
		$html .= '<h4>desde: ' . $fecha_desde . ' hasta: ' . $fecha_hasta . '</h4>';


		$total_peso_neto = 0;

		$vehiculos = DB::table('vehiculos')
		->where('clientesproveedors_id', '=', $proveedorcliente_id)->get();

		foreach ($vehiculos as $vehiculo) 
		{
			$html .= "<h4>Vehiculo: " . $vehiculo->patente . "</h4>";


				$movimientos = DB::table('movimientos')
				->where('vehiculos_id', '=', $vehiculo->id)
				->where('fecha', '>=', $fecha_desde)
				->where('fecha', '<=', $fecha_hasta);
				if ($productos_id > 0) {
					$movimientos = $movimientos->where('productos_id', '=', $productos_id);
				}
				$movimientos = $movimientos->orderBy('fecha');
				$movimientos = $movimientos->get();



				$html .= "<table>";

				$html .= "<tr>";
			        $html .= "<td width=\"10%\">Fecha</td>";
			        $html .= "<td width=\"20%\">Origen</td>";
			        $html .= "<td width=\"20%\">Producto</td>";
			        $html .= "<td width=\"10%\">Tipo</td>";
			        $html .= "<td width=\"10%\">Nro Doc</td>";
			        $html .= "<td width=\"10%\" align=\"right\">P. Bruto</td>";
			        $html .= "<td width=\"10%\" align=\"right\">P. Tara</td>";
			        $html .= "<td width=\"10%\" align=\"right\">P. Neto</td>";

				$html .= "</tr>";


				foreach ($movimientos as $movimiento) 
				{



					$documentostipo = Documentostipo::find($movimiento->documentostipos_id);
					$lote = Lote::find($movimiento->lotes_id);
					$establecimiento = Establecimiento::find($lote->establecimientos_id);
					$producto = Producto::find($movimiento->productos_id);

					$html .= "<tr>";
					$html .= "<td>" . $movimiento->fecha . "</td>";
					$html .= "<td>" . $lote->lote . ", " . $establecimiento->establecimiento . "</td>";
					$html .= "<td>" . $producto->producto . "</td>";
			        $html .= "<td>" . $documentostipo->documentostipo . "</td>";
			        $html .= "<td>" . $movimiento->numero_documento . "</td>";
			        $html .= "<td align=\"right\"> " . number_format($movimiento->peso_bruto,2) . "</td>";
			        $html .= "<td align=\"right\"> " . number_format($movimiento->peso_tara,2) . "</td>";
			        $html .= "<td align=\"right\"> " . number_format($movimiento->peso_neto,2) . "</td>";
					$html .= "</tr>";

					$total_peso_neto += $movimiento->peso_neto;

					}


					$html .= "<tr>";
					$html .= "<td></td>";
					$html .= "</tr>";


					$html .= "</table>";			










		}


			$html .= "<h3>TOTAL: " . number_format($total_peso_neto,2) . "</h3>";




			// output the HTML content
			$pdf->writeHTML($html, true, false, true, false, '');

			// reset pointer to the last page
			$pdf->lastPage();

			//Close and output PDF document
			$pdf->Output('reporte_producto_por_proveedor.pdf', 'I');





		
	}





















	public function showproductoporcliente()
	{

		$title = "Producto por cliente";
        return View::make('movimientos.showproductoporcliente', array('title' => $title));

	}




	public function reporteproductoporcliente()
	{



		$rules = [
			'fecha_desde' => 'required',
			'fecha_hasta' => 'required',
			'proveedorcliente_id' => 'required|exists:clientesproveedors,id',
		];


		if (! Movimiento::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Movimiento::$errors);

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
		$pdf->SetTitle('Productos por Cliente');

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

		$html .= '<h1>Productos por Cliente</h1><br>';
		$html .= '<h4>Proveedor: ' . $clientesproveedor->clientesproveedor . '</h4>';

		if ($productos_id > 0) {
			$producto = Producto::find($productos_id);	
			$html .= '<h4>Producto: ' . $producto->producto . '</h4>';
		} else {
			$html .= '<h4>Producto: Todos</h4>';
		}
		
		$html .= '<h4>desde: ' . $fecha_desde . ' hasta: ' . $fecha_hasta . '</h4>';



		$movimientos = DB::table('movimientos')
		->where('proveedorcliente_id', '=', $proveedorcliente_id)
		->where('fecha', '>=', $fecha_desde)
		->where('fecha', '<=', $fecha_hasta);
		if ($productos_id > 0) {
			$movimientos = $movimientos->where('productos_id', '=', $productos_id);
		}
		$movimientos = $movimientos->orderBy('productos_id');
		$movimientos = $movimientos->orderBy('fecha');
		$movimientos = $movimientos->get();



		$html .= "<table>";

		$html .= "<tr>";
	        $html .= "<td width=\"10%\">Fecha</td>";
	        $html .= "<td width=\"15%\">Origen</td>";
	        $html .= "<td width=\"20%\">Producto</td>";
	        $html .= "<td width=\"10%\">Tipo</td>";
	        $html .= "<td width=\"10%\">Nro Doc</td>";
	        $html .= "<td width=\"10%\" align=\"right\">Cantidad</td>";
	        $html .= "<td width=\"10%\" align=\"right\">P. Neto</td>";
	        $html .= "<td width=\"15%\" align=\"center\">U. Medida</td>";
		$html .= "</tr>";

		$cantidad = 0;
		$peso_neto = 0;
		
		$total_cantidad = 0;
		$total_peso_neto = 0;


		foreach ($movimientos as $movimiento) 
		{



			 if ( $productos_id == "" ) {
				$productos_id = $movimiento->productos_id;
			 }


			if ($productos_id <> $movimiento->productos_id) {

				$html .= "<tr>";
				$html .= "<td></td>";
				$html .= "<td></td>";
		        $html .= "<td></td>";
		        $html .= "<td></td>";
		        $html .= "<td></td>";
		        $html .= "<td align=\"right\"> " . number_format($cantidad,2) . "</td>";
		        $html .= "<td align=\"right\"> " . number_format($peso_neto,2) . "</td>";
		        $html .= "<td></td>";
				$html .= "</tr>";

			$html .= "<tr>";
			$html .= "<td></td>";
			$html .= "</tr>";


				$total_cantidad += $cantidad;
				$total_peso_neto += $peso_neto;

				$cantidad = 0;
				$peso_neto = 0;
				$productos_id = $movimiento->productos_id;
			}

			$documentostipo = Documentostipo::find($movimiento->documentostipos_id);
			$lote = Lote::find($movimiento->lotes_id);
			$establecimiento = Establecimiento::find($lote->establecimientos_id);
			$producto = Producto::find($movimiento->productos_id);
			$productosunidadmedida = Productosunidadmedida::find($producto->productosunidadmedidas_id);

			$html .= "<tr>";
			$html .= "<td>" . $movimiento->fecha . "</td>";
			$html .= "<td>" . $lote->lote . ", " . $establecimiento->establecimiento . "</td>";
			$html .= "<td>" . $producto->producto . "</td>";
	        $html .= "<td>" . $documentostipo->documentostipo . "</td>";
	        $html .= "<td>" . $movimiento->numero_documento . "</td>";
	        $html .= "<td align=\"right\"> " . number_format($movimiento->cantidad,2) . "</td>";
	        $html .= "<td align=\"right\"> " . number_format($movimiento->peso_neto,2) . "</td>";
	        $html .= "<td align=\"center\"> " . $productosunidadmedida->productosunidadmedida . "</td>";
			$html .= "</tr>";

			$cantidad += $movimiento->cantidad;
			$peso_neto += $movimiento->peso_neto;

			}


			$html .= "<tr>";
			$html .= "<td></td>";
			$html .= "<td></td>";
	        $html .= "<td></td>";
	        $html .= "<td></td>";
	        $html .= "<td></td>";
	        $html .= "<td align=\"right\"> " . number_format($cantidad,2) . "</td>";
	        $html .= "<td align=\"right\"> " . number_format($peso_neto,2) . "</td>";
	        $html .= "<td></td>";
			$html .= "</tr>";

			$html .= "<tr>";
			$html .= "<td></td>";
			$html .= "</tr>";


			$html .= "</table>";			


			// output the HTML content
			$pdf->writeHTML($html, true, false, true, false, '');

			// reset pointer to the last page
			$pdf->lastPage();

			//Close and output PDF document
			$pdf->Output('reporte_producto_por_proveedor.pdf', 'I');




		
	}


























	public function showproductopororigen()
	{

		$title = "Productos por origen";
        return View::make('movimientos.showproductopororigen', array('title' => $title));

	}




	public function reporteproductopororigen()
	{


		$rules = [
			'fecha_desde' => 'required',
			'fecha_hasta' => 'required',
			'proveedorcliente_id' => 'required|exists:clientesproveedors,id',
		];


		if (! Movimiento::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Movimiento::$errors);

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
		$pdf->SetTitle('Productos por Origen');

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

		$html .= '<h1>Productos por Origen</h1><br>';
		$html .= '<h4>Proveedor: ' . $clientesproveedor->clientesproveedor . '</h4>';

		if ($productos_id > 0) {
			$producto = Producto::find($productos_id);	
			$html .= '<h4>Producto: ' . $producto->producto . '</h4>';
		} else {
			$html .= '<h4>Producto: Todos</h4>';
		}
		
		$html .= '<h4>desde: ' . $fecha_desde . ' hasta: ' . $fecha_hasta . '</h4>';

		$establecimientos = DB::table('establecimientos')->where('clientesproveedors_id', '=', $proveedorcliente_id)->get();

		foreach ($establecimientos as $establecimiento) 
			{

				$lotes = DB::table('lotes')->where('establecimientos_id', '=', $establecimiento->id)->get();

				foreach ($lotes as $lote) 
				{



							$movimientos = DB::table('movimientos')
							->where('lotes_id', '=', $lote->id)
							->where('fecha', '>=', $fecha_desde)
							->where('fecha', '<=', $fecha_hasta);
							if ($productos_id > 0) {
								$movimientos = $movimientos->where('productos_id', '=', $productos_id);
							}
							$movimientos = $movimientos->orderBy('productos_id');
							$movimientos = $movimientos->orderBy('fecha');
							$movimientos = $movimientos->get();

							if (count($movimientos)>0 )  {

								$html .= "<table>";

								$html .= "<tr>";
							        $html .= "<td width=\"10%\">Fecha</td>";
							        $html .= "<td width=\"10%\">Lote</td>";
							        $html .= "<td width=\"15%\">Producto</td>";
							        $html .= "<td width=\"10%\">Tipo</td>";
							        $html .= "<td width=\"10%\">Nro Doc</td>";
							        $html .= "<td width=\"10%\" align=\"right\">Cantidad</td>";
							        $html .= "<td width=\"10%\" align=\"right\">P. Neto</td>";
							        $html .= "<td width=\"15%\" align=\"center\">U. Medida</td>";
							        $html .= "<td width=\"10%\" align=\"center\">Importe Total</td>";
								$html .= "</tr>";

								$cantidad = 0;
								$peso_neto = 0;
								$importe_total = 0;
								

								$productos_id_use = $productos_id;

								foreach ($movimientos as $movimiento) 
								{



									 if ( $productos_id_use == "" ) {
										$productos_id_use = $movimiento->productos_id;
									 }


									if ($productos_id_use <> $movimiento->productos_id) {

										$html .= "<tr>";
										$html .= "<td></td>";
										$html .= "<td></td>";
								        $html .= "<td></td>";
								        $html .= "<td></td>";
								        $html .= "<td></td>";
								        $html .= "<td align=\"right\"> " . number_format($cantidad,2) . "</td>";
								        $html .= "<td align=\"right\"> " . number_format($peso_neto,2) . "</td>";
								        $html .= "<td></td>";
								        $html .= "<td align=\"right\"> " . number_format($importe_total,2) . "</td>";
										$html .= "</tr>";

									$html .= "<tr>";
									$html .= "<td></td>";
									$html .= "</tr>";


										$cantidad = 0;
										$peso_neto = 0;
										$productos_id_use = $movimiento->productos_id;
									}

									$documentostipo = Documentostipo::find($movimiento->documentostipos_id);
									$lote = Lote::find($movimiento->lotes_id);
									$establecimiento = Establecimiento::find($lote->establecimientos_id);
									$producto = Producto::find($movimiento->productos_id);
									$productosunidadmedida = Productosunidadmedida::find($producto->productosunidadmedidas_id);

									$html .= "<tr>";
									$html .= "<td>" . $movimiento->fecha . "</td>";
									$html .= "<td>" . $lote->lote . ", " . $establecimiento->establecimiento . "</td>";
									$html .= "<td>" . $producto->producto . "</td>";
							        $html .= "<td>" . $documentostipo->documentostipo . "</td>";
							        $html .= "<td>" . $movimiento->numero_documento . "</td>";
							        $html .= "<td align=\"right\"> " . number_format($movimiento->cantidad,2) . "</td>";
							        $html .= "<td align=\"right\"> " . number_format($movimiento->peso_neto,2) . "</td>";
							        $html .= "<td align=\"center\"> " . $productosunidadmedida->productosunidadmedida . "</td>";
							        $html .= "<td align=\"right\"> " . number_format($movimiento->importe_total,2) . "</td>";
									$html .= "</tr>";

									$cantidad += $movimiento->cantidad;
									$peso_neto += $movimiento->peso_neto;
									$importe_total += $movimiento->importe_total;
									

									}


									$html .= "<tr>";
									$html .= "<td></td>";
									$html .= "<td></td>";
							        $html .= "<td></td>";
							        $html .= "<td></td>";
							        $html .= "<td></td>";
							        $html .= "<td align=\"right\"> " . number_format($cantidad,2) . "</td>";
							        $html .= "<td align=\"right\"> " . number_format($peso_neto,2) . "</td>";
							        $html .= "<td></td>";
							        $html .= "<td align=\"right\"> " . number_format($importe_total,2) . "</td>";
									$html .= "</tr>";

									$html .= "<tr>";
									$html .= "<td></td>";
									$html .= "</tr>";


									$html .= "</table>";			

							}



				}

			}





			// output the HTML content
			$pdf->writeHTML($html, true, false, true, false, '');

			// reset pointer to the last page
			$pdf->lastPage();

			//Close and output PDF document
			$pdf->Output('reporte_producto_por_proveedor.pdf', 'I');




		
	}

























   

}
