<?php
class BaseFilter {
  protected $rules = array();

  public function filter() {
    $validator = Validator::make(Input::all(), $this->rules);
    if($validator->fails()) {
			Session::flash('flash_error_valid', $validator->messages());
      return Redirect::back();
		}
  }

  public static function has_error($field) {
    if(Session::has('flash_error_valid')
      && Session::get('flash_error_valid')->has($field))
      return 'has-error';
  }

  public static function error($field) {
    if(Session::has('flash_error_valid')
      && Session::get('flash_error_valid')->has($field))
      return Session::get('flash_error_valid')->first($field);
  }
}
