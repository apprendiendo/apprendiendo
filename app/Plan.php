<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model {
    protected $table = 'plans';

    protected $fillable = [
        'topic',
        'device',
        'app_url',
        'app_title',
        'app_description',
        'app_image',
        'ebook_url',
        'ebook_title',
        'ebook_description',
        'ebook_image',
        'video_url',
        'video_title',
        'video_description',
        'video_image',
        'how_to_use'
    ];
    public function owner(){
        return $this->belongsTo('App\User');
    }
}
