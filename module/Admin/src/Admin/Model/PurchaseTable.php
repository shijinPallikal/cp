<?php
namespace Admin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class PurchaseTable extends AbstractTableGateway
{
    protected $table = 'tbl_purchase';
   	
  	public function __construct(Adapter $adapter)
  	{
        $this->adapter = $adapter;
    }


    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->item))
            $return['item'] = $obj->item;

        if(isset($obj->quantity))
            $return['quantity'] = $obj->quantity;
        
        if(isset($obj->purchaseRate))
            $return['purchase_rate'] = $obj->purchaseRate;
        
        if(isset($obj->purchaseDate))
            $return['purchase_date'] = $obj->purchaseDate;
        
        if(isset($obj->expiryDate))
            $return['exp_date'] = $obj->expiryDate;
        
        if(isset($obj->meashure))
            $return['meashure'] = $obj->meashure;
        
        if(isset($obj->unitRate))
            $return['unit_rate'] = $obj->unitRate;

        if(isset($obj->status))
            $return['status'] = $obj->status;
        
        if(isset($obj->createdBy))
            $return['created_by'] = $obj->createdBy;
        
         if(isset($obj->updatedBy))
            $return['updated_by'] = $obj->updatedBy;


        if(isset($obj->createdOn))
            $return['created_on'] = $obj->createdOn;

        if(isset($obj->updatedOn))
            $return['updated_on'] = $obj->updatedOn;

        return $return;
    }
	 
    public function inserts(PurchaseModel $obj)
    { 
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);        
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        $lastId=$this->adapter->getDriver()->getConnection()->getLastGeneratedValue();
        return $lastId;
    }
    public function fetchAll()
    {
        $sql="select tbl_purchase.*,tbl_row_material.item,tbl_uom.uom from tbl_purchase inner"
                . " join tbl_row_material on tbl_purchase.item=tbl_row_material.id "
                . "inner join tbl_uom on tbl_purchase.meashure= tbl_uom.id order by tbl_purchase.id desc";
        /*$sql="select tbl_purchase.*,tbl_row_material.item from tbl_purchase inner"
                . " join tbl_row_material on tbl_purchase.item=tbl_row_material.id "
                . "order by tbl_purchase.id desc";*/
        //echo $sql;exit;
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result; 
    }

    public function editData($id)
    {
        //$sql="select tbl_purchase.*,tbl_row_material.item from tbl_purchase inner join tbl_row_material on tbl_purchase.item=tbl_row_material.id where tbl_purchase.id= $id";
        //$statement = $this->adapter->query("call editPurchase('".$id."')");
        $sql="select tbl_purchase.*,tbl_row_material.item,tbl_uom.uom from tbl_purchase inner"
                . " join tbl_row_material on tbl_purchase.item=tbl_row_material.id "
                . " inner join tbl_uom on tbl_purchase.meashure= tbl_uom.id where tbl_purchase.id=$id";
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result; 
    }
    public function updateData(PurchaseModel $obj)
    {
        $sql = new Sql($this->adapter);         
        $update = $sql->update($this->table);   
        $update->set ($this->exchangeToArray($obj));
        $update->where(array('id' => $obj->id));
        $statement = $sql->prepareStatementForSqlObject($update);
        $statement->execute();
    }
    public function statusOff($id)
    {
        $statement = $this->adapter->query("call categoryStatusOff('".$id."')");
        $result = $statement->execute();
        return $result;
    }
    public function statusOn($id)
    {
        $statement = $this->adapter->query("call categoryStatusOn('".$id."')");
        $result = $statement->execute();
        return $result;
    }
    public function fetchAllCategoryStatusOn()
    {
        $sql= "select * from tbl_category where status=1 order by id desc";
        //$statement= $this->adapter->query("call fetchAllCategoryStatusOn()");
        $statement= $this->adapter->query($sql);
        $result= $statement->execute();
        return $result;
    }
    public function getUom($mid)
    {
        $sql="select tbl_uom.uom from tbl_row_material inner"
                . " join tbl_uom on tbl_row_material.uom= tbl_uom.id where tbl_row_material.id='$mid'";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        $result= $result->current();
        return $result; 
    }
}