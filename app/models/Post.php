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

    public function renderBody() {
        // $Parsedown = new Parsedown();
        // $post->body = $Parsedown->text($post->body);
        // return Parsedown::instance()->parse($this->body);
        $dirtyHTML = Parsedown::instance()->parse($this->body);
        $config = HTMLPurifier_config::createDefault();
        $purifier = new HTMLPurifier($config);
        return $purifier->purify($dirtyHTML);
    }

    public function canManagePost() {

        return Auth::check() && (Auth::user()->is_admin || Auth::user()->id == $this->user_id);
    }

    public static function findBySlug($slug) {
        $post = self ::where('slug', $slug)->first();
        return ($post == null) ? App::abort(404) : $post;
    }

    public function setSlugAttribute($value){
        $value = str_replace(' ', '-', trim($this->title));
        $this->attributes['slug'] = strtolower($value);

    }
}