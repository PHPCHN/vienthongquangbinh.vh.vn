<?php

class BaseAdminController extends BaseController
{
    /**
     * Instantiate a new AdminBaseController instance.
     */
    public function __construct()
    {
        Session::flash('mechs', MechStatistik::mechs());
        $this->beforeFilter('auth', array('except' => ['getLogin','postLogin']));
        $this->beforeFilter('csrf', array('on' => 'post', 'except' => 'postLogin'));
    }

    /**
     * Save upload image from request file into uploads folder
     *
     * @param string $path
     * @param UploadedFile $file
     *
     * @return string
     */
    public function imageUpload($path, $file)
    {
        $dir = Config::get("uploads.$path");
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $name = $this->url_title($file->getClientOriginalName());
        while (file_exists($dir.$name)) {
            $name = (rand(10, 99))."_".$name;
        }
        $file->move($dir, $name);
        return $name;
    }

    /**
     * Remove image from uploads folder
     *
     * @param string $path
     * @param string $filename
     *
     * @return boolean
     */
    public function imageRemove($path, $filename)
    {
        $dir = Config::get("uploads.$path");
        if (file_exists($dir.$filename)) {
            unlink($dir.$filename);
            return true;
        }
        return false;
    }

    private function url_title($str)
    {
      $unicodes = array (
        'a' =>'á|à|ạ|ả|ã|ă|ắ|ằ|ặ|ẳ|ẵ|â|ấ|ầ|ậ|ẩ|ẫ',
        'A'	=>'Á|À|Ạ|Ả|Ã|Ă|Ắ|Ằ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ',
        'o' =>'ó|ò|ọ|ỏ|õ|ô|ố|ồ|ộ|ổ|ỗ|ơ|ớ|ờ|ợ|ở|ỡ',
        'O'	=>'Ó|Ò|Ọ|Ỏ|Õ|Ô|Ố|Ồ|Ộ|Ổ|Ỗ|Ơ|Ớ|Ờ|Ợ|Ở|Ỡ',
        'e' =>'é|è|ẹ|ẻ|ẽ|ê|ế|ề|ệ|ể|ễ',
        'E'	=>'É|È|Ẹ|Ẻ|Ẽ|Ê|Ế|Ề|Ệ|Ể|Ễ',
        'u' =>'ú|ù|ụ|ủ|ũ|ư|ứ|ừ|ự|ử|ữ',
        'U'	=>'Ú|Ù|Ụ|Ủ|Ũ|Ư|Ứ|Ừ|Ự|Ử|Ữ',
        'i' =>'í|ì|ị|ỉ|ĩ',
        'I'	=>'Í|Ì|Ị|Ỉ|Ĩ',
        'y' =>'ý|ỳ|ỵ|ỷ|ỹ',
        'Y'	=>'Ý|Ỳ|Ỵ|Ỷ|Ỹ',
        'd' =>'đ',
        'D' =>'Đ',
        '-' =>' ',
      );

      foreach($unicodes as $ascii=>$unicode)
      {
        $str=preg_replace("/({$unicode})/",$ascii,$str);
      }
      return $str;
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
