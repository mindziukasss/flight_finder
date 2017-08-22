<?php namespace App\Http\Controllers;

use App\Models\FF_airlines;
use Illuminate\Routing\Controller;

class AirlinesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /airlines
	 *
	 * @return Response
	 */
	public function index()
	{
        $dataFromModel = new FF_airlines();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['list'] = FF_airlines::paginate(20)->toArray();
        $config['ignore'] = ['created_at', 'updated_at', 'deleted_at', 'id', 'count'];
        $config['route'] = route('app.airlines.create');
        $config['create'] = 'app.airlines.create';
        $config['edit'] = 'app.airlines.edit';
        $config['delete'] = 'app.airlines.destroy';
        $config['paginate']= FF_airlines::paginate(20);

        return view('allList', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /airlines/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config['titleForm'] = 'New Airline';
        $config['route'] = route('app.airlines.create');
        $config['back'] = '/airlines';
        return view('airlines.create', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /airlines
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = request()->all();
        FF_airlines::create([
            'name' => $data['name']
        ]);

        return redirect(route('app.airlines.index'));
	}

	/**
	 * Display the specified resource.
	 * GET /airlines/{id}
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
	 * GET /airlines/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $config['id'] = $id;
        $config['titleForm'] = $id;
        $config['route'] = route('app.airlines.edit', $id);
        $config['back'] = '/airlines';
        $config['record'] = FF_airlines::find($id)->toArray();

        return view('airlines.create', $config);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /airlines/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $config = FF_airlines::find($id);
        $data = request()->all();

        $config->update([
            'name' => $data['name']
        ]);


        return redirect(route('app.airlines.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /airlines/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        FF_airlines::destroy($id);
        return json_encode(["success" => true, "id" => $id]);
	}

}