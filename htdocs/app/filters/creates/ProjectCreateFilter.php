<?php
class ProjectCreateFilter extends BaseFilter {
  protected $rules = [
    'name' => 'required',
    'description' => 'required',
    'content' => 'required',
    'image' => 'required|image',
  ];
}
