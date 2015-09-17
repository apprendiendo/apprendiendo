<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {

	protected $table = 'topics';

    protected $fillable = [
        'name',
        'subject_id',
        'level_id',
        'grade_id'
    ];

}
