<?php
class ProductCreateFilter extends BaseFilter {
  protected $rules = [
    'code' => 'required|unique:products',
    'name' => 'required',
    'description' => 'required',
    'price' => 'required|numeric',
    'image' => 'required|image',
  ];
}
