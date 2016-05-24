<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Renginys extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'renginys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name', 'aprasymas', 'pradzios_data', 'pabaigos_data' , 'likes_laikas'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];



}
