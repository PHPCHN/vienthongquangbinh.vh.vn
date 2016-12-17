<?php

class Seo extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'seos';

    /**
     * Define attributes deleted_at of the data.
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keyword',
    ];

    public static function sitemap() {
      $sitemap = array();
      $sitemap['/'] = Config::get('sitemap.home');
      $sitemap['/search'] = Config::get('sitemap.search');
      $categories = Category::select(['id','keyword'])->get();
      foreach($categories as $category)
        $sitemap['/'.$category->keyword] = Config::get('sitemap.category');
      $cate_links = Category::listfor_links();
      $products = Product::select(['id','cate_id','code'])->get();
      foreach($products as $product)
        $sitemap['/'.$cate_links[$product->cate_id].'/'.$product->code] = Config::get('sitemap.product');
      $sitemap['/dat-hang'] = Config::get('sitemap.order');
      $sitemap['/tin-tuc'] = Config::get('sitemap.news');
      $sitemap['/gioi-thieu'] = Config::get('sitemap.news-x');
      $sitemap['/chinh-sach-uu-dai'] = Config::get('sitemap.news-x');
      $sitemap['/chinh-sach-bao-hanh'] = Config::get('sitemap.news-x');
      $sitemap['/chinh-sach-van-chuyen'] = Config::get('sitemap.news-x');
      $sitemap['/chinh-sach-doi-tra-hang'] = Config::get('sitemap.news-x');
      $sitemap['/chinh-sach-bao-mat-thong-tin'] = Config::get('sitemap.news-x');
      $sitemap['/tuyen-nhan-vien-marketing-online'] = Config::get('sitemap.news-x');
      $sitemap['/tuyen-nhan-vien-ky-thuat'] = Config::get('sitemap.news-x');
      $sitemap['/ho-tro-ky-thuat'] = Config::get('sitemap.news-x');
      $sitemap['/kien-thuc-san-pham'] = Config::get('sitemap.news');
      $sitemap['/tu-van-giai-phap-thiet-bi'] = Config::get('sitemap.news');
      $sitemap['/download'] = Config::get('sitemap.news-x');
      $sitemap['/khuyen-mai'] = Config::get('sitemap.news');
      $sitemap['/qc'] = Config::get('sitemap.news');
      $sitemap['/cong-trinh'] = Config::get('sitemap.news');
      $news = News::select(['id', 'keyword'])->get();
      foreach($news as $news_x) {
        if(strrpos($news_x->keyword, 'tin-tuc') !==false)
          $sitemap['/tin-tuc/'.$news_x->id] = Config::get('sitemap.news-x');
        if(strrpos($news_x->keyword, 'kien-thuc') !==false)
          $sitemap['/kien-thuc-san-pham/'.$news_x->id] = Config::get('sitemap.news-x');
        if(strrpos($news_x->keyword, 'giai-phap') !==false)
          $sitemap['/tu-van-giai-phap-thiet-bi/'.$news_x->id] = Config::get('sitemap.news-x');
        if(strrpos($news_x->keyword, 'khuyen-mai') !==false)
          $sitemap['/khuyen-mai/'.$news_x->id] = Config::get('sitemap.news-x');
        if(strrpos($news_x->keyword, 'qc') !==false)
          $sitemap['/qc/'.$news_x->id] = Config::get('sitemap.news-x');
      }
      $projects = Project::select(['id', 'name'])->get();
      foreach($projects as $project)
        $sitemap['/cong-trinh/'.$project->id] = Config::get('sitemap.news-x');
      $provs = News::const_about('cac-tinh');
      foreach($provs as $prov) {
        $sitemap['/lap-dat-camera-tai-'.$prov] = Config::get('sitemap.news-x');
        $prov_cs = News::const_about($prov);
        foreach($prov_cs as $prov_c) {
          $sitemap['/lap-dat-camera-tai-'.$prov.'/'.$prov_c] = Config::get('sitemap.news-x');    
        }
      }
      return $sitemap;
    }
}
