<?php

namespace Ipitchkhadze\LightPages\App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Ipitchkhadze\LightPages\App\Models\Page;
use Datatables ;

class LightPagesController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('lightpages::index');
    }

    public function getData() {
        $pages = Pages::all()->get();
                
        return Datatables::of($pages)
//                        ->addColumn('pbtn', function ($payment) {
//
//                            if ($payment->status == 8) {
//                                $pls         = json_decode($payment->placement);
//                                $placenments = '';
//                                if (is_array($pls)) {
//                                    foreach ($pls as $placement) {
//                                        if (isset($placement->event_name)) {
//                                            $placenments .= 'ряд - ' . $placement->row . ', место - ' . $placement->place . ' <br>';
//                                        }
//                                    }
//                                }
//
//                                $created = new Carbon($payment->date);
//                                $now     = Carbon::now();
//
//                                $btns = '';
//                                if (Auth::user()->can('print'))
//                                    $btns .= '<button class="btn btn-default pay-btn" sb_order="' . $payment->sb_order . '">Печать билетов</button>';
//                                if (Auth::user()->can('refound') && $now->diffInMinutes($created, false) > 30)
//                                    $btns .= '<button class="btn btn-warning ref-btn" event_name="' . $payment->event_name . '" event_date="' . Carbon::parse($payment->date)->format('d.m.Y в H:i') . '" event_places="' . $placenments . '" event_price="' . $payment->price . '" sb_order="' . $payment->sb_order . '">Возврат билетов</button>';
//
//                                return $btns;
//                            }
//                            return;
//                        }, false)
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
        $page = new Page($request->all());
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
        $data['page'] = Page::findBySlugOrFail($slug);
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
