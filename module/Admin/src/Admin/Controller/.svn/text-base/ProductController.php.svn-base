<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

 
use Admin\Model\LoginModel;
use Admin\Model\LoginTable;

use Admin\Model\ProductModel;
use Admin\Model\ProductTable;


class ProductController extends AbstractActionController
{

    protected $authservice;
    protected $loginTable;
    protected $productTable;

    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('AdminAuth');
        }        
        return $this->authservice;
    }

    public function getLoginTable()
    {
        if(!$this->loginTable)
        {
            $sm= $this->getServiceLocator();
            $this->loginTable = $sm->get('Admin\Model\LoginTable'); 
        }
        return $this->loginTable;
    }

    public function getProductTable()
    {
        if(!$this->productTable)
        {
            $sm= $this->getServiceLocator();
            $this->productTable = $sm->get('Admin\Model\ProductTable'); 
        }
        return $this->productTable;
    }


    //Actions
    public function addAction()
    {
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/adminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost())
            {
                $product= new ProductModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	                                
                $product->setCode($request->getPost('code'));
                $product->setProduct($request->getPost('product'));
                $product->setCreatedOn(date('Y-m-d H:i:s'));
                $product->setUpdatedOn(date('Y-m-d H:i:s'));
                $product->setCreatedBy($userId);
                $this->getProductTable()->inserts($product);
            }
            $page = (int) $this->params()->fromRoute('page', 1);
            $iteratorAdapter = new \Zend\Paginator\Adapter\ArrayAdapter(iterator_to_array($this->getProductTable()->fetchAll()));
            $category = new \Zend\Paginator\Paginator($iteratorAdapter); 
            $viewModel= new ViewModel(array(
                'fetchAllDatas' => $category->setCurrentPageNumber($page)->setItemCountPerPage('8'),
                 'flashMessages' => $this->flashMessenger()->getMessages(),
            ));
            return $viewModel;
            
            
            
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("admin");
        }
        
    }
    public function editAction()
    {
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/adminDashboardLayout');
            $request= $this->getRequest();
            $id= (int)$this->params()->fromRoute('id');
            
            if($request->isPost())
            {
                
                //Current User Id from Session
                $product= new ProductModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	
                $product->setId($id);
                $product->setCode($request->getPost('code'));
                $product->setProduct($request->getPost('product'));
                $product->setCreatedOn(date('Y-m-d H:i:s'));
                $product->setUpdatedOn(date('Y-m-d H:i:s'));
                $product->setCreatedBy($userId);
                $this->getProductTable()->updateData($product);
                $this->flashMessenger()->addMessage("Data edited Successfully..");
                return $this->redirect()->toRoute("admin/product/add");
            }
            
            return new ViewModel(array(
                    'editData'=>$this->getProductTable()->editData($id),
                'flashMessages' => $this->flashMessenger()->getMessages(),
            ));
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("admin");
        }
    }
    
    
    //Stataus to Off
    public function statusOffAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            if($_POST['offId'] != '')
            {
                if($this->getProductTable()->statusOff($_POST['offId']))
                {     
                    echo "Status Edited SuccessFully....";exit;
                }
                else
                {
                    echo "You can't Change Status....";exit;
                }
            }
            
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }
        
    }
    
    //Status On
    public function statusOnAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
           
            if($_POST['onId'] != '')
            {
                if($this->getProductTable()->statusOn($_POST['onId']))
                {     
                    echo "Status Edited SuccessFully....";exit;
                }
                else
                {
                    echo "You can't Change Status....";exit;
                }
            }
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }
        
    }
    
}
