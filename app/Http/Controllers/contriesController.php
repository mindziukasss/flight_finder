<?php namespace App\Http\Controllers;

use App\Models\FF_contries;
use Illuminate\Routing\Controller;

class ContriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /contries
	 *
	 * @return Response
	 */
	public function index()

    {
        $dataFromModel = new FF_contries();
        $config['tableName'] = $dataFromModel->getTableName();
//	    $config['list'] = FF_contries::paginate(15)->toArray();
        $config['list'] = FF_contries::get()->toArray();
//        dd($config);
        $config['ignore'] = ['created_at', 'updated_at', 'deleted_at', 'id', 'count'];
        $config['route'] = route('app.contries.create');
        $config['create'] = 'app.contries.create';
        $config['edit'] = 'app.contries.edit';
        $config['delete'] = 'app.contries.destroy';

        if($config['list'] == null )
        {
            return redirect()->route('app.contries.create');
        }

        return view('allList',$config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /contries/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /contries
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /contries/{id}
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
	 * GET /contries/{id}/edit
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
	 * PUT /contries/{id}
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
	 * DELETE /contries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}