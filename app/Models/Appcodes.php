<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appcodes extends Model {

	/* primary key */
    protected $primaryKey = 'id';

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_app_codes';

	protected $fillable = ['id','benefit_id','number','bar_code','status','client','single_use','created_at','updated_at'];

	public function benefit()
    {
        return $this->belongsTo('App\Models\Appbenefits');
    }
}