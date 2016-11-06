<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    public function user()
    {
        return $this->belongsTo('App\User', 'added_by', 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','title', 'image', 'content', 'added_by', 'created_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */




}
