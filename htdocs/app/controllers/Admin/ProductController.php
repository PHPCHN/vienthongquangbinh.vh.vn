<?php

class ProductController extends BaseAdminController
{
    public function __construct() {
        parent::__construct();
        $this->beforeFilter('product_create', ['only' => 'store']);
        $this->beforeFilter('product_update', ['only' => 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::listof_names();
        Session::flash('categories', $categories);
        $products = Product::select(['code', 'cate_id', 'top', 'new', 'pro', 'home', 'tab'])
                        ->orderBy('cate_id')->paginate(Product::PAGINATE);
        return View::make('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id', 'name'])
                          ->orderBy('keyword')
                          ->get();
        return View::make('admin.product.create')->with('categories', $categories);
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
            $data['image'] = $this->imageUpload(Product::UPLOAD_KEY, Input::file('image'));
        } else $data['image'] = '';
        $data['content'] = $data['description'];
        if(Product::create($data)) {
          Session::flash('flash_success', trans('messages.create_success_products'));
        }
        else {
          Session::flash('flash_error', trans('messages.create_fail_products'));
        }
        return Redirect::route('admin.product.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Redirect::route('admin.product.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $column = Product::column();
        $column[] = 'content';
        $product = Product::select($column)->where('code', $id)->first();
        if($product) {
          $category = Category::select(['id', 'sup_id'])
                          ->find($product->cate_id);
          $options = Option::listby_cate($category);
          $product_opts = Option::product_opts($product);
          $categories = Category::select(['id', 'name'])
                            ->orderBy('keyword')
                            ->get();
          Session::flash('categories', $categories);
          Session::flash('options', $options);
          Session::flash('product_opts', $product_opts);
          return View::make('admin.product.edit')->with('product', $product);
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
      $data = Input::except('options');
      $options = Input::get('options');
      $column = Product::column();
      $column[] = 'content';
      $product = Product::select($column)->where('code', $id)->first();
      if ($product) {
        if (Input::hasFile('image')) {
          $data['image'] = $this->imageUpload(Product::UPLOAD_KEY, Input::file('image'));
        } else $data['image'] = $product->image;
        if($product->update($data) && $product->update_opt($options)) {
          Session::flash('flash_success', trans('messages.update_success_products'));
        }
        else {
          Session::flash('flash_error', trans('messages.update_fail_products'));
        }
        return Redirect::route('admin.product.edit', $id);
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

    public function set_top($id) {
        return $this->set_attr_bool($id, 'top');
    }

    public function set_home($id) {
        return $this->set_attr_bool($id, 'home');
    }

    public function set_tab($id) {
        return $this->set_attr_bool($id, 'tab');
    }

    public function set_new($id) {
        return $this->set_attr_bool($id, 'new');
    }

    public function set_pro($id) {
        return $this->set_attr_bool($id, 'pro');
    }

    private function set_attr_bool($id, $attr) {
      $product = Product::select(['id', 'cate_id', $attr])->where('code', $id)->first();
      if($product) {
        $envalue = 0;
        if($product->$attr == 0) $envalue = 1;
        $count = $product->count_attr($attr);
        if($envalue == 1 && $count >= 10) {
          Session::flash('flash_error', trans('messages.update_full_products'));
        }
        else if($product->update([$attr => $envalue]))
          Session::flash('flash_success', trans('messages.update_success_products'));
        else Session::flash('flash_error', trans('messages.update_fail_products'));
        return Redirect::back();
      } else return View::make('errors.404');
    }
}
