<?php

class DetailController extends BaseUserController
{

    public function product_detail($category, $product)
    {
        $category_find = Category::getmainby_keyword($category);
        $product_find = Product::getby_cate($category_find, $product);
        if($product_find) {
          $sub_cate = Category::select(['id', 'name', 'keyword'])
          ->where('id',$product_find->cate_id)->first();
          $product_find->link = $category_find->keyword;
          $this->session_push($product_find);
          Session::flash('product', $product_find);
          Session::flash('category', $category_find);
          Session::flash('sub_cate', $sub_cate);
          return View::make('user.product');
        }
        else return View::make('errors.404');
    }

    private function session_push($product) {
      //Session::forget('product_seens');
      $in_seens = $this->in_seens($product);
      $in_seens[] = $product;
      Session::put('product_seens', $in_seens);
    }

    private function in_seens($product) {
      $in_seens = array();
      $count = 0;
      if(Session::has('product_seens')) {
        foreach(Session::get('product_seens') as $product_seen)
          if($product_seen->id != $product->id && $count<4) {
            $in_seens[] = $product_seen;
            $count++;
          }
      }
      return $in_seens;
    }

    public function news($id) {
      $news = News::select(News::column())
        ->where('keyword', 'like', '%tin-tuc%')->find($id);
      if($news) {
        return View::make('user.news')->with('news', $news);
      }
      else return View::make('errors.404');
    }

    public function project($id) {
      $column = Project::column();
      $column[] = 'content';
      $column[] = 'created_at';
      $project = Project::select($column)
        ->find($id);
      if($project) {
        return View::make('user.project')->with('project', $project);
      }
      else return View::make('errors.404');
    }

    private function about($keyword, $type, $view='about') {
      $about = News::const_about($type);
      $news = News::select(News::column())
        ->whereIn('keyword', $about)
        ->where('keyword', $keyword)->first();
      if($news) {
        return View::make('user.'.$view)->with('news', $news);
      }
      else return View::make('errors.404');
    }

    public function abouts() {
      return $this->about('gioi-thieu', 'gioi-thieu');
    }

    public function policies($keyword) {
      return $this->about($keyword, 'chinh-sach');
    }

    public function recruits($keyword) {
      return $this->about($keyword, 'tuyen-dung');
    }

    public function supports($keyword) {
      return $this->about($keyword, 'ho-tro');
    }

    public function provs($keyword) {
      return $this->about($keyword, 'cac-tinh');
    }

    public function prov_cities($prov, $keyword) {
      if(in_array($prov, News::const_about('cac-tinh')))
        return $this->about($keyword, $prov);
      else return View::make('errors.404');
    }

    private function support_s($keyword, $view, $id=null) {
      if($id) {
        $news = News::select(News::column())
          ->where('keyword', 'like', '%'.$keyword.'%')
          ->find($id);
        if($news) {
          return View::make('user.'.$view)->with('news', $news);
        }
        else return View::make('errors.404');
      }
      else {
        $news = News::select(News::column())
          ->where('keyword', 'like', '%'.$keyword.'%')
          ->orderBy('updated_at', 'desc')
          ->paginate(News::PAGINATE);
        return View::make('user.'.$view)->with('news_all', $news);
      }
    }

    public function promotions() {
      return $this->support_s('khuyen-mai', 'promotions');
    }

    public function promotion_detail($id) {
      return $this->support_s('khuyen-mai', 'promotion', $id);
    }

    public function ads() {
      return $this->support_s('qc', 'ads_list');
    }

    public function ads_detail($id) {
      return $this->support_s('qc', 'ads', $id);
    }

    public function support_products() {
      return $this->support_s('kien-thuc', 'support_products');
    }

    public function support_product_detail($id) {
      return $this->support_s('kien-thuc', 'sp_pdt', $id);
    }

    public function support_solutions() {
      return $this->support_s('giai-phap', 'support_solutions');
    }

    public function support_solution_detail($id) {
      return $this->support_s('giai-phap', 'sp_sln', $id);
    }

    public function support_downloads() {
      return $this->about('download', 'ho-tro');
    }

    public function sitemap() {
      $sitemap = Seo::sitemap();
      $content = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
      <urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
      foreach($sitemap as $loc => $priority) {
        $content.="<url>
          <loc>".asset($loc)."</loc>
          <lastmod>".date('Y-m-d')."</lastmod>
          <changefreq>daily</changefreq>
          <priority>".$priority."</priority>
        </url>";
      }
      $content.="</urlset>";
      return Response::make($content)->header('Content-Type', 'text/xml');
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
