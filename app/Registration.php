<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'registrations';





    protected $fillable = ['id','event_id', 'team_id', 'user_id', 'created_at' , 'updated_at'];

}
