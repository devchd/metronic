<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appbenefits extends Model {

	/* primary key */
    protected $primaryKey = 'id';

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_app_benefits';
	protected $fillable = ['id','establishment_id','category','description','status','single_use','created_at','updated_at'];

}