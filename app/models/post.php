<?php

class Post extends BaseModel {
    //the db table this model relates to
    protected $table = 'posts';
    protected $imgDir = 'img_upload';
    //validation rules for our model properties
    static public $rules = [
        'title' => 'required|max:100',
        'body' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function addUploadedImage($image) {
        $systemPath = public_path() . '/' . $this->imgDir . '/';
        $imageName = $this->id . '-' . $image->getClientOriginalName();
        $image->move($systemPath, $imageName);
        $this->img_path = '/' . $this->imgDir . '/' . $imageName;
        
    }

}