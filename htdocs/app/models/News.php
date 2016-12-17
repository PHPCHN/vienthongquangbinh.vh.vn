<?php

class News extends Model
{

    const UPLOAD_KEY = 'news';
    const PAGINATE = 20;

    public static function const_about($about) {
      return Config::get('news.'.$about);
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

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
        'title',
        'description',
        'image',
        'content',
        'keyword',
    ];

    public static function column() {
      return [
        'id',
        'title',
        'description',
        'image',
        'content',
        'created_at',
      ];
    }

    public function image_link() {
      return Config::get('uploads.'.self::UPLOAD_KEY).$this->image;
    }
}
