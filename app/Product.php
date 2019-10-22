<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'description', 'weight', 'price'];
    public static function Apple()
    {
        return self::where('name', 'like', '%IPhone%')->get();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
