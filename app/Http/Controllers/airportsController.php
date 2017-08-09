<?php namespace App\Http\Controllers;

use App\Models\FF_airports;
use App\Models\FF_contries;
use Illuminate\Routing\Controller;

class AirportsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /airports
	 *
	 * @return Response
	 */
	public function index()
	{
        $dataFromModel = new FF_airports();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['list'] = FF_airports::get()->toArray();
        $config['ignore'] = ['created_at', 'updated_at', 'deleted_at', 'id', 'count'];
        $config['route'] = route('app.airports.create');
        $config['create'] = 'app.airports.create';
        $config['edit'] = 'app.airports.edit';
        $config['delete'] = 'app.airports.destroy';

        return view('allList', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /airports/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config['titleForm'] = 'New Airport';
        $config['route'] = route('app.airports.create');
        $config['country'] = FF_contries::pluck('original_name', 'id')->toArray();
        $config['back'] = '/airports';
        return view('airports.create', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /airports
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = request()->all();
        FF_airports::create([
            'name' => $data['name'],
            'city' => $data['city'],
            'contry_id' => $data['contry_id']
        ]);

        return redirect(route('app.airports.index'));
	}

	/**
	 * Display the specified resource.
	 * GET /airports/{id}
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
	 * GET /airports/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $config['id'] = $id;
        $config['titleForm'] = $id;
        $config['route'] = route('app.airports.edit', $id);
        $config['back'] = '/airports';
        $config['record'] = FF_airports::find($id)->toArray();
        $config['country'] = FF_contries::pluck('original_name', 'id')->toArray();


        return view('airports.create', $config);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /airports/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $config = FF_airports::find($id);
        $data = request()->all();

        $config->update([
            'name' => $data['name'],
            'city' => $data['city'],
            'contry_id' => $data['contry_id']
        ]);

        return redirect(route('app.airports.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /airports/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        FF_airports::destroy($id);
        return json_encode(["success" => true, "id" => $id]);
	}

}