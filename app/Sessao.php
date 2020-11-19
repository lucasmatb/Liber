<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{

    protected $table = 'sessao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'codigoDeAcesso', 'dataDeEncerramento',
    ];

}
