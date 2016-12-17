<?php

class OptionVal extends Model
{
  
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'option_vals';

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
        'opt_id',
        'label',
    ];
}
