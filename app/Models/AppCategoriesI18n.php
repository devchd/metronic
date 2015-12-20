<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppCategoriesI18n extends Model
{
    protected $fillable = ['name','category_id','lang'];

    protected $table = 'tb_app_categories_i18n';

    public function category()
    {
        return $this->belongsTo('App\Models\Categories', 'categories_id', 'id');
    }
}