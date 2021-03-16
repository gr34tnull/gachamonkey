<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'groups';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function participant()
    {
        return $this->hasMany('App\Models\Participant');
    }
}
