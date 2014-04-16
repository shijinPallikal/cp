<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

 
use Admin\Model\LoginModel;
use Admin\Model\LoginTable;

use Admin\Model\UomModel;
use Admin\Model\UomTable;


class UomController extends AbstractActionController
{

    protected $authservice;
    protected $loginTable;
    protected $uomTable;

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

    public function getUomTable()
    {
        if(!$this->uomTable)
        {
            $sm= $this->getServiceLocator();
            $this->uomTable = $sm->get('Admin\Model\UomTable'); 
        }
        return $this->uomTable;
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
                $uom= new UomModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	                                
                $uom->setCode($request->getPost('code'));
                $uom->setUom($request->getPost('uom'));
                $uom->setCreatedOn(date('Y-m-d H:i:s'));
                $uom->setUpdatedOn(date('Y-m-d H:i:s'));
                $uom->setCreatedBy($userId);
                $this->getUomTable()->inserts($uom);
                $this->flashMessenger()->addMessage("Data added Successfully..");
                return $this->redirect()->toRoute("admin/uom/add");
            }
            $page = (int) $this->params()->fromRoute('page', 1);
            $iteratorAdapter = new \Zend\Paginator\Adapter\ArrayAdapter(iterator_to_array($this->getUomTable()->fetchAll()));
            $uom = new \Zend\Paginator\Paginator($iteratorAdapter); 
            $viewModel= new ViewModel(array(
                'fetchAllDatas' => $uom->setCurrentPageNumber($page)->setItemCountPerPage('8'),
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
                //exit("haii");
                $uom= new UomModel();                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
                $uom->setId($id);
                $uom->setCode($request->getPost('code'));
                $uom->setUom($request->getPost('uom'));
                $uom->setUpdatedOn(date('Y-m-d H:i:s'));
                $uom->setCreatedBy($userId);
                $this->getUomTable()->updateDatas($uom);
                $this->flashMessenger()->addMessage("Data Edited Successfully..");
                return $this->redirect()->toRoute("admin/uom/add");
            }
            $viewModel= new ViewModel(array(
                'editData'=>$this->getUomTable()->editData($id),
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
                if($this->getUomTable()->statusOff($_POST['offId']))
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
                if($this->getUomTable()->statusOn($_POST['onId']))
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
