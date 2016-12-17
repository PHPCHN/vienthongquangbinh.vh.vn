<?php

class NewsController extends BaseAdminController
{
    public function __construct() {
        parent::__construct();
        $this->beforeFilter('news_create', ['only' => 'store']);
        $this->beforeFilter('news_update', ['only' => 'update']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::select(['id', 'title'])
                        ->paginate(News::PAGINATE);
        return View::make('admin.news.index')->with('news_list', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = Input::all();
        if (Input::hasFile('image')) {
            $data['image'] = $this->imageUpload(News::UPLOAD_KEY, Input::file('image'));
        } else $data['image'] = '';
        if(News::create($data)) {
          Session::flash('flash_success', trans('messages.create_success_news'));
        }
        else {
          Session::flash('flash_error', trans('messages.create_fail_news'));
        }
        return Redirect::route('admin.news.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Redirect::route('admin.news.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $column = [
          'id',
          'title',
          'description',
          'image',
          'content',
        ];
        $news = News::select($column)->find($id);
        if($news) {
          return View::make('admin.news.edit')->with('news', $news);
        }
        else return View::make('errors.404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = Input::all();
        $column = [
          'id',
          'title',
          'description',
          'image',
          'content',
        ];
        $news = News::select($column)->find($id);
        if ($news) {
          if (Input::hasFile('image')) {
            $data['image'] = $this->imageUpload(News::UPLOAD_KEY, Input::file('image'));
          } else $data['image'] = $news->image;
          if($news->update($data)) {
            Session::flash('flash_success', trans('messages.update_success_news'));
          }
          else {
            Session::flash('flash_error', trans('messages.update_fail_news'));
          }
          return Redirect::route('admin.news.edit', $id);
        } else return View::make('errors.404');
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
