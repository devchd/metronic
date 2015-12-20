<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appestablishments extends Model {

	/* primary key */
    protected $primaryKey = 'id';

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_app_establishments';

	protected $fillable = ['id','name','image','category','description','address','lat','lon','site','phone','status','created_at','updated_at'];


}