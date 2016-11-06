<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teams';

    public function members()
    {
        return $this->hasMany('App\User', 'team', 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name', 'image', 'secret', 'created_at', 'updated_at', 'members_count'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */




}
