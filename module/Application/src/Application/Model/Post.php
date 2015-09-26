<?php

namespace Application\Model;

class Post {
    
    public $id;
    public $title;
    public $text_post;
    public $active;
    
    public function exchangeArray($data) {
        $this->id = ((!empty($data['id'])) ? ($data['id']) : (null));
        $this->title = ((!empty($data['title'])) ? ($data['title']) : (null));
        $this->text_post = ((!empty($data['text_post'])) ? ($data['text_post']) : (null));
        $this->active = ((!empty($data['active'])) ? ($data['active']) : (null));
    }
}

