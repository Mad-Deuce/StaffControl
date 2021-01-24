<?php


namespace App\Models;


class Worker extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $dates=['deleted_at'];
}
