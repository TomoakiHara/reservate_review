<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    protected $fillable = ['id','user_id','shop_id', 'evaluate'];

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
