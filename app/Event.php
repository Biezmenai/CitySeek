<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    public function user()
    {
        return $this->belongsTo('App\User', 'added_by', 'id');
    }




    protected $fillable = ['id','title', 'about', 'start', 'end','added_by', 'created_at' , 'updated_at' , 'eventType' ];




}
