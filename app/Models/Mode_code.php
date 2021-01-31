<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mode_code extends Model
{
    use HasFactory;

    public function mode() {
        return $this->hasMany('App\Models\Mode');
    }

    public function schedule() {
        return $this->hasMany('App\Models\Schedule');
    }
}
