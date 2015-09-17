<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model {

    protected $table = 'grades';

    protected $fillable = [
        'name',
        'level_id'
    ];

}
