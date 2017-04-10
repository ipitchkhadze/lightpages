<?php

namespace Ipitchkhadze\LightPages\App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Ipitchkhadze\LightPages\App\Models\Page as P;
use Datatables;

class LightPagesController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('lightpages::index');
    }

    public function data() {
        $pages = P::all();
        return Datatables::of($pages)
                        ->addColumn('action', function ($page) {
                            $btns = '';
//                                if (Auth::user()->can('print'))
                            $btns .= '<a class="btn btn-default" href="' . route('pages.show', ['page' => $page->slug]) . '"><i class="fa fa-eye"></i></a>';
                            $btns .= '<a class="btn btn-primary" href="' . route('pages.edit', ['page' => $page->slug]) . '"><i class="fa fa-edit"></i></a>';
                            $btns .= '<a class="btn btn-danger" href="' . route('pages.destroy', ['page' => $page->slug]) . '"><i class="fa fa-trash"></i></a>';
//                                if (Auth::user()->can('refound') && $now->diffInMinutes($created, false) > 30)
                            return $btns;
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
        return view('lightpages::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $page = new P($request->all());
        $page->save();
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
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
        return view('lightpages::edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
