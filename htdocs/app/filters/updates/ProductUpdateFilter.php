<?php
class ProductUpdateFilter extends BaseFilter {
  public function __construct() {
    $this->rules = [
      'code' => 'required|unique:products,code,'.Route::input('product').',code',
      'name' => 'required',
      'description' => 'required',
      'content' => 'required',
      'price' => 'required|numeric',
      'image' => 'image',
    ];
  }
}
