<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use Admin\Model\LoginModel;
use Admin\Model\LoginTable;

use Admin\Model\CategoryModel;
use Admin\Model\CategoryTable;

use Admin\Model\UomModel;
use Admin\Model\UomTable;

use Admin\Model\RowmaterialModel;
use Admin\Model\RowmaterialTable;

class RowmaterialController extends AbstractActionController
{
    protected $authService;
    protected $rowmaterialTable;
    protected $uomTable;


    public function getAuthService()
    {
        if(! $this->authService)
        {
            $this->authService= $this->getServiceLocator()->get('AdminAuth');
        }
        return $this->authService;
    }
    public function getLoginTable()
    {
        if(! $this->loginTable)
        {
            $sm= $this->getServiceLocator();
            $this->loginTable= $sm->get(Admin\Model\LoginTable);
        }
        return $this->loginTable;
    }
    public function getCategoryTable()
    {
        if(! $this->categoryTable)
        {
            $sm= $this->getServiceLocator();
            $this->categoryTable= $sm->get('Admin\Model\CategoryTable');
        }
        return $this->categoryTable;
    }
    public function getUomTable()
    {
        if(! $this->uomTable)
        {
            $sm= $this->getServiceLocator();
            $this->uomTable= $sm->get('Admin\Model\UomTable');
        }
        return $this->uomTable;
    }
    public function getRowmaterialTable()
    {
        if(! $this->rowmaterialTable)
        {
            $sm= $this->getServiceLocator();
            $this->rowmaterialTable= $sm->get('Admin\Model\RowmaterialTable');
        }
        return $this->rowmaterialTable;
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
                $rowmaterial= new RowmaterialModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	                                
                $rowmaterial->setCategoryId($request->getPost('category'));
                $rowmaterial->setItem($request->getPost('rowmaterial'));
                $rowmaterial->setItemCode($request->getPost('code'));
                $rowmaterial->setUom($request->getPost('uom'));
                $rowmaterial->setCreatedOn(date('Y-m-d H:i:s'));
                $rowmaterial->setUpdatedOn(date('Y-m-d H:i:s'));
                $rowmaterial->setCreatedBy($userId);
                $this->getRowmaterialTable()->inserts($rowmaterial);
                $this->flashMessenger()->addMessage("Data Added Suceesfully..");
                return $this->redirect()->toRoute("admin/rowmaterial/add");
            }
            $page = (int) $this->params()->fromRoute('page', 1);
            $iteratorAdapter = new \Zend\Paginator\Adapter\ArrayAdapter(iterator_to_array($this->getRowmaterialTable()->fetchAll()));
            $category = new \Zend\Paginator\Paginator($iteratorAdapter); 
            $viewModel= new ViewModel(array(
                'fetchAllDatas' => $category->setCurrentPageNumber($page)->setItemCountPerPage('8'),
                'categories' =>$this->getCategoryTable()->fetchAllCategoryStatusOn(),
                'uom' => $this->getUomTable()->fetchAllUomStatusOn(),
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
    
    //Stataus to Off
    public function statusOffAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            if($_POST['offId'] != '')
            {
                if($this->getRowmaterialTable()->statusOff($_POST['offId']))
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
                if($this->getRowmaterialTable()->statusOn($_POST['onId']))
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
    
    //Actions
    public function editAction()
    {
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/adminDashboardLayout');
            $request= $this->getRequest();
            
            $id= (int) $this->params()->fromRoute('id');
            
            if($request->isPost())
            {
                $rowmaterial= new RowmaterialModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	
                $rowmaterial->setId($id);
                $rowmaterial->setCategoryId($request->getPost('category'));
                $rowmaterial->setItem($request->getPost('rowmaterial'));
                $rowmaterial->setItemCode($request->getPost('code'));
                $rowmaterial->setUom($request->getPost('uom'));
                $rowmaterial->setUpdatedOn(date('Y-m-d H:i:s'));
                $rowmaterial->setCreatedBy($userId);
                $this->getRowmaterialTable()->updateDatas($rowmaterial);
                $this->flashMessenger()->addMessage("Data Added Suceefully..");
                return $this->redirect()->toRoute("admin/rowmaterial/add");
            }
            
            $viewModel= new ViewModel(array(
                'fetchAllDatas' => $this->getRowmaterialTable()->editAll($id),
                'categories' =>$this->getCategoryTable()->fetchAllCategoryStatusOn(),
                'uom' => $this->getUomTable()->fetchAllUomStatusOn(),
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
}

