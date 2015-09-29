<?php

namespace Application\Model;

class Post {
    
    public $id;
    public $title;
    public $text_post;
    public $active;
    public $category;
    
    public function exchangeArray($data) {
        $this->id = ((!empty($data['id'])) ? ($data['id']) : (null));    
        $this->category = ((!empty($data['category'])) ? ($data['category']) : (null));    
        $this->title = ((!empty($data['title'])) ? ($data['title']) : ("sen titulo!"));
        $this->text_post = ((!empty($data['text_post'])) ? ($data['text_post']) : (""));
        $this->active = (($data['active']=="true") ? (1) : (0));
    }
}

