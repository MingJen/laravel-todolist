<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}