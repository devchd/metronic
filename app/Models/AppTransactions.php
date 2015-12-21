<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AppTransactions extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

    public function code()
    {
        return $this->belongsTo('App\Models\AppCode');
    }

    public function establishment()
    {
        return $this->belongsTo('App\Models\AppEstablishment');
    }

    public function benefit()
    {
        return $this->belongsTo('App\Models\AppBenefit');
    }
}
