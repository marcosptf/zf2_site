<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    protected $userTable;
    protected $postTable;    

    public function adminAction() {
        return new ViewModel();
    }

    public function indexAction() {
        return new ViewModel(array(
            'user' => $this->getPostTable()->fetchAll(1)
        ));
        return new ViewModel();        
    }

    public function sobrenosAction() {
        return new ViewModel(array(
            'user' => $this->getPostTable()->fetchAll(5)
        ));
        return new ViewModel();    
    }
    
    public function carreiraAction() {
        return new ViewModel(array(
            'user' => $this->getPostTable()->fetchAll(6)
        ));
        return new ViewModel();    
    }
    
    public function clientesAction() {
        return new ViewModel(array(
            'user' => $this->getPostTable()->fetchAll(2)
        ));
        return new ViewModel();        
    }    
    
    public function servicosAction() {
        return new ViewModel(array(
            'user' => $this->getPostTable()->fetchAll(3)
        ));
        return new ViewModel();    
    }    
    
    public function produtosAction() {
        return new ViewModel(array(
            'user' => $this->getPostTable()->fetchAll(4)
        ));
        return new ViewModel();    
    }    
    
    public function contatoAction() {
        return new ViewModel();
    }

    public function getUserTable() {
      if (!$this->userTable) {
        $sm = $this->getServiceLocator();
        $this->userTable = $sm->get('Application\Model\UserTable');
      }
      return $this->userTable;
    }
    
    public function getPostTable() {
      if (!$this->postTable) {
        $sm = $this->getServiceLocator();
        $this->postTable = $sm->get('Application\Model\PostTable');
      }
      return $this->postTable;
    }    
    
}
