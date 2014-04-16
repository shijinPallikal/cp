<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use Admin\Model\EmployeeModel;
use Admin\Model\EmployeeTable;

use Admin\Model\LeaveModel;
use Admin\Model\LeaveTable;

class LeaveController extends AbstractActionController
{

    protected $authservice;
    protected $employeeTable;
    protected $LeaveTable;

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
    public function getLeaveTable()
    {
        if(! $this->leaveTable)
        {
            $sm= $this->getServiceLocator();
            $this->leaveTable= $sm->get('Admin\Model\LeaveTable');
        }
        return $this->leaveTable;
    }

    //Actions
    public function addAction()
    {
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/adminDashboardLayout');
            $request= $this->getRequest();
            /*if($request->isPost())
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
            }*/
            $page = (int) $this->params()->fromRoute('page', 1);
            $iteratorAdapter = new \Zend\Paginator\Adapter\ArrayAdapter(iterator_to_array($this->getLeaveTable()->fetchAll()));
            $leave = new \Zend\Paginator\Paginator($iteratorAdapter); 
            $viewModel= new ViewModel(array(
                'employees' => $this->getEmployeeTable()->fetchAllEmployee(),
                'fetchAllDatas' => $leave->setCurrentPageNumber($page)->setItemCountPerPage('8'),
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
    /*public function editAction()
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
    }*/
}
