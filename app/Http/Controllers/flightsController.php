<?php namespace App\Http\Controllers;

use App\Models\FF_airlines;
use App\Models\FF_airports;
use App\Models\FF_flights;
use Illuminate\Routing\Controller;

class FlightsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /flights
	 *
	 * @return Response
	 */
	public function index()
	{
        $config['list'] = FF_flights::get()->toArray();
        $dataFromModel = new FF_flights();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['ignore'] = ['created_at', 'updated_at', 'deleted_at', 'id', 'count'];
        $config['route'] = route('app.flights.create');
        $config['create'] = 'app.flights.create';
        $config['edit'] = 'app.flights.edit';
        $config['delete'] = 'app.flights.destroy';

        return view('allList', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /flights/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config['titleForm'] = 'New Flights';
        $config['route'] = route('app.flights.create');
        $config['origin'] = FF_airports::pluck('name', 'id')->toArray();
        $config['destination'] = FF_airports::pluck('name', 'id')->toArray();
        $config['airline'] = FF_airlines::pluck('name', 'id')->toArray();


        $config['back'] = '/flights';

//        dd($config);
        return view('flights.create', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /flights
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /flights/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /flights/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /flights/{id}
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
	 * DELETE /flights/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}