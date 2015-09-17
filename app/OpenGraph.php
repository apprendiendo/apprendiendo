<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenGraph extends Model {

	//
    protected $title;
    protected $description;
    protected $image;
    public function __constructor($title,$description,$image){
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }

    protected $fillable = [
        'title',
        'description',
        'image'
    ];

}
