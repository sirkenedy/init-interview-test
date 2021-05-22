<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuidTrait;

class Entry extends Model
{
    use UsesUuidTrait;

    protected $fillable = [
        'name', 'user_id','status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
