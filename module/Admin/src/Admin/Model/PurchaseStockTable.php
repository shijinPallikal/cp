<?php
namespace Admin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class PurchaseStockTable extends AbstractTableGateway
{
    protected $table = 'tbl_purchase_stock';
   	
  	public function __construct(Adapter $adapter)
  	{
        $this->adapter = $adapter;
    }


    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->itemId))
            $return['item_id'] = $obj->itemId;

        if(isset($obj->cumilativeStock))
            $return['cumilative_stock'] = $obj->cumilativeStock;
        
        if(isset($obj->purchaseStock))
            $return['purchase_stock'] = $obj->purchaseStock;
        
        if(isset($obj->purchaseRate))
            $return['purchase_rate'] = $obj->purchaseRate;
        if(isset($obj->sale))
            $return['sale'] = $obj->sale;
        if(isset($obj->sustainSale))
            $return['sustain_stock'] = $obj->sustainSale;
        
        if(isset($obj->purchaseDate))
            $return['purchase_date'] = $obj->purchaseDate;
        
        if(isset($obj->expiryDate))
            $return['expiry_date'] = $obj->expiryDate;
        
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
    
    public function getCumilativeStock($id)
    {
        $sql="select cumilative_stock from tbl_purchase_stock where item_id =$id order by id desc limit 1";
        //echo $sql;exit;
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        $row= $result->current();
        if(!empty($row['cumilative_stock'])) return $row['cumilative_stock']; else return 0;
    }


    public function insertStock(PurchaseStockModel $obj)
    { 
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);        
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        return $result;
    }
    public function getItemPrize($mid,$quantity)
    {
        $sql= "select sum(purchase_rate) as prate,sum(purchase_stock) as pstock,tbl_purchase_stock.* from tbl_purchase_stock where item_id= '$mid'";
        $statement= $this->adapter->query($sql);
        $result= $statement->execute();
        $result= $result->current();
        return $result;
    }
}