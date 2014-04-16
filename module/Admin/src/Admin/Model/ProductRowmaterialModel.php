<?php

namespace Admin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class ProductRowmaterialModel implements InputFilterAwareInterface
{
	public $id;
	public $product;
	public $romaterial;
        public $uom;
        public $quantity;
        public $rate;
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
	public function setProduct($product)
	{
	    $this->product = $product;				
	}
	public function setRowmaterial($rowmaterial)
	{
	    $this->rowmaterial = $rowmaterial;				
	}
        public function setUom($uom)
	{
	    $this->uom = $uom;				
	}
        public function setQuantity($quantity)
	{
	    $this->quantity = $quantity;				
	}
        public function setRate($rate)
	{
	    $this->rate = $rate;				
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

