<?php

namespace Admin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class PurchaseStockModel implements InputFilterAwareInterface
{
	public $id;
	public $itemId;
	public $quantity;
        public $cumilativeStock;
	public $purchaseStock;
        public $purchaseRate;
        public $sale;
        public $sustainStock;
        public $expiryDate;
        public $unitRate;
        public $status;
	public $createdBy;
	public $updatedBy;
	public $createdOn;
	public $updatedOn;

	protected $inputFilter;                      
	
	public function setId($id)
	{
	    $this->id = $id;				
	}
	public function setItemId($itemId)
	{
	    $this->itemId = $itemId;				
	}
	public function setCumilativeStock($cumilativeStock)
	{
            //echo $cumilativeStock; exit;
	    $this->cumilativeStock = $cumilativeStock;				
	}
        public function setPurchaseStock($purchaseStock)
        {
            $this->purchaseStock= $purchaseStock;
        }
        public function setSale($sale)
        {
            $this->sale= $sale;
        }
        public function setSustainStock($purchaseStock)
        {
            $this->sustainStock= $sustainStock;
        }
        public function setPurchaseRate($purchaseRate)
        {
            $this->purchaseRate= $purchaseRate;
        }
        public function setPurchaseDate($purchaseDate)
        {
            $this->purchaseDate= $purchaseDate;
        }
        public function setUnitRate($unitRate)
        {
            $this->unitRate= $unitRate;
        }
        public function setExpiryDate($expiryDate)
        {
            $this->expiryDate= $expiryDate;
        }

        public function setStatus($status)
	{
	    $this->status= $status;
	}
	public function setCreatedBy($createdBy)
	{
	    $this->createdBy= $createdBy;
	}
        public function setUpdatedBy($updatedBy)
	{
	    $this->updatedBy= $updatedBy;
	}
	public function setCreatedOn($createdOn)
	{
            $this->createdOn= $createdOn;
        }
	public function setUpdatedOn($updatedOn)
	{
	    $this->updatedOn= $updatedOn;
	}

	 // Add content to this method:
    public function setInputFilter(InputFilterInterface $inputFilter){
      //  throw new \Exception("Not used");
    }
	
    public function getInputFilter(){     
   }

}

