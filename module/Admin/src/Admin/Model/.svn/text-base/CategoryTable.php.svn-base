<?php
namespace Admin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class CategoryTable extends AbstractTableGateway
{
    protected $table = 'tbl_category';
   	
  	public function __construct(Adapter $adapter)
  	{
        $this->adapter = $adapter;
    }


    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->code))
            $return['code'] = $obj->code;

        if(isset($obj->category))
            $return['category'] = $obj->category;

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
	 
    public function inserts(CategoryModel $obj)
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
        $sql="select * from tbl_category order by id DESC";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result; 
    }

    public function editData($id)
    {
        $statement = $this->adapter->query("call editCategory('".$id."')");
        $result = $statement->execute();
        return $result; 
    }
    public function updateData(CategoryModel $obj)
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
}