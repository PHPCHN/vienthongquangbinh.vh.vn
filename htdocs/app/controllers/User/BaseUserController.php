<?php

class BaseUserController extends BaseController
{

    /**
     * Instantiate a new AdminBaseController instance.
     */
    public function __construct()
    {
        $column = ['id', 'title', 'description', 'image', 'created_at'];
        $news_list = News::select($column)
            ->where('keyword', 'like', '%tin-tuc%')
            ->orderBy('updated_at', 'desc')
            ->take(10)->get();
        Session::flash('news_list', $news_list);
        $ads_list = News::select($column)
            ->where('keyword', 'like', '%qc%')
            ->orderBy('updated_at', 'desc')
            ->take(10)->get();
        Session::flash('ads_list', $ads_list);
        MechStatistik::init();
        Session::flash('mechs', MechStatistik::mechs());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
