<?php

class ProductosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $productos = DB::table('productos')->paginate(10);
        $title = "Productos";
        return View::make('productos.index', array('title' => $title, 'productos' => $productos));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('productos.create');
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
				'producto' => 'required|unique:productos',
				'actividads_id' => 'required',
				'productosunidadmedidas_id' => 'required'
		];


		if (! producto::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(producto::$errors);

		}

		$producto = new producto;

		$producto->producto = Input::get('producto');
		$producto->producto_codigo = Input::get('producto_codigo');
		$producto->actividads_id = Input::get('actividads_id');
		$producto->productosunidadmedidas_id = Input::get('productosunidadmedidas_id');
		$producto->precio = Input::get('precio');
		$producto->estado = Input::get('estado');

		$producto->save();

		return Redirect::to('/productos');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function show($id)
	{

		$producto = producto::find($id);

		// show the view and pass the nerd to it
		return View::make('productos.show')
			->with('producto', $producto);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$producto = producto::find($id);
		$title = "Editar producto";

        return View::make('productos.edit', array('title' => $title, 'producto' => $producto));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{



		// print $id . "<br>";
		// var_dump(Input::All());
		// die;


		$producto = producto::find($id);



		$rules = [
				'producto' => 'required|unique:productos,producto,' . $id,
				'actividads_id' => 'required',
				'productosunidadmedidas_id' => 'required'
		];


		if (! producto::isValid(Input::all(),$rules)) {
			
			return Redirect::back()->withInput()->withErrors(producto::$errors);

		}



		$producto->producto = Input::get('producto');
		$producto->producto_codigo = Input::get('producto_codigo');
		$producto->actividads_id = Input::get('actividads_id');
		$producto->productosunidadmedidas_id = Input::get('productosunidadmedidas_id');
		$producto->precio = Input::get('precio');
		$producto->estado = Input::get('estado');

		$producto->save();

		return Redirect::to('/productos');


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
		
		$producto = producto::find($id)->delete();

		return Redirect::to('/productos');
	}

   public function search(){

        $term = Input::get('term');

        $productos = DB::table('productos')->where('producto', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($productos) > 0) {

            foreach ($productos as $producto)
                {
                    $adevol[] = array(
                        'id' => $producto->id,
                        'value' => $producto->producto,
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
