<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;


use Admin\Model\EmployeeModel;
use Admin\Model\EmployeeTable;


class EmployeeController extends AbstractActionController
{

    protected $authservice;
    protected $loginTable;
    protected $employeeTable;

    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('AdminAuth');
        }        
        return $this->authservice;
    }
    public function getEmployeeTable()
    {
        if(!$this->employeeTable)
        {
            $sm= $this->getServiceLocator();
            $this->employeeTable = $sm->get('Admin\Model\EmployeeTable'); 
        }
        return $this->employeeTable;
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
                $employee= new EmployeeModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	                                
                $employee->setName($request->getPost('name'));
                $employee->setDesignation($request->getPost('designation'));
                $employee->setSalary($request->getPost('salary'));
                $employee->setStatus('1');
                $employee->setCreatedOn(date('Y-m-d H:i:s'));
                $employee->setUpdatedOn(date('Y-m-d H:i:s'));
                $employee->setCreatedBy($userId);
                $this->getEmployeeTable()->inserts($employee);
                
                return $this->flashMessenger()->addMessage("Data Added Suceesfully");
                return $this->redirect()->toRoute('admin/employee/add');
            }
            $page = (int) $this->params()->fromRoute('page', 1);
            $iteratorAdapter = new \Zend\Paginator\Adapter\ArrayAdapter(iterator_to_array($this->getEmployeeTable()->fetchAll()));
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
                $employee= new EmployeeModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	
                $employee->setId($id);
                $employee->setName($request->getPost('name'));
                $employee->setDesignation($request->getPost('designation'));
                $employee->setSalary($request->getPost('salary'));
                $employee->setUpdatedOn(date('Y-m-d H:i:s'));
                $employee->setCreatedBy($userId);
                $this->getEmployeeTable()->updateData($employee);
                $this->flashMessenger()->addMessage("Data edited Successfully..");
                return $this->redirect()->toRoute("admin/employee/add");
            }
            
            return new ViewModel(array(
                'editData'=>$this->getEmployeeTable()->editData($id),
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
                if($this->getEmployeeTable()->statusOff($_POST['offId']))
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
                if($this->getEmployeeTable()->statusOn($_POST['onId']))
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
