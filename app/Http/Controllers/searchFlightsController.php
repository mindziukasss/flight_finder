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
        $config['route'] = route('app.search.index');
        $config['origin'] = FF_airports::pluck('name', 'id')->toArray();
        $config['destination'] = FF_airports::pluck('name', 'id')->toArray();
        $config['date'] = Carbon::now()->format('Y-m-d');
        $config['ignore'] = ['created_at', 'updated_at', 'deleted_at', 'id', 'count', 'airline_id', 'destintation_id', 'orgin_id' ];


        $data = request()->all();


        if($data){
            $config['flights']= $this->getFlights($data);

        };

//        dd($config);
	    return view('welcome', $config);
	}


	public function getFlights($data){

	   return FF_flights::where('orgin_id', $data['from'])
            ->where('destintation_id',$data['to'] )
            ->where('departure','>=', $data['date'].' 23:59:59')
            ->get()->toArray();

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