<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{

    protected $table = 'sessoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
