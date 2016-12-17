<?php

class Category extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
        'keyword',
        'description',
        'sup_id',
    ];

    public static function listfor_homes() {
      $home_categories = array();
      $categories = self::select(['id', 'name', 'keyword', 'sup_id'])
          ->orderBy('sup_id')->get();
      foreach($categories as $category) {
          $home_categories[$category->id] = $category;
      }
      return $home_categories;
    }

    public static function getby_keyword($keyword) {
      $cates = self::select(['id', 'name', 'keyword', 'sup_id'])->where('keyword', $keyword)->get();
      if($cates->count())
        return $cates[0];
    }

    public static function getmainby_keyword($keyword) {
      $cates = self::select(['id', 'name', 'keyword', 'sup_id'])
      ->where('sup_id', 0)
      ->where('keyword', $keyword)->get();
      if($cates->count())
        return $cates[0];
    }

    public static function listfor_links() {
      $cates = self::select(['id', 'keyword', 'sup_id'])->orderBy('sup_id')->get();
      $list_main = array();
      $list_keys = array();
      foreach($cates as $cate) {
        if($cate->sup_id == 0) {
          $list_main[$cate->id] = $cate->keyword;
          $list_keys[$cate->id] = $cate->keyword;
        } else $list_keys[$cate->id] = $list_main[$cate->sup_id];
      }
      return $list_keys;
    }

    public static function listof_names() {
      $cates = self::select(['id', 'name'])->get();
      $listof_names = array();
      foreach($cates as $cate) {
          $listof_names[$cate->id] = $cate->name;
      }
      return $listof_names;
    }
}
