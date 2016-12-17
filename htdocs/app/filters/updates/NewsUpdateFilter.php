<?php
class NewsUpdateFilter extends BaseFilter {
  public function __construct() {
    $this->rules = [
      'title' => 'required',
      'description' => 'required',
      'content' => 'required',
      'image' => 'image',
    ];
  }
}
