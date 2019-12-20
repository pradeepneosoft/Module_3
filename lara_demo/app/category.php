<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'parent_id'];

    public function get_parent()
    {
        return $this->belongsTo('App\category','parent_id','id');
    }
    public function product()
    {
        return $this->hasMany('App\product','category_id','id');
    }
}
