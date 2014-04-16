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

use Admin\Model\PurchaseModel;
use Admin\Model\PurchaseTable;

use Admin\Model\PurchaseStockModel;
use Admin\Model\PurchaseStockTable;


class PurchaseController extends AbstractActionController
{

    protected $authservice;
    protected $loginTable;
    protected $rowmaterialTable;
    protected $purchaseTable;
    protected $uomTable;
    protected $purchaseStockTable;

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



    //Actions
    public function addAction()
    {
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/adminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost())
            {
                $purchase= new PurchaseModel();
                $purchaseStock= new PurchaseStockModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	$unitRate= $request->getPost('prate') /  $request->getPost('quantity');                             
                $purchase->setItem($request->getPost('item'));
                $purchase->setQuantity($request->getPost('quantity'));
                $purchase->setPurchaseRate($request->getPost('prate'));
                $purchase->setPurchaseDate($request->getPost('pdate'));
                $purchase->setExpiryDate($request->getPost('expdate'));
                $purchase->setMeashure($request->getPost('uom'));
                $purchase->setUnitRate($unitRate);
                $purchase->setStatus('1');
                $purchase->setCreatedOn(date('Y-m-d H:i:s'));
                $purchase->setUpdatedOn(date('Y-m-d H:i:s'));
                $purchase->setCreatedBy($userId);
                $this->getPurchaseTable()->inserts($purchase);
                
                
                //To Purchase Stock Table
                //Getting cumilative stock
                $cumilativeStock= $this->getPurchaseStockTable()->getCumilativeStock($request->getPost('item'));
                
                $netCumilativeStock= $cumilativeStock+$request->getPost('quantity');
                
                $purchaseStock->setItem($request->getPost('item'));
                $purchaseStock->setPurchaseStock($request->getPost('quantity'));
                $purchaseStock->setCumilativeStock($netCumilativeStock);
                $purchaseStock->setPurchaseRate($request->getPost('prate'));
                $purchaseStock->setPurchaseDate($request->getPost('pdate'));
                $purchaseStock->setExpiryDate($request->getPost('expdate'));
                $purchaseStock->setUnitRate($unitRate);
                $purchaseStock->setStatus('1');
                $this->getPurchaseStockTable()->insertStock($purchaseStock);
                
            }
            $page = (int) $this->params()->fromRoute('page', 1);
            $iteratorAdapter = new \Zend\Paginator\Adapter\ArrayAdapter(iterator_to_array($this->getPurchaseTable()->fetchAll()));
            $category = new \Zend\Paginator\Paginator($iteratorAdapter); 
            $viewModel= new ViewModel(array(
                'fetchAllDatas' => $category->setCurrentPageNumber($page)->setItemCountPerPage('8'),
                'flashMessages' => $this->flashMessenger()->getMessages(),
                'rowmaterial' => $this->getRowmaterialTable()->getAllRowmaterial(),
                'uom' => $this->getUomTable()->fetchAllUomStatusOn(),
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
            $id= (int)$this->params()->fromRoute('id');
            $request= $this->getRequest();
            if($request->isPost())
            {
                $purchase= new PurchaseModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	
                $purchase->setId($id);
                $purchase->setItem($request->getPost('item'));
                $purchase->setQuantity($request->getPost('quantity'));
                $purchase->setPurchaseRate($request->getPost('prate'));
                $purchase->setPurchaseDate($request->getPost('pdate'));
                $purchase->setExpiryDate($request->getPost('expdate'));
                $purchase->setMeashure($request->getPost('uom'));
                $purchase->setUpdatedOn(date('Y-m-d H:i:s'));
                $purchase->setCreatedBy($userId);
                $this->getPurchaseTable()->updateData($purchase);
                
            }
            
            $viewModel= new ViewModel(array(
                'editDatas' => $this->getPurchaseTable()->editData($id),
                'flashMessages' => $this->flashMessenger()->getMessages(),
                'rowmaterial' => $this->getRowmaterialTable()->getAllRowmaterial(),
                'uom' => $this->getUomTable()->fetchAllUomStatusOn(),
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
    
}
