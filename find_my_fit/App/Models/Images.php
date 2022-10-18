<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
    'user_name', 
    'user_image',
    'type',
    'user_id'
    ];

    public function user(){
        return $this_>belongsTo(User::class, 'user_id');
    }
}
