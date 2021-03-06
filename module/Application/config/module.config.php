<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            
            
            
            
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => 'index[/]',
                            'constraints' => array(
//                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',                            
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),

                    'color' => array(
                        'type' => 'segment',
                        'options'=> array(
                            'route' => 'color[/]',
                            'constraints' => array(
                                //'action1' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'color'
                            )
                        )
                    ),

                    'productDetails' => array(
                        'type' => 'segment',
                        'options'=> array(
                            'route' => 'productDetails[/:id][/]', 
                            'constraints' => array(
                                'id' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'action' => 'productDetails'
                            )
                        )
                    ),
                    
             ),
            ),
            
//------------------------------Ecommerce Controller------------------------------------//
                    'ecommerce' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/ecommerce',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Ecommerce',
                                'action'        => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'default' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/[:controller[/:action]]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                    ),
                                ),
                            ),
                        ),
                    ),
        //------------------------------Ecommerce Controller------------------------------------//

        //------------------------------Our product Controller------------------------------------//
                    'ourProduct' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/ourProduct',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'OurProduct',
                                'action'        => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'default' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/[:controller[/:action]]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                    ),
                                ),
                            ),

                            'color' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/color',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'color'
                                    )
                                )
                            ),
                        ),
                    ),
        //------------------------------Our product Controller------------------------------------//

        //------------------------------Contact Controller------------------------------------//
                    'contacts' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/contacts',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Contacts',
                                'action'        => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'default' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/[:controller[/:action]]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                    ),
                                ),
                            ),

                            /*email Add Action */
                            'email' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/email',
                                    'constraints' => array(
                                    ),
                                'defaults' => array(
                                    'action' => 'email'
                                    )
                                )
                            ),
                            /* email Add Action End */

                            /*aboutUs Action */
                            'aboutUs' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/aboutUs',
                                    'constraints' => array(
                                    ),
                                'defaults' => array(
                                    'action' => 'aboutUs'
                                    )
                                )
                            ),
                            /* aboutUs Action End */


                        ),
                    ),
        //------------------------------contacts Controller------------------------------------//



        //------------------------------Website Package Controller------------------------------------//            


                    'websitePackage' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/websitePackage',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'WebsitePackage',
                                'action'        => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'default' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/[:controller[/:action]]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                    ),
                                ),
                            ),
                            
                        ),
                    ),
        //------------------------------Website Package Controller------------------------------------//  

                    
        //------------------------------Services Controller------------------------------------//            

                    'services' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/services[/:serId][/:id]',
                            'constraints' => array(
                                'serId'    => '[0-9]+',
                                'id'    => '[0-9]+',                                       
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Services',
                                'action'        => 'index',
                            ),
                        ),
                       'may_terminate' => true,
                       'child_routes' => array(
                            'default' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/[:controller[/:action]]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                    ),
                                ),
                            ),
                           
                            /*ajaxList content Action */
                            'ajaxlist' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/ajaxlist',
                                    'constraints' => array(
                                    ),
                                'defaults' => array(
                                    'action' => 'ajaxlist'
                                    )
                                )
                            ),
                            /* ajaxList content End */
                           
                             /*ajax Page Heading Action */
                            'ajaxpageheading' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/ajaxpageheading',
                                    'constraints' => array(
                                    ),
                                'defaults' => array(
                                    'action' => 'ajaxPageHeading'
                                    )
                                )
                            ),
                            /*ajax Page Heading End */

                            'color' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/color',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'color'
                                    )
                                )
                            ),


                           
                        ),
                    ),
        //------------------------------Services Controller------------------------------------// 
                    
        //------------------------------Static Page Controller------------------------------------//            

                    'static' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/static',
                            'constraints' => array(                        
                                'id'    => '[0-9]+',                                       
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Static',
                                'action'        => 'index',
                            ),
                        ),
                       'may_terminate' => true,
                       'child_routes' => array(
                            'default' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/[:controller[/:action]]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                    ),
                                ),
                            ),
                           
                            /*responsive one Action */
                            'responsive' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/responsive',
                                    'constraints' => array(
                                    ),
                                'defaults' => array(
                                    'action' => 'responsive'
                                    )
                                )
                            ),
                            /*responsive one Action */
                           
                            /*responsive two Action */
                            'whyresponsive' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/whyresponsive',
                                    'constraints' => array(
                                    ),
                                'defaults' => array(
                                    'action' => 'whyresponsive'
                                    )
                                )
                            ),
                            /*responsive two Action */   
                           
                          'ajaxLink' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/ajaxLink',
                                    'constraints' => array(
                                    ),
                                'defaults' => array(
                                    'action' => 'ajaxLink'
                                    )
                                )
                            ),
                           
                        ),
                    ),
//------------------------------Static Page Controller------------------------------------// 
              
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Ecommerce' => 'Application\Controller\EcommerceController',
            'Application\Controller\WebsitePackage' => 'Application\Controller\WebsitePackageController',
            'Application\Controller\OurProduct' => 'Application\Controller\OurProductController',
            'Application\Controller\Contacts' => 'Application\Controller\ContactsController',
            'Application\Controller\Services' => 'Application\Controller\ServicesController',
            'Application\Controller\Static' => 'Application\Controller\StaticController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);