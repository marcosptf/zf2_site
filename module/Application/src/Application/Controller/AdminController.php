<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController {

    protected $postTable;

    public function adminAction() {
        return new ViewModel();
    }

    public function indexAction() {
        return new ViewModel(array(
            'posts' => $this->getPostTable()->fetchAll()
        ));
        return new ViewModel();        
    }

    public function sobrenosAction() {
        return new ViewModel();
    }
    
    public function carreiraAction() {
        return new ViewModel();
    }
    
    public function clientesAction() {
        return new ViewModel();
    }    
    
    public function servicosAction() {
        return new ViewModel();
    }    
    
    public function produtosAction() {
        return new ViewModel();
    }    
    
    public function contatoAction() {
        return new ViewModel();
    }

    public function getPostTable() {
      if (!$this->postTable) {
        $sm = $this->getServiceLocator();
        $this->postTable = $sm->get('Application\Model\PostTable');
      }
      return $this->postTable;
    }
    
}
