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

	public function establishment()
    {
        return $this->belongsTo('App\Models\Appestablishments');
    }

    public function establishmentI18n()
    {
        return $this->hasMany('App\Models\AppEstablishmentI18n', 'establishment_id', 'establishment_id');
    }

    public function codes()
    {
        return $this->hasMany('App\Models\Appcodes', 'benefit_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\AppTransactions');
    }

	public function i18n()
    {
        return $this->hasMany('App\Models\AppBenefitI18n', 'benefit_id', 'id');
    }
}