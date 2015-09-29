<?php

namespace Application\Model;

 use Zend\Db\TableGateway\TableGateway;

 class PostTable
 {
     protected $tableGateway;
     protected $id;
     protected $title;
     protected $text_post;
     protected $active;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll($cat)
     {
         //$resultSet = $this->tableGateway->select();
         $resultSet = $this->tableGateway->select(array('category' => $cat));
         return $resultSet;
     }

     public function getPost($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function savePost(Post $user)
     {
         $data = array(
             'id' => $user->id,
             'title'  => $user->title,
             'text_post' => $user->text_post,
             'active' => $user->active,
             'category' => $user->category
         );

         $id = (int) $user->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getPost($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('User id does not exist');
             }
         }
     }

     public function deleteUser($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }
 
 
 
 