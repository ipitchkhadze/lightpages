<?php

namespace Ipitchkhadze\LightPages\App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Ipitchkhadze\LightPages\App\Models\Lang;
use Datatables;

class LangController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('lightpages::lang.index');
    }

    public function data() {
        $langs = Lang::all();
        return Datatables::of($langs)
                        ->addColumn('action', function ($lang) {
                            $btns = '';
                            $btns .= '<a class="btn btn-primary" href="' . route('lang.edit', ['id' => $lang->id]) . '"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;';
                            $btns .= '<a class="btn btn-danger destroy" href="' . route('lang.destroy', ['id' => $lang->id]) . '" data-method="delete" ><i class="fa fa-trash"></i></a>';
                            return $btns;
                        })
                        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('lightpages::lang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $lang = new Lang($request->all());
        $lang->save();
        return redirect()->route('lang.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['lang'] = Lang::findOrFail($id);
        return view('lightpages::lang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $lang = Lang::findOrFail($id);
        $lang->fill($request->all())->save();
        return redirect()->route('lang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $lang     = Lang::findOrFail($id);
        $lang->delete();
        $responce = [
            'status' => 'success'
        ];
        return json_encode($responce);
    }

}
