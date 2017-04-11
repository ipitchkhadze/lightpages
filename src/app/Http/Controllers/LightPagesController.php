<?php

namespace Ipitchkhadze\LightPages\App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Ipitchkhadze\LightPages\App\Models\Page as P;
use Ipitchkhadze\LightPages\App\Models\Lang;
use Datatables;

class LightPagesController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('lightpages::pages.index');
    }

    public function data() {
        $pages = P::all();
        return Datatables::of($pages)
                        ->addColumn('action', function ($page) {
                            $btns = '';
                            $btns .= '<a class="btn btn-default" href="' . route('page', ['page' => $page->slug]) . '">';
                            $btns .= ($page->state) ? '<i class="fa fa-eye"></i>' : '<i class="fa text-red fa-eye-slash"></i>';
                            $btns .= '</a>&nbsp;&nbsp;&nbsp;';
                            $btns .= '<a class="btn btn-primary" href="' . route('pages.edit', ['page' => $page->slug]) . '"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;';
                            $btns .= '<a class="btn btn-danger destroy" href="' . route('pages.destroy', ['page' => $page->slug]) . '" data-method="delete" ><i class="fa fa-trash"></i></a>';
                            return $btns;
                        })
                        ->addColumn('lang', function ($page) {
                            return $page->lang->lang;
                        })
                        ->editColumn('created_at', function ($payment) {
                            return $payment->created_at->format('d.m.Y H:i:s');
                        })
                        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['langs'] = Lang::all();
        return view('lightpages::pages.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //dd($request->get('data'));
        foreach ($request->get('data') as $lang) {
            $page = new P($lang);
            $page->save();
        }
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug) {
        $data['page'] = P::findBySlugOrFail($slug);
        $data['lang'] = $data['page']->lang;

        return view('lightpages::pages.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug) {
        $page = P::findBySlug($slug);
        foreach ($request->get('data') as $lang) {
            $page->fill($lang)->save();
        }
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $page     = P::findBySlug($slug);
        $page->delete();
        $responce = [
            'status' => 'success'
        ];
        return json_encode($responce);
    }

}
