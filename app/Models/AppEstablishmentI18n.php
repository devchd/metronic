<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AppEstablishmentI18n extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'lang', 'description', 'establishment_id'];

    protected $table = 'tb_app_establishments_i18n';

    public function establishment()
    {
        return $this->belongsTo('App\Models\Appestablishments');
    }

    public function benefit()
    {
        return $this->belongsTo('App\Models\AppBenefit', 'establishment_id', 'establishment_id');
    }
}
