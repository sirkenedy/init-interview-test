<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuidTrait;

class Order extends Model
{
    use UsesUuidTrait;

    protected $fillable = [
        "tax",
        "total_cost",
        "country",
        "transport",
        "weight",
        "name",
    ];

    public function entry()
    {
        return $this->belongsTo('App\Entry');
    }
}
