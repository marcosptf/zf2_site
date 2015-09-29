<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Http\Request;
use Application\Model\Post;

class AdminController extends AbstractActionController {

    protected $postTable;

    public function homeAction() {
        return new ViewModel(array(
            'posts' => $this->getPostTable()->fetchAll(1)
        ));
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
    
    public function requestpostAction() {
        $request = new Request();
        $post = new Post();
        $postData = array();        
        
        $request->setMethod(Request::METHOD_POST);
        $request = $this->getRequest();
        if ($request->isPost()) {
            $postData['text_post'] = $request->getPost("postData");
            $postData['title'] = $request->getPost("postTitle");
            $postData['active'] = $request->getPost("postActive");
            $postData['id'] = $request->getPost("postID");
            $postData['category'] = $request->getPost("postCategory");
            $post->exchangeArray($postData);
            $this->getPostTable()->savePost($post);
            print("true");    
        }
       //return new ViewModel();        
       $viewModel = $this->nolayoutAction();
       return $viewModel;        
    }

    public function nolayoutAction() {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }    
    
    public function getPostTable() {
      if (!$this->postTable) {
        $sm = $this->getServiceLocator();
        $this->postTable = $sm->get('Application\Model\PostTable');
      }
      return $this->postTable;
    }
    
}
