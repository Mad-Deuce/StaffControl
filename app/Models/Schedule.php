<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function worker() {
        return $this->belongsTo('App\Models\Worker');
    }

    public function mode_code() {
        return $this->belongsTo('App\Models\Mode_code');
    }
}
