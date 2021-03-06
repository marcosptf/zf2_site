<?php

namespace Application\Model;

class User {
    
    public $id;
    public $title;
    public $text_post;
    public $active;
    
    public function exchangeArray($data) {
        $this->id = ((!empty($data['id'])) ? ($data['id']) : (null));
        $this->email = ((!empty($data['email'])) ? ($data['email']) : (null));
        $this->password = ((!empty($data['password'])) ? ($data['password']) : (null));
        $this->active = ((!empty($data['active'])) ? ($data['active']) : (null));
        $this->status = ((!empty($data['status'])) ? ($data['status']) : (null));
        $this->role_id = ((!empty($data['role_id'])) ? ($data['role_id']) : (null));        
        $this->user_id = ((!empty($data['user_id'])) ? ($data['user_id']) : (null));        
    }
}


  