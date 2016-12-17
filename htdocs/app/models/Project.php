<?php

class Project extends Model
{

    const UPLOAD_KEY = 'project';
    const ONTOP = 1;
    const NONTOP = 0;
    const PAGINATE = 20;

    public static function const_sort() {
      return [
        'Mới nhất' => 'new',
        'Giá tăng' => 'gia-tang',
        'Giá giảm' => 'gia-giam',
      ];
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

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
        'description',
        'content',
        'image',
        'top',
        'dur',
        'pro',
    ];

    public static function column() {
       return [
         'id',
         'name',
         'description',
         'image',
         'top',
         'dur',
         'pro',
       ];
    }

    public static function listfor_homes() {
      $column = self::column();
      $column[] = 'created_at';
      $home_projects = array();
      $home_projects['top'] = array();
      $home_projects['dur'] = array();
      $home_projects['pro'] = array();
      $projects = self::select($column)
          ->whereRaw('(top + dur + pro) > 0')
          ->orderBy('updated_at', 'desc')
          ->get();
      foreach($projects as $project) {
        if($project->top == self::ONTOP) {
          $home_projects['top'][] = $project;
        }
        if($project->dur == self::ONTOP){
          $home_projects['dur'][] = $project;
        }
        if($project->pro == self::ONTOP){
          $home_projects['pro'][] = $project;
        }
      }
      return $home_projects;
    }

    public static function count_attr($attr) {
      $count = self::where($attr, 1)->count('id');
      return $count;
    }

    public function image_link() {
      return Config::get('uploads.'.self::UPLOAD_KEY).$this->image;
    }
}
