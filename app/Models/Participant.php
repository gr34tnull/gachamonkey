<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'participants';

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
}
