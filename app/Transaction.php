<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuidTrait;
use Facade\FlareClient\Concerns\UsesTime;

class Transaction extends Model
{
    use UsesUuidTrait;

    protected $fillable = [
        "amount_paid",
        "reference_no",
        "status",
        "entry_id",
    ];
    
    public function entry()
    {
        return $this->belongsTo('App\Entry');
    }
}
