<?php


namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $dates=['deleted_at'];

    public function worker()
    {
        return $this->belongsTo('App\Models\Worker');
    }

}

