<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    protected $fillable = [
        'description', 'status', 'priority', 'user_id',
    ];
}
