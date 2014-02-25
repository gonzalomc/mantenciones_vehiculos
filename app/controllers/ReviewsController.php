<?php

class ReviewsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$reviews = Review::all();
        return View::make('reviews.index')->with('reviews',$reviews);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('reviews.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Convertimos el formato de la fecha
		$date_time = date_create(Input::get('date'));
		$date_time = date_format($date_time, 'Y-m-d');
		
		$data = array(
			'vehicle_id' => Input::get('vehicle_id'),
			'description' => Input::get('description'),
			'date' => $date_time
			);

		$rules = array(
			'date' => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails()){

		}
		else{
			$review = new Review($data);
			$review->save();
			
			return Response::json(array(
				'success' => true,
				'message' => 'Mantención ingresada exitosamente',
				'review' => 'xD'
				));
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
        return View::make('reviews.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('reviews.edit');
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
