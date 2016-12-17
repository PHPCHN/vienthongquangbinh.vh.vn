<?php

class OrderController extends BaseUserController
{

    public function __construct() {
      parent::__construct();
      $this->beforeFilter('order_create', ['only' => 'order']);
    }

    public function order()
    {
      if(Input::has('sm_add'))
        $this->order_add();
      elseif(Input::has('sm_order'))
        $this->order_submit();
      else $this->order_rm();
      return Redirect::back();
    }

    private function in_cart($product)
    {
      if(Session::has('cart')) {
        $cart = Session::get('cart');
        foreach($cart as $cart_pdt) {
          if($cart_pdt->id == $product->id)
            return;
        }
      } else $cart = array();
      return $cart;
    }

    private function cart_add()
    {
      if(Input::has('pdt')) {
        $pdt = Input::get('pdt');
        $ql = 1;
        $product = Product::select(['id', 'name', 'image', 'code', 'price'])
                    ->find($pdt);
        if($product) {
          $product->ql = $ql;
          $cart = $this->in_cart($product);
          if($cart !== null) {
            $cart[] = $product;
            Session::put('cart', $cart);
            return 1;
          }
          else return 0;
        }
        else return -1;
      }
      else return -1;
    }

    private function order_add()
    {
      $cart_add = $this->card_add();
      if($cart_add == 1) {
        Session::flash('flash_success', trans('messages.order_success_add'));
      }
      else if($cart_add == 0) {
        Session::flash('flash_info', trans('messages.order_current_add'));
      }
      else Session::flash('flash_error', trans('messages.order_fail_add'));
    }

    private function cart_rm()
    {
      if(Session::has('cart')){
        $cart_rm = array();
        $cart = Session::get('cart');
        foreach($cart as $cart_pdt) {
          if(!Input::has('sm_rm_'.$cart_pdt->id))
            $cart_rm[] = $cart_pdt;
        }
        if(count($cart_rm) < count($cart)) {
          Session::put('cart', $cart_rm);
          return 1;
        }
        else return 0;
      }
      else return -1;
    }

    private function order_rm()
    {
      $cart_rm = $this->cart_rm();
      if($cart_rm == 1)
          Session::flash('flash_success', trans('messages.order_success_rm'));
      else if($cart_rm == 0)
        Session::flash('flash_info', trans('messages.order_none_rm'));
      else Session::flash('flash_info', trans('messages.order_empty_rm'));
    }

    private function order_submit()
    {
      $this->cart_add();
      if(Session::has('cart')) {
        $cart = Session::get('cart');
        $cart_info = Session::get('cart_info');
        $cart_info['price'] = $this->cart_price($cart);
        if($cart_info['price'] > 0) {
          $order = Order::create($cart_info);
          if($order) {
            if($this->add_cart_pdts($cart, $order->id)) {
              Mail::send('emails.cart', array(
                'cart' => $cart,
                'cart_info' => $cart_info),
                function($message){
                  $message->to(Config::get('mail.to.address'),
                    Config::get('mail.to.name'))
                  ->subject(trans('messages.order_info'));
              });
              Session::flash('flash_success', trans('messages.order_success'));
            }
            else Session::flash('flash_error', trans('messages.order_fail'));
          }
          else Session::flash('flash_error', trans('messages.order_fail'));
        }
        else Session::flash('flash_info', trans('messages.order_none'));
      }
      else Session::flash('flash_info', trans('messages.order_none'));
      Session::forget('cart_info');
      Session::forget('cart');
    }

    private function add_cart_pdts($cart, $order_id)
    {
      $return = true;
      $result = array();
      foreach($cart as $cart_pdt) {
        $result[] = DB::table('product_orders')->insert([
          'order_id' => $order_id,
          'product_id' => $cart_pdt->id,
          'quantity' => $cart_pdt->ql,
        ]);
      }
      foreach($result as $rs) $return = $return && $rs;
      return $return;
    }

    private function cart_price($cart)
    {
      $cart_price = 0;
      foreach($cart as $cart_pdt) {
        $cart_price += $cart_pdt->price * $cart_pdt->ql;
      }
      return $cart_price;
    }

    public static function order_bkp($valid = null)
    {
      $cart_info = Input::only('name', 'phone', 'address', 'comment');
      Session::put('cart_info', $cart_info);
      if(Session::has('cart')) {
        $cart = Session::get('cart');
        $qls = Input::get('ql');
        foreach($cart as $cart_pdt)
          $cart_pdt->ql = $qls[$cart_pdt->id];
        Session::put('cart', $cart);
      }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('user.order');
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
