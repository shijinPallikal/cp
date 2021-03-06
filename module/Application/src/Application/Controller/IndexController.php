<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Session\Container;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Admin\Model\SliderModel;
use Admin\Model\SliderTable;

use Admin\Model\SmallPackageModel;
use Admin\Model\SmallPackageTable;

use Admin\Model\BigPackageModel;
use Admin\Model\BigPackageTable;

use Admin\Model\OfferDatesTable;
use Admin\Model\OfferDatesModel;

use Admin\Model\MenuTable;
use Admin\Model\MenuModel;

use Admin\Model\LogoTable;
use Admin\Model\LogoModel;

use Application\Model\UserContactsModel;
use Application\Model\UserContactsTable;

use Admin\Model\ColorTable;
use Admin\Model\ColorModel;

use Admin\Model\SliderColorTable;
use Admin\Model\SliderColorModel;

use Admin\Model\PagesModel;
use Admin\Model\PagesTable;


class IndexController extends AbstractActionController
{

    protected $sliderTable;
    protected $smallPackageTable;
    protected $bigPackageTable;
    protected $menuTable;
    protected $logoTable;
    protected $contactsTable;
    protected $color;
    protected $sliderColor;
    protected $languagesTable;
    protected $pagesTable;
    
    public function getSliderTable()
    {
        if(!$this->sliderTable)
        {
            $sm= $this->getServiceLocator();
            $this->sliderTable = $sm->get('Admin\Model\SliderTable'); 
        }
        return $this->sliderTable;
    }

    public function getSliderColorTable()
    {
        if(!$this->sliderColor)
        {
            $sm= $this->getServiceLocator();
            $this->sliderColor = $sm->get('Admin\Model\SliderColorTable'); 
        }
        return $this->sliderColor;
    }

    public function getSmallPackageTable()
    {
        if(!$this->smallPackageTable)
        {
            $sm= $this->getServiceLocator();
            $this->smallPackageTable = $sm->get('Admin\Model\SmallPackageTable'); 
        }
        return $this->smallPackageTable;
    }

    public function getBigPackageTable()
    {
        if(!$this->bigPackageTable)
        {
            $sm= $this->getServiceLocator();
            $this->bigPackageTable = $sm->get('Admin\Model\BigPackageTable'); 
        }
        return $this->bigPackageTable;
    }

    public function getOfferDatesTable()
    {
        if(!$this->offerDatesTable)
        {
            $sm= $this->getServiceLocator();
            $this->offerDatesTable = $sm->get('Admin\Model\OfferDatesTable'); 
        }
        return $this->offerDatesTable;
    }

    public function getMenuTable()
    {
        if(!$this->menuTable)
        {
            $sm= $this->getServiceLocator();
            $this->menuTable = $sm->get('Admin\Model\MenuTable'); 
        }
        return $this->menuTable;
    }

    public function getLogoTable()
    {
        if(!$this->logoTable)
        {
            $sm= $this->getServiceLocator();
            $this->logoTable = $sm->get('Admin\Model\LogoTable'); 
        }
        return $this->logoTable;
    }

    public function getContactsTable()
    {
        if(!$this->contactsTable)
        {
            $sm= $this->getServiceLocator();
            $this->contactsTable = $sm->get('Admin\Model\ContactsTable'); 
        }
        return $this->contactsTable;
    }
    public function getColorTable()
    {
        if(!$this->colorTable)
        {
            $sm= $this->getServiceLocator();
            $this->colorTable = $sm->get('Admin\Model\ColorTable'); 
        }
        return $this->colorTable;
    }

    public function getLanguagesTable()
    {
        if(!$this->languagesTable)
        {
            $sm= $this->getServiceLocator();
            $this->languagesTable = $sm->get('Admin\Model\LanguagesTable'); 
        }
        return $this->languagesTable;
    }
    public function getPagesTable()
    {
        if(!$this->pagesTable)
        {
            $sm= $this->getServiceLocator();
            $this->pagesTable= $sm->get('Admin\Model\PagesTable');
        }
        return $this->pagesTable;
    }




    public function indexAction()
    {
        $todayDate= date('m/d/Y');
        $lid = $this->getLanguagesTable()->listLanguagesSessionDatas();
        $languageId = $lid->current();
        
        $this->layout()->setVariables(array(
            'listAllMenuDatas' => $this->getMenuTable()->listMenuDatas($languageId['id']),
            'listLogos' => $this->getLogoTable()->listLogo(),
            'listContactusDatas' => $this->getContactsTable()->listAllContactsData(),
            'color' => $this->getColorTable()->getColor(),
        ));


    	$viewModel = new ViewModel(array(
            'listAllSliderDatas' => $this->getSliderTable()->listAllSliderDatas(),
            'listAllSliderColorDatas' => $this->getSliderColorTable()->listSliderColorData(),
            'listSmallPackages1' => $this->getSmallPackageTable()->listSmallPackages1($todayDate),
            'listSmallPackages2' => $this->getSmallPackageTable()->listSmallPackages2(),
            'listSmallPackages3' => $this->getSmallPackageTable()->listSmallPackages3($todayDate),
            'listSmallPackages4' => $this->getSmallPackageTable()->listSmallPackages4(),
            'listBigPackages'    => $this->getBigPackageTable()->listBigPackages($todayDate),
            'listBigPackages1'   => $this->getBigPackageTable()->listBigPackages1(),
            'listAllAdminSmallPackage' => $this->getSmallPackageTable()->listAllAdminSmallPackage(),
            'listAllAdminSmallPackage2' => $this->getSmallPackageTable()->listAllAdminSmallPackage2(),
            'listAllBigPackageDefaultAdmin' => $this->getBigPackageTable()->listAllBigPackageDefaultAdmin(),
            'listPagesDatas' => $this->getPagesTable()->listPagesDatas(),
            'listContactusDatas' => $this->getContactsTable()->listAllContactsData(),

        ));
        return $viewModel;

        
    }
    public function colorAction()
    {
         $color= $_POST['vals'];    
         
         $this->layout()->setVariables(array(
            'colors' => $this->getColorTable()->addColor($color),
        ));
        
    }
    public function productDetailsAction()
    {
        $id= (int) $this->params()->fromRoute(id);

        $this->layout()->setVariables(array(
            'listAllMenuDatas' => $this->getMenuTable()->listMenuDatas($languageId['id']),
            'listLogos' => $this->getLogoTable()->listLogo(),
            'listContactusDatas' => $this->getContactsTable()->listAllContactsData(),
            'color' => $this->getColorTable()->getColor(),
        ));

        $view= new ViewModel(array(
            'getSmallPackagesData' => $this->getSmallPackageTable()->getSmallPackagesData($id),
            'listContactusDatas' => $this->getContactsTable()->listAllContactsData(),
        ));
        return $view;
        
    }

    
}
