<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

 
use Admin\Model\LoginModel;
use Admin\Model\LoginTable;

use Admin\Model\UomModel;
use Admin\Model\UomTable;

use Admin\Model\RowmaterialModel;
use Admin\Model\RowmaterialTable;

use Admin\Model\ProductRowmaterialModel;
use Admin\Model\ProductRowmaterialTable;

use Admin\Model\ProductModel;
use Admin\Model\ProductTable;

class IngredientController extends AbstractActionController
{

    protected $authservice;
    protected $loginTable;
    protected $rowmaterialTable;
    protected $purchaseTable;
    protected $uomTable;
    protected $purchaseStockTable;
    protected $productRowmaterialTable;
    protected $product;

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

    public function getRowmaterialTable()
    {
        if(!$this->rowmaterialTable)
        {
            $sm= $this->getServiceLocator();
            $this->rowmaterialTable = $sm->get('Admin\Model\RowmaterialTable'); 
        }
        return $this->rowmaterialTable;
    }
    
    public function getUomTable()
    {
        if(!$this->uomTable)
        {
            $sm= $this->getServiceLocator();
            $this->uomTable = $sm->get('Admin\Model\UomTable'); 
        }
        return $this->uomTable;
    }
    
    public function getPurchaseTable()
    {
        if(!$this->purchaseTable)
        {
            $sm= $this->getServiceLocator();
            $this->purchaseTable = $sm->get('Admin\Model\PurchaseTable'); 
        }
        return $this->purchaseTable;
    }
    public function getPurchaseStockTable()
    {
        if(!$this->purchaseStockTable)
        {
            $sm= $this->getServiceLocator();
            $this->purchaseStockTable = $sm->get('Admin\Model\purchaseStockTable'); 
        }
        return $this->purchaseStockTable;
    }
    public function getProductTable()
    {
        if(!$this->product)
        {
            $sm= $this->getServiceLocator();
            $this->product = $sm->get('Admin\Model\ProductTable'); 
        }
        return $this->product;
    }
    
    public function getProductRowmaterialTable()
    {
        if(!$this->productRowmaterialTable)
        {
            $sm= $this->getServiceLocator();
            $this->productRowmaterialTable = $sm->get('Admin\Model\ProductRowmaterialTable'); 
        }
        return $this->productRowmaterialTable;
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
                $category= new CategoryModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	                                
                $category->setCode($request->getPost('category_alias'));
                $category->setCategory($request->getPost('category'));
                $category->setCreatedOn(date('Y-m-d H:i:s'));
                $category->setUpdatedOn(date('Y-m-d H:i:s'));
                $category->setCreatedBy($userId);
                $this->getCategoryTable()->inserts($category);
            }
            $page = (int) $this->params()->fromRoute('page', 1);
            $iteratorAdapter = new \Zend\Paginator\Adapter\ArrayAdapter(iterator_to_array($this->getProductRowmaterialTable()->fetchAll()));
            $category = new \Zend\Paginator\Paginator($iteratorAdapter); 
            $viewModel= new ViewModel(array(
                'fetchAllDatas' => $category->setCurrentPageNumber($page)->setItemCountPerPage('8'),
                'products' => $this->getProductTable()->fetchAllProduct(),
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
                $category= new CategoryModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	
                $category->setId($id);
                $category->setCode($request->getPost('code'));
                $category->setCategory($request->getPost('category'));
                $category->setUpdatedOn(date('Y-m-d H:i:s'));
                $category->setCreatedBy($userId);
                $this->getCategoryTable()->updateData($category);
                $this->flashMessenger()->addMessage("Data edited Successfully..");
                return $this->redirect()->toRoute("admin/category/add");
            }
            
            return new ViewModel(array(
                'editData'=>$this->getCategoryTable()->editData($id),
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
                if($this->getCategoryTable()->statusOff($_POST['offId']))
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
                if($this->getCategoryTable()->statusOn($_POST['onId']))
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
    public function ajaxTableAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            //exit("iam here");
            $viewModel = new ViewModel(array(
                'rowmaterial' => $this->getRowmaterialTable()->getAllRowmaterial(),
                'uom' => $this->getUomTable()->fetchAllUomStatusOn(),
            ));
            $viewModel->setTerminal(true);
            return $viewModel;
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }
        
    }
    public function uomAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $mid= $_POST['mid'];
          
                $unitOfMeasure= $this->getPurchaseTable()->getUom($mid);
                echo $unitOfMeasure['uom']; exit;
          
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }
    }
    public function getPrizeAction() 
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $quantity= $_POST['quan'];
            $materialId= $_POST['matId'];
           // 'prize' => $this->getProductRowmaterialTable()->getItemPrize($quantity,$materialId),
           
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }
    }
}
