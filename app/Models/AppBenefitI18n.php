<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppBenefitI18n extends Model
{
    protected $fillable = ['benefit_id', 'description', 'lang'];

    protected $table = 'tb_app_benefit_i18n';

    public function benefits()
    {
        return $this->belongsTo('App\Models\Appbenefits');
    }
}
