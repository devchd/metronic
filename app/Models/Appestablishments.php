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

	protected $fillable = ['id','name','image','category','description','address','lat','lon','site','phone','status'];

	public function benefit()
    {
        return $this->hasMany('App\Models\Appbenefits');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\AppTransactions');
    }

    public function i18n()
    {
        return $this->hasMany('App\Models\AppEstablishmentI18n');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Categories', 'category', 'id');
    }

}