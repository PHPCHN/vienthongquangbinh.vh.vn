<?php
class NewsCreateFilter extends BaseFilter {
  protected $rules = [
    'title' => 'required',
    'description' => 'required',
    'content' => 'required',
    'image' => 'image',
  ];
}
