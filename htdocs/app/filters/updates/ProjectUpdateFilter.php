<?php
class ProjectUpdateFilter extends BaseFilter {
  public function __construct() {
    $this->rules = [
      'name' => 'required',
      'description' => 'required',
      'content' => 'required',
      'image' => 'image',
    ];
  }
}
