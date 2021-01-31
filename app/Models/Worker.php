<?php


namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $dates=['deleted_at'];

    public function position() {
        return $this->belongsTo('App\Models\Position');
    }

    public function mode() {
        return $this->hasMany('App\Models\Mode');
    }

    public function schedule() {
        return $this->hasMany('App\Models\Schedule');
    }
}
