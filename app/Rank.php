<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ranks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','score', 'rank', 'created_at', 'updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */




}
