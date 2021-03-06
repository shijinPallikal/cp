<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Authentication\Storage;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;


use Admin\Model\LoginModel;
use Admin\Model\LoginTable;

use Admin\Model\CategoryModel;
use Admin\Model\CategoryTable;

use Admin\Model\UomModel;
use Admin\Model\UomTable;

use Admin\Model\ProductModel;
use Admin\Model\ProductTable;

use Admin\Model\RowmaterialModel;
use Admin\Model\RowmaterialTable;

use Admin\Model\PurchaseTable;
use Admin\Model\PurchaseModel;

use Admin\Model\PurchaseStockModel;
use Admin\Model\PurchaseStockTable;

use Admin\Model\ProductRowmaterialModel;
use Admin\Model\ProductRowmaterialTable;

use Admin\Model\EmployeeModel;
use Admin\Model\EmployeeTable;

use Admin\Model\LeaveModel;
use Admin\Model\LeaveTable;


class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    //Service History Table
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Admin\Model\LoginTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new LoginTable($dbAdapter);
                    return $table;
                },
 
                'AdminAuth' => function($sm)
                {
                    $dbAdapter           = $sm->get('Zend\Db\Adapter\Adapter');     
                    $dbTableAuthAdapter  = new DbTableAuthAdapter($dbAdapter, 'login','username','password', 'MD5(?)');
                    $authService = new AuthenticationService();     
                    $authService->setAdapter($dbTableAuthAdapter);      
                    return $authService;
		},
                'Admin\Model\CategoryTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new CategoryTable($dbAdapter);
                    return $table;
                },
                        
                'Admin\Model\UomTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new UomTable($dbAdapter);
                    return $table;
                },
                        
                'Admin\Model\RowmaterialTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new RowmaterialTable($dbAdapter);
                    return $table;
                },
                'Admin\Model\PurchaseTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new PurchaseTable($dbAdapter);
                    return $table;
                },
                'Admin\Model\PurchaseStockTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new PurchaseStockTable($dbAdapter);
                    return $table;
                },
                'Admin\Model\ProductTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new ProductTable($dbAdapter);
                    return $table;
                },
                'Admin\Model\ProductRowmaterialTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new ProductRowmaterialTable($dbAdapter);
                    return $table;
                },
                
                'Admin\Model\EmployeeTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new EmployeeTable($dbAdapter);
                    return $table;
                },
                'Admin\Model\LeaveTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new LeaveTable($dbAdapter);
                    return $table;
                },
 
            ),
        );
    }

}
