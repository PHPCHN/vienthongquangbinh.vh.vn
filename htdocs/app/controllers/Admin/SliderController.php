<?php

class SliderController extends BaseAdminController
{
    public function __construct() {
        parent::__construct();
    }

    public function uploadImage() {
      $funcNum = Input::get('CKEditorFuncNum');
      $CKEditor = Input::get('CKEditor');
      $langCode = Input::get('langCode');
      $validator = Validator::make(Input::all(), ['upload' => 'required|image']);
      if($validator->fails()) {
  			$message = $validator->messages()->first('upload');
        $url = '';
  		} else {
        $url = $this->imageUpload(Slider::UPLOAD_KEY, Input::file('upload'));
        DB::table('images')->insert(['image' => $url]);
        $url = asset(Config::get('uploads.'.Slider::UPLOAD_KEY).$url);
        $message = '';
      }
      $return =  "<script>
          window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');
        </script>";
      return $return;
    }

    public function browseImage() {
      $images = DB::table('images')->select(['id', 'image'])->get();
      Session::flash('func_num', Input::get('CKEditorFuncNum'));
      return View::make('admin.image.browse')->with('images', $images);
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
    public function update($id)
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
