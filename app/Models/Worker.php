<?php


namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $dates=['deleted_at'];
}
