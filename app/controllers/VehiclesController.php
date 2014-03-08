<?php

class VehiclesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public $restful = true;

	public function index()
	{
		$vehicles = Vehicle::all();
		if (Request::ajax()){
			return Response::json($vehicles);
		}
		else{
			return View::make('vehicles.index')->with('vehicles',$vehicles);	
		}
        
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('vehicles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Request::ajax()){

			/*
			Recepción y validación de datos
			*/

			$data = array(
				'model' => Input::get('model'),
				'patent' => Input::get('patent')	
				);

			$rules = array(
				'model' => 'required',
				'patent' => 'required'
				);

			$validation = Validator::make(Input::all(),$rules);

			if ($validation->fails()){
				return Response::json(array(
				'success' => false,
				'message' => $validation->getMessageBag()->toArray()
				));
			}
			
			else{
				$vehicle = new Vehicle($data);
				$vehicle->save();

				if ($vehicle){
					return Response::json(array(
					'success' => true,
					'message' => 'Vehículo creado exitosamente'
					));		
				}
				
			}
			
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $vehicle = Vehicle::find($id);
        return $vehicle;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('vehicles.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
