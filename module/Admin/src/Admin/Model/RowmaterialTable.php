<?php
namespace Admin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class RowmaterialTable extends AbstractTableGateway
{
    protected $table = 'tbl_row_material';
   	
  	public function __construct(Adapter $adapter)
  	{
        $this->adapter = $adapter;
    }


    public function exchangeToArray($obj)
    {
        $return = array();
        
        if(isset($obj->category_id))
            $return['category_id'] = $obj->category_id;
        
        if(isset($obj->item_code))
            $return['item_code'] = $obj->item_code;
        
        if(isset($obj->item))
            $return['item'] = $obj->item;
        
        if(isset($obj->uom))
            $return['uom'] = $obj->uom;

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
	 
    public function inserts(RowmaterialModel $obj)
    {  
        //print_r($obj);exit;
        $sql = new Sql($this->adapter);          
        $insert = $sql->insert($this->table);        
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        //$lastId=$this->adapter->getDriver()->getConnection()->getLastGeneratedValue();
        //return $lastId;
    }
    /*public function fetchAll()
    {
        $statement = $this->adapter->query("call fetchAllRowmaterial()");
        $result = $statement->execute();
        return $result;
    }*/
    
    public function fetchAll()
    {
         $sql= "select tbl_row_material.id,tbl_row_material.*,tbl_uom.uom,tbl_category.category from tbl_row_material inner join tbl_category on "
               . "tbl_row_material.category_id=tbl_category.id inner join tbl_uom on "
               . "tbl_row_material.uom=tbl_uom.id order by tbl_row_material.id desc";
        //echo $sql; exit;
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }
    
    public function editData($id)
    {
        $statement = $this->adapter->query("call editUom('".$id."')");
        $result = $statement->execute();
        return $result; 
    }
    public function updateDatas(RowmaterialModel $obj)
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
        $statement = $this->adapter->query("call rowmaterialStatusOff('".$id."')");
        $result = $statement->execute();
        return $result;
    }
    public function statusOn($id)
    {
        $statement = $this->adapter->query("call rowmaterialStatusOn('".$id."')");
        $result = $statement->execute();
        return $result;
    }
    public function editAll($id)
    {
        $sql= "select * from tbl_row_material where id= $id";
        //$statement= $this->adapter->query("call editRowmaterialData('".$id."')");
        $statement= $this->adapter->query($sql);
        $result= $statement->execute();
        return $result;
    }
    
    public function getAllRowmaterial()
    {
        $sql= "select * from tbl_row_material where status= 1";
        $statement= $this->adapter->query($sql);
        $result= $statement->execute();
        return $result;
    }
    public function getUom($mid)
    {
        $sql="selecmidt tbl_uom.uom,tbl_row_material.uom as uid from tbl_row_material inner"
                . " join tbl_uom on tbl_row_material.uom= tbl_uom.id where tbl_row_material.id='$mid'";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        $result= $result->current();
        return $result; 
    }
    public function findMaterial($material)
    {
        $sql="select count(item) as it from tbl_row_material where item= '$material'";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        $result= $result->current();
        return $result;
    }
}
