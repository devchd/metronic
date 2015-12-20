<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

	/* primary key */
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_app_categories';

	protected $fillable = ['id','name','created_at','updated_at'];

	public function i18n()
    {
        return $this->hasMany('App\Models\AppCategoriesI18n', 'category_id', 'id');
    }
}