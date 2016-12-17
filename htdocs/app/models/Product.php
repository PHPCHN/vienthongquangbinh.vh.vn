<?php

class Product extends Model
{

    const UPLOAD_KEY = 'product';
    const ONTOP = 1;
    const NONTOP = 0;
    const ONHOME = 1;
    const NONHOME = 0;
    const PAGINATE = 20;

    public static function const_sort() {
      return [
        'Mới nhất' => 'new',
        'Giá tăng' => 'gia-tang',
        'Giá giảm' => 'gia-giam',
      ];
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
        'name',
        'cate_id',
        'description',
        'content',
        'price',
        'image',
        'code',
        'top',
        'new',
        'pro',
        'home',
        'tab',
    ];

    public static function column() {
       return [
         'id',
         'name',
         'image',
         'description',
         'price',
         'top',
         'new',
         'pro',
         'code',
         'cate_id',
       ];
    }

    public static function listfor_homes() {
      $column = self::column();
      $column[] = 'home';
      $column[] = 'tab';
      $home_products = array();
      $home_products['top'] = array();
      $home_categories = Category::listfor_homes();
      $home_products['categories'] = $home_categories;
      $products = self::select($column)
          ->whereRaw('(top + home + tab) > 0')
          ->orderBy('price')
          ->get();
      foreach($products as $product) {
        $cate = $home_categories[$product->cate_id];
        if($cate->sup_id > 0)
          $cate = $home_categories[$cate->sup_id];
        $product->link = $cate->keyword.'/'.$product->code;
        if($product->top == self::ONTOP) {
          $home_products['top'][] = $product;
        }
        if($product->home == self::ONHOME){
          if(!isset($home_products[$cate->id]))
            $home_products[$cate->id] = array();
          $home_products[$cate->id][] = $product;
        }
        if($product->tab == self::ONHOME){
          if(!isset($home_products[$product->cate_id]))
            $home_products[$product->cate_id] = array();
          $home_products[$product->cate_id][] = $product;
        }
      }
      return $home_products;
    }

    public function update_opt($options) {
      $update = true;
      if($options) foreach($options as $option) {
        $product_opt = DB::table('product_opts')->select(['opt_val_id'])
          ->where('product_id', $this->id)
          ->whereIn('opt_val_id', function($query) use ($option) {
            $query->from('option_vals')
            ->where('opt_id', function($query) use ($option) {
              $query->from('option_vals')->select(['opt_id'])->find($option);
            })->lists('id');
          })->first();
        if($product_opt) {
          if($product_opt->opt_val_id != $option)
            $update = $update && DB::table('product_opts')
            ->where('product_id', $this->id)
            ->where('opt_val_id', $product_opt->opt_val_id)
            ->update(['opt_val_id' => $option]);
        }
        else {
          $update = $update && DB::table('product_opts')->insert([
            'product_id' => $this->id,
            'opt_val_id' => $option,
          ]);
        }
      }
      return $update;
    }

    private function count_home() {
      $category = Category::select(['id', 'sup_id'])->find($this->cate_id);
      if($category->sup_id > 0)
        $cate_id = $category->sup_id;
      else $cate_id = $this->cate_id;
      $count = Product::whereIn('cate_id', function($query) use ($cate_id) {
        $query->from('categories')->where('id', $cate_id)
        ->orWhere('sup_id', $cate_id)->lists('id');
      })
      ->where('home', 1)->count('id');
      return $count;
    }

    private function count_tab() {
      $count = Product::where('cate_id', $this->cate_id)
                  ->where('tab', 1)->count('id');
      return $count;
    }

    public function count_attr($attr) {
      $count = 0;
      if($attr == 'top')
        $count = self::where('top', 1)->count('id');
      else if($attr == 'home')
        $count = $this->count_home();
      else if($attr == 'tab')
        $count = $this->count_tab();
      return $count;
    }

    public function get_opt_th() {
      $trademark = DB::table('product_opts')
        ->join('option_vals', 'option_vals.id', '=', 'product_opts.opt_val_id')
        ->where('product_id', $this->id)
        ->where('opt_id', 2)->lists('label');
      if(count($trademark)) return $trademark[0];
    }

    public function get_cate() {
      $cate = Category::select(['id', 'sup_id', 'keyword'])
          ->find($this->cate_id);
      if($cate->sup_id != 0)
        $cate = Category::select(['id', 'sup_id', 'keyword'])
          ->find($cate->sup_id);
      return $cate;
    }

    public static function liston_top() {
      $top = self::select(self::column())->where('top', self::ONTOP)->get();
      $link_keys = Category::listfor_links();
      foreach($top as $product)
        $product->link = $link_keys[$product->cate_id].'/'.$product->code;
      return $top;
    }

