<?php namespace App\Http\Controllers;

use App\Models\FF_airports;
use App\Models\FF_flights;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class SearchFlightsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /searchflights
	 *
	 * @return Response
	 */
	public function index()
	{

        $config['origin'] = FF_airports::pluck('name', 'id')->toArray();
        $config['destination'] = FF_airports::pluck('name', 'id')->toArray();
        $config['date'] = Carbon::now()->format('Y-m-d');

//        $config['flights']= FF_flights::take(10)->get()->toArray();
//        dd($config);

	    return view('welcome', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /searchflights/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /searchflights
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /searchflights/{id}
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
	 * GET /searchflights/{id}/edit
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
	 * PUT /searchflights/{id}
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
	 * DELETE /searchflights/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}