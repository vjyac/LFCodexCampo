<?php

class ProductosunidadmedidasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $productosunidadmedidas = DB::table('productosunidadmedidas')->paginate(10);
        $title = "Productos unidad medidas";
        return View::make('productosunidadmedidas.index', array('title' => $title, 'productosunidadmedidas' => $productosunidadmedidas));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('productosunidadmedidas.create');
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

				'productosunidadmedida' => 'required|unique:productosunidadmedidas'

		];


		if (! Productosunidadmedida::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Productosunidadmedida::$errors);

		}


		$productosunidadmedida = new Productosunidadmedida;
		$productosunidadmedida->productosunidadmedida = Input::get('productosunidadmedida');
		
		$productosunidadmedida->save();

		return Redirect::to('/productosunidadmedidas');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$productosunidadmedida = Productosunidadmedida::find($id);

		// show the view and pass the nerd to it
		return View::make('productosunidadmedidas.show')
			->with('productosunidadmedida', $productosunidadmedida);

	}

	/* Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 *movimientomovimientomotivoRespmovimientomotivo*/

	public function edit($id)
	{
		$productosunidadmedida = Productosunidadmedida::find($id);
		$title = "Editar Productos unidad medidas";

        return View::make('productosunidadmedidas.edit', array('title' => $title, 'productosunidadmedida' => $productosunidadmedida));
	}

	/**
	 * Update the smovimientomotivod rmovimientomotivo in stomoviiento *
	 * @param  int  $id
	 * @return Rmovimientomotivos	 */

	public function update($id) {


		$productosunidadmedida = Productosunidadmedida::find($id);


		$rules = [
				'productosunidadmedida' => 'required|unique:productosunidadmedidas,productosunidadmedida,' . $id

		];



		if (! Productosunidadmedida::isValid(Input::all(),$rules)) {
			
			return Redirect::back()->withInput()->withErrors(Productosunidadmedida::$errors);

		}


		$productosunidadmedida->productosunidadmedida = Input::get('productosunidadmedida');
		$productosunidadmedida->save();

		return Redirect::to('/productosunidadmedidas');


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
		
		$productosunidadmedida = Productosunidadmedida::find($id)->delete();

		return Redirect::to('/productosunidadmedidas');
	}

   public function search(){

        $term = Input::get('term');

        $productosunidadmedidas = DB::table('productosunidadmedidas')->where('productosunidadmedida', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($productosunidadmedidas) > 0) {

            foreach ($productosunidadmedidas as $productosunidadmedida)
                {
                    $adevol[] = array(
                        'id' => $productosunidadmedida->id,
                        'value' => $productosunidadmedida->productosunidadmedida,
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