    public static function listby_mcate() {
      $cates = Category::listfor_links();
      $products = self::select(self::column())
          ->where('home', self::ONHOME)->get();
      $list_mcate = array();
      foreach($products as $product) {
        $key = $cates[$product->cate_id];
        if(!isset($list_mcate[$key])){
          $list_mcate[$key] = array();
        }
        $list_mcate[$key][] = $product;
      }
      return $list_mcate;
    }

    public static function listby_cate($cate_id, $column=null) {
      $cate_ids = Category::where('id', $cate_id)
          ->orWhere('sup_id', $cate_id)->lists('id');
      if(!$column) $column = self::column();
      $products = self::select($column)->whereIn('cate_id', $cate_ids);
      return $products;
    }

    public static function getby_cate($cate, $code) {
      $column = self::column();
      $column[] = 'content';
      if($cate)
        return self::listby_cate($cate->id, $column)
            ->where('code', $code)->first();
    }

    public static function listby_cate_opt($cate_id) {
      $product_ids = self::listby_opt();
      $products = self::listby_cate($cate_id);
      if($product_ids!==null)
        $products = $products->whereIn('id', $product_ids);
      $product_sorts = self::listby_sort($products, Input::get('sort'))
          ->paginate(self::PAGINATE);
      return $product_sorts;
    }

    public function list_involve() {
      $id = $this->id;
      $product_ids = DB::table('product_opts')
          ->selectRaw('product_id, count(product_id) as count')
          ->whereIn('opt_val_id', function($query) use ($id) {
            $query->from('product_opts')
            ->where('product_id', $id)->lists('opt_val_id');
          })->whereNotIn('product_id', [$id])
          ->groupBy('product_id')
          ->orderBy('count', 'desc')
          ->take(5)->lists('product_id');
      $products = self::select(self::column())->whereIn('id', $product_ids)
                    ->orderBy('code')->get();
      $link_keys = Category::listfor_links();
      foreach($products as $product)
        $product->link = $link_keys[$product->cate_id].'/'.$product->code;
      return $products;
    }

    private static function listby_opt() {
      $sort = Input::get('sort');
      $options = Option::join('option_vals',
          'option_vals.opt_id', '=', 'options.id')
      ->where(function($query) {
        foreach(Input::all() as $opt => $val) {
          $query->orWhere(function($query) use ($opt, $val){
            $query->where('options.keyword', $opt)
                  ->where('option_vals.keyword', $val);
          });
        }
      })->select('option_vals.id')->lists('id');
      if(count($options)>0 && count($options)<=count(Input::all())) {
        $product_ids = DB::table('product_opts')
            ->whereIn('opt_val_id', $options)
            ->groupBy('product_id')
            ->havingRaw('count(product_id) = '.(count($options)))
            ->lists('product_id');
        return $product_ids;
      }
    }

    private static function listby_sort($query, $sort) {
      if($sort == 'new')
        $query_sort = $query->orderBy('created_at', 'desc');
      else if($sort == 'gia-tang')
        $query_sort = $query->orderBy('price');
      else if($sort == 'gia-giam')
        $query_sort = $query->orderBy('price', 'desc');
      else $query_sort = $query->orderBy('code');
      return $query_sort;
    }

    public static function search() {
      $keys = explode(' ', Input::get('search'));
      $product_sort_ids = self::listby_opt();
      $products = self::select(self::column());
      foreach ($keys as $key) {
        $products = $products->whereIn('id', function($query) use ($key){
          $query->from('products')
            ->where('code', 'like', '%'.$key.'%')
            ->orWhereIn('id', function($query) use ($key){
              $query->from('products')
                ->join('categories', 'products.cate_id', '=', 'categories.id')
                ->where('keyword', 'like', '%'.$key.'%')
                ->select(['products.id'])->lists('id');
            })
            ->orWhereIn('id', function($query) use ($key){
              $query->from('product_opts')
                ->join('option_vals', 'product_opts.opt_val_id', '=', 'option_vals.id')
                ->where('keyword', 'like', '%'.$key.'%')
                ->whereRaw(strlen($key).'>2')
                ->select(['product_id'])->lists('id');
            })
            ->lists('id');
        });
      }
      if($product_sort_ids!==null)
        $products = $products->whereIn('id', $product_sort_ids);
      $products = self::listby_sort($products, Input::get('sort'))
          ->paginate(self::PAGINATE);
      $link_keys = Category::listfor_links();
      foreach($products as $product)
        $product->link = $link_keys[$product->cate_id].'/'.$product->code;
      return $products;
    }

    public function price_label() {
      if($this->price > 0)
        return number_format($this->price,0,',','.'). ' VND';
      else return trans('messages.price_cont');
    }

    public function image_link() {
      return Config::get('uploads.'.self::UPLOAD_KEY).$this->image;
    }
}
