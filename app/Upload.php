<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'uploads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','link', 'busena', 'ikelikas', 'task_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */




}
