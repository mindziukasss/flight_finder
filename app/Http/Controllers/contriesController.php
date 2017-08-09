<?php namespace App\Http\Controllers;

use App\Models\FF_contries;
use Illuminate\Routing\Controller;

class ContriesController extends Controller
{

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
        $config['list'] = FF_contries::get()->toArray();
        $config['ignore'] = ['created_at', 'updated_at', 'deleted_at', 'id', 'count'];
        $config['route'] = route('app.contries.create');
        $config['create'] = 'app.contries.create';
        $config['edit'] = 'app.contries.edit';
        $config['delete'] = 'app.contries.destroy';

        return view('allList', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /contries/create
     *
     * @return Response
     */
    public function create()
    {
        $config['titleForm'] = 'New Country';
        $config['route'] = route('app.contries.create');
        $config['back'] = '/contries';
        return view('countries.create', $config);

    }

    /**
     * Store a newly created resource in storage.
     * POST /contries
     *
     * @return Response
     */
    public function store()
    {
        $data = request()->all();
        FF_contries::create([
            'id' => $data['id'],
            'original_name' => $data['original_name']
        ]);

        return redirect(route('app.contries.index'));
    }

    /**
     * Display the specified resource.
     * GET /contries/{id}
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $config['id'] = $id;
        $config['titleForm'] = $id;
        $config['route'] = route('app.contries.edit', $id);
        $config['back'] = '/contries';
        $config['record'] = FF_contries::find($id)->toArray();

        return view('countries.create', $config);

    }

    /**
     * Update the specified resource in storage.
     * PUT /contries/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $config = FF_contries::find($id);
        $data = request()->all();

        $config->update([
            'id' => $data['id'],
            'original_name' => $data['original_name']
        ]);


        return redirect(route('app.contries.index'));
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /contries/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        FF_contries::destroy($id);
            return json_encode(["success" => true, "id" => $id]);

    }

}