<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['name','category_id', 'sku', 'short_desc', 'long_desc', 'price', 'special_price', 'special_price_from', 'special_price_to', 'status', 'quantity', 'meta_title', 'meta_description', 'meta_keywords', 'created_by', 'updated_by'];
    public function category()
    {
        return $this->belongsTo('App\category');
    }
    public function product_images()
    {
        return $this->hasMany('App\product_image','product_id','id')->where('status','1');
    }
    
}
