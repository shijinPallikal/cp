<?php

namespace Admin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class PurchaseModel implements InputFilterAwareInterface
{
	public $id;
	public $item;
	public $purchaseRate;
        public $purchaseDate;
        public $expiryDate;
        public $meashure;
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
	public function setItem($item)
	{
	    $this->item = $item;				
	}
	public function setQuantity($quantity)
	{
	    $this->quantity = $quantity;				
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
        public function setMeashure($meashure)
        {
            $this->meashure= $meashure;
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

