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

use Admin\Model\UserEmailModel;
use Admin\Model\UserEmailTable;

use Admin\Model\UserContactsModel   ;
use Admin\Model\UserContactsTable;

use Admin\Model\MenuTable;
use Admin\Model\MenuModel;

use Admin\Model\LogoTable;
use Admin\Model\LogoModel;

use Admin\Model\ColorTable;
use Admin\Model\ColorModel;

use Admin\Model\PagesModel;
use Admin\Model\PagesTable;

use Admin\Model\LanguagesModel;
use Admin\Model\LanguagesTable;


class ContactsController extends AbstractActionController
{

    protected $contactsTable;
    protected $userEmailTable;
    protected $userContactsTable;
    protected $menuTable;
    protected $logoTable;
    protected $color;
    protected $pagesTable;
    protected $LanguagesTable;

      
    public function getContactsTable()
    {
        if(!$this->contactsTable)
        {
            $sm= $this->getServiceLocator();
            $this->contactsTable = $sm->get('Admin\Model\ContactsTable'); 
        }
        return $this->contactsTable;
    }

    public function getUserEmailTable()
    {
        if(!$this->userEmailTable)
        {
            $sm= $this->getServiceLocator();
            $this->userEmailTable = $sm->get('Admin\Model\UserEmailTable'); 
        }
        return $this->userEmailTable;
    }

    public function getUserContactsTable()
    {
        if(!$this->userContactsTable)
        {
            $sm= $this->getServiceLocator();
            $this->userContactsTable= $sm->get('Admin\Model\UserContactsTable');
        }
        return $this->userContactsTable;
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
    public function getColorTable()
    {
        if(!$this->colorTable)
        {
            $sm= $this->getServiceLocator();
            $this->colorTable = $sm->get('Admin\Model\ColorTable'); 
        }
        return $this->colorTable;
    }

    public function getPagesTable()
    {
        if(!$this->pagesTable)
        {
            $sm= $this->getServiceLocator();
            $this->pagesTable= $sm->get('admin\Model\PagesTable');
        }
        return $this->pagesTable;
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



    public function indexAction()
    {
        $this->layout('layout/layout');
        $lid = $this->getLanguagesTable()->listLanguagesSessionDatas();
        $languageId = $lid->current();
        $this->layout()->setVariables(array(
            'listAllMenuDatas' => $this->getMenuTable()->listMenuDatas($languageId['id']),
            'listLogos' => $this->getLogoTable()->listLogo(),
            'listContactusDatas' => $this->getContactsTable()->listAllContactsData(),
            'color' => $this->getColorTable()->getColor(),
        ));

    	$viewModel = new ViewModel(array(
            'listContactusDatas' => $this->getContactsTable()->listAllContactsData(),
            'listMenuDatasImageContacts' => $this->getMenuTable()->listMenuDatasImageContacts($languageId['id']),
            'listPagesDatas' => $this->getPagesTable()->listPagesDatas(),
        ));
        return $viewModel;

    }
    public function emailAction()
    {
       
        $request= $this->getRequest();
        if($request->isPost())
        {
    	
        	$company= $_POST['company'];
            $contactPerson= $_POST['cp'];
            $phone= $_POST['phone'];
            $email= $_POST['email'];
            if($_POST['ch1'] != '')
            {
                $ch1= $_POST['ch1'].",";
            }
            if($_POST['ch2'] != '')
            {
                $ch2= $_POST['ch2'].",";
            }
            if($_POST['ch3'] != '')
            {
                $ch3= $_POST['ch3'].",";
            }
            if($_POST['ch4'] != '')
            {
                $ch4= $_POST['ch4'].",";
            }
            if($_POST['sel'] != '')
            {
                $sel= $_POST['sel'];
            }
            
            $useremail= $this->getUserEmailTable()->ListAllUserEmail();
            foreach ($useremail as $key => $value)
            {
               $t1= $value['email'];
            }
            //echo $t1; exit;
            $to = $t1 . ','. 'cooolwebsitefeedback@gmail.com';

            $subject = "InterestedIn";

            $message = "
                <p>Email From Codexmind</p>
                <table>
                    <tr>
                        <th>Company</th>
                        <th>Contact Person</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Interested In</th>
                    </tr>
                    <tr>
                        <td>".$company."</td>
                        <td>".$contactPerson."</td>
                        <td>".$phone."</td>
                        <td>".$email."</td>
                        <td>".$ch1.$ch2.$ch3.$ch4.$sel."</td>
                    </tr>
                </table>";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

		$datas= $ch1._.$ch2._.$ch3._.$ch4._.$sel;

                // More headers
                $headers .= 'From: '.$email.'' . "\r\n";
		$headers .= 'CC: cooolwebsitefeedback@gamil.com' . "\r\n";

                if(@mail($to,$subject,$message,$headers))
                {
                    
                    $userContacts= new UserContactsModel();
                    $userContacts->setCompanyName($company);
                    $userContacts->setContactPerson($contactPerson);
                    $userContacts->setPhone($phone);
                    $userContacts->setEmail($email);
		    $userContacts->setCreatedOn(date('Y-m-d'));
                    $userContacts->setInterest($datas);
                    $this->getUserContactsTable()->saveUserContactsData($userContacts);
                    echo "Mail Sent Successfully";
                    exit;
                    

                }
                else
                {
                    
                    echo "You can't Send mail....."; exit;
                }


            $viewModel = new ViewModel(array());

                    $viewModel->setTerminal(true);
                    return $viewModel;
        }
    }
    public function aboutUsAction()
    {
        $this->layout()->setVariables(array(
           // 'listAllMenuDatas' => $this->getMenuTable()->listMenuDatas(),
            'listLogos' => $this->getLogoTable()->listLogo(),
            'listContactusDatas' => $this->getContactsTable()->listAllContactsData(),
            'color' => $this->getColorTable()->getColor(),
        ));

        $viewModel = new ViewModel(array(
            'listContactusDatas' => $this->getContactsTable()->listAllContactsData(),
            'listMenuDatasImageContacts' => $this->getMenuTable()->listMenuDatasImageContacts($languageId['id']),
            'listPagesDatas' => $this->getPagesTable()->listPagesDatas(),
        ));
        return $viewModel;

    }
}
