<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonsuperadmin for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

/*
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Superadmin\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /Superdmin/:controller/:action
            'superadmin' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/superadmin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Superadmin\Controller',
                        'controller'    => 'Index',
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

                    */
return array(
    
    'defaultValues' => array(
        'upload_path'=>'/var/www/coool/public',
        ),
    
    'router' => array(
        'routes' => array(
            
                    
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* ------------------------------------------------- Adminpanel Controller ------------------------------------------------------------------------ */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */        
                    
            'admin' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(  
                    'index' => array(
                        'type' => 'segment',
                        'options'=> array(
                            'route' => '/index',
                            'constraints' => array(
                                    //'action1' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'index'
                            )
                        )
                    ),
                      
                    'adminAuthenticate' => array(
                        'type' => 'segment',
                        'options'=> array(
                           'route' => '/adminAuthenticate',
                           'constraints' => array(
                                //'action1' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'adminAuthenticate'
                            )
                        )
                    ),
                                       
                    'adminDashboard' => array(
                        'type' => 'segment',
                        'options'=> array(
                            'route' => '/adminDashboard',
                            'constraints' => array(
                                //'action1' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'adminDashboard'
                            )
                        )
                    ),

                    'adminLogout' => array(
                        'type' => 'segment',
                        'options'=> array(
                           'route' => '/adminLogout',
                           'constraints' => array(
                                //'action1' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'adminLogout'
                            )
                        )
                    ),



 /* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* ----------------------------------- Slider Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'slider' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/slider',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Slider',
                                'action' => 'index'
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
                
                            
                            /*slider Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* Slider Add Action End */

                             /*slider Delete Action */
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                            /* Slider Delete Action End */


                            /*slider ajaxlist Action */
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* Slider ajaxlist Action End */

                            /*slider status Action */
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            /* Slider status Action End */

                            /*slider Edit Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Slider edit Action End */

                            /*slider color Action */
                            'color' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/color',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'color'
                                    )
                                )
                            ),
                            /* Slider color Action End */

                            /*slider color list Action */
                            'colorList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/colorList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'colorList'
                                    )
                                )
                            ),
                            /* Slider color Action End */

                            /*slider color list Action */
                            'colorEdit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/colorEdit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'colorEdit'
                                    )
                                )
                            ),
                            /* Slider color Action End */


                            /*slider ajax Color list Action */
                            'ajaxColorList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxColorList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxColorList'
                                    )
                                )
                            ),
                            /* Slider ajax Color list Action End */

                            /*slider Pattern Status Action */
                            'patternStatus' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/patternStatus[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'patternStatus'
                                    )
                                )
                            ),
                            /* Slider Pattern Status Action End */


                            /*slider Color Status Action */
                            'colorStatus' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/colorStatus[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'colorStatus'
                                    )
                                )
                            ),
                            /* Slider Color1 Status Action End */


                            
                            /* Menu Order Action End */

                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Slider Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/


/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Menu Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'menu' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/menu',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Menu',
                                'action' => 'index'
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
                
                             /*Menu Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                           
                            /*Menu ajaxlist Action */
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* Menu Delete Action End */

                            /*Menu ajaxlist Action */
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                            /* Menu Delete Action End */

                            

                            /*Menu status Action */
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            /* Menu status Action End */

                            /*Menu Edit Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Menu Edit Action End */

                            /*Menu Order Action */
                            'updateMenuOrder' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/updateMenuOrder[/:id][/:order]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'order'=>'[0-9]+',                                      
                                    ),
                                    'defaults' => array(
                                        'action' => 'updateMenuOrder'
                                    )
                                )
                            ),



                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Menu Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/


/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Pages Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'pages' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/pages',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Pages',
                                'action' => 'index'
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
                
                             /*Pages Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                           
                            /*Pages ajaxlist Action*/
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* Pages Action End */

                             /* Pages status Action*/
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            /* Pages status Action End */


                            /*Pages Edit Action*/ 
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Pages Edit Action End */

                            /*Menu ajaxlist Action 
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                            /* Menu Delete Action End */

                            

                           

                            

                            /*Menu Order Action 
                            'updateMenuOrder' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/updateMenuOrder[/:id][/:order]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'order'=>'[0-9]+',                                      
                                    ),
                                    'defaults' => array(
                                        'action' => 'updateMenuOrder'
                                    )
                                )
                            ),*/



                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Pages Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/


/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Country Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'country' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/country',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'country',
                                'action' => 'index'
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
                
                             /*Count Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                           /* add end */

                            /*Country ajaxlist Action */
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* Country ajaxlist Action End */

                            /*Country status Action */
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            /* Country status Action End */

                            /*Country delete Action */
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                            /* Country delete Action End */

                             /*Country edit Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Country status Action End */


                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Count Master Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/

/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Languages Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'languages' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/languages',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Languages',
                                'action' => 'index'
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
                
                             /*Languages Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                           /* Languages end */

                            /*Languages ajaxlist Action */
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* Languages ajaxlist Action End */

                            /*Languages status Action */
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            /* Languages status Action End */

                            
                             /*Languages edit Action*/
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Languages status Action End */


                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------languages  Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/



/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Contacts Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'contacts' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/contacts',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'contacts',
                                'action' => 'index'
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
                
                             /*Count Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                           /* Contacts end */

                           /*Contacts ajaxlist Action */
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* Contacts ajaxlist Action End */

                            /*Contacts edit Action*/
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Contacts status Action End */

                            /*Contacts edit Action*/
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            /* Contacts status Action End */

                            

                             


                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Contacts Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/


/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------User Email Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'userEmail' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/userEmail',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'UserEmail',
                                'action' => 'index'
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
                
                             /*User Email Add Action*/
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                           /* User Email end */

                           /*User Email ajaxlist Action */
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* User Email ajaxlist Action End */

                            /*Contacts edit Action*/
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Contacts status Action End */

                            /*Contacts edit Action*/
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            /* Contacts status Action End */

                            

                             


                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------User Email Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/


/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Logo Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'logo' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/logo',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Logo',
                                'action' => 'index'
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
                
                             /*Logo Add Action*/
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                           /* Logo add end */

                           /*Logo ajaxlist Action*/
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* Logo ajaxlist Action End */

                            /*Contacts edit Action*/
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Contacts status Action End */

                            /*Contacts edit Action
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            /* Contacts status Action End */

                            

                             


                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Logo Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/

/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Color Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'color' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/color',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Color',
                                'action' => 'index'
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
                
                           
                           /*color ajaxlist Action*/
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* color ajaxlist Action End */

                            /*color edit Action*/
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            /* color status Action End */

                            /*Default color Action*/
                            'defaultStatus' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/defaultStatus[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'defaultStatus'
                                    )
                                )
                            ),
                            /* Default color status Action End */
                           
                            /*color Picker Action*/
                            'pickerStatus' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/pickerStatus[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'pickerStatus'
                                    )
                                )
                            ),
                            /*color Picker Action End*/

                             


                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Color Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/

/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Mailed List Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'mailedList' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/mailedList',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'MailedList',
                                'action' => 'index'
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

                            /*MailedSettings Action*/
                            'mailedSettings' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/mailedSettings',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'mailedSettings'
                                    )
                                )
                            ),
                            /*MailedSettings Action End*/

                            /*Edit Action*/
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /*Edit Action End*/

                
                           
                      
                             


                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Mailed List Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/










/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------SmallPackage Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'smallPackage' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/smallPackage',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'SmallPackage',
                                'action' => 'index'
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
                
                            /*SmallPackage Add Action*/ 
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                                                               
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* Small Package add action end */

                            /*Small Package ajaxlist Action */
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* Small Package ajaxlist Action End */
                            
                            /*Small Package status Action*/
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),

                            /*Small Package delete Action */
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                           
                            /*Small Package Edit Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Small Package edit end*/

                            

                            /*Featured Product status Action 
                            'updateFeaturedProductStatus' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/updateFeaturedProductStatus[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'updateFeaturedProductStatus'
                                    )
                                )
                            ),
                            /* Featured Product status Action End */

                            /*home Featured Product status Action 
                            'updateHomeFeaturedProductStatusOn' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/updateHomeFeaturedProductStatusOn[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'updateHomeFeaturedProductStatusOn'
                                    )
                                )
                            ),
                            /* Featured Product status Action End */

                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------SmallPackage Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/

/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Big Package Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'bigPackage' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/bigPackage',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'BigPackage',
                                'action' => 'index'
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
                
                            /*bigPackage Add Action*/ 
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* bigPackage add action end */

                            /*bigPackage ajaxlist Action */
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* bigPackage ajaxlist Action End */
                            
                            /* bigPackage status Action */
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),

                            /*bigPackage delete Action */
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                           
                            /*bigPackage Edit Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* bigPackage edit end*/


                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Big Package Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/




/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Ecommerce Package Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'ecommercePackage' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/ecommercePackage',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'EcommercePackage',
                                'action' => 'index'
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
                
                            /*EcommercePackage Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* EcommercePackage add action end */

                            /*EcommercePackage ajaxlist Action*/
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxList',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* EcommercePackage ajaxlist Action End */
                            
                            /* EcommercePackage status Action*/
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),

                            /*EcommercePackage delete Action*/ 
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                           
                            /*EcommercePackage Edit Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* EcommercePackage edit end*/

                            /*EcommercePackage Order Action */
                            'updateEcommerceOrder' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/updateEcommerceOrder[/:id][/:order]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'order'=>'[0-9]+',                                      
                                    ),
                                    'defaults' => array(
                                        'action' => 'updateEcommerceOrder'
                                    )
                                )
                            ),


                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Ecommerce Package Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/



/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Website Package Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'website' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/website',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Website',
                                'action' => 'index'
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
                
                            /*Website Package Add Action */
                            'addPackage' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/addPackage',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'addPackage'
                                    )
                                )
                            ),
                            
                            /* Website Package add action end */
 
                           /* Website Package edit action end */
                             'editAjax' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/editAjax',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'editAjax'
                                    )
                                )
                            ),
                            
                             'editImage' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/editImage',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'editImage'
                                    )
                                )
                            ),

                           /* Website Package edit action end */
                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Website Package Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/



                    
/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Website Package Specification Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'specification' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/specification',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Specification',
                                'action' => 'index'
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
                
                            /*Website Package Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* Website Package add action end */

                            /*Website Package ajaxlist Action*/
                            'editAjax' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/editAjax',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'editAjax'
                                    )
                                )
                            ),
                                                      
                           

                            /*EcommercePackage delete Action*/ 
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                           
                            /*EcommercePackage Edit Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* EcommercePackage edit end*/


                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Website Package Specification Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/
                    
/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Other Services Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */                    

                    'otherservices' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/otherservices',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'OtherServices',
                                'action' => 'index'
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
                
                            /*Other Services Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* Other Services add action end */

                            /*Other Services ajaxlist Action*/
                            'ajaxlist' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxlist',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* Other Services ajaxlist Action End */
                            
                            /* Other Services status Action*/
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),

                            /*Other Services delete Action*/ 
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                           
                            /*Other Servicese Edit Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Other Services edit end*/
                            
                             /* Other Services Description end*/
                            'edittitle' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edittitle[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'editTitle'
                                    )
                                )
                            ),

                        )
                    ),
/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Other Services Controller END ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */ 
                    
                    
  /* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* -------------------------------- Services Page Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */                    

                    'servicespage' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/servicespage[/:serId]',
                             'constraints' => array(
                                        'serId' => '[0-9]+',                                       
                                    ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'ServicesPage',
                                'action' => 'index'
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
                
                          /* Services page Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                           /* Services page add action end */

                            /* Services page ajaxlist Action*/
                            'ajaxlist' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxlist',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            /* Services page ajaxlist Action End */
                            
                             /* Services page status Action*/
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),

                             /* Services page delete Action*/ 
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                           
                            /* Services page edit Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Services page edit end*/
                            
                      
                        )
                    ),
/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Services Page Controller END ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */ 
               
                    
                    
                                        
  /* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* -------------------------------- Services Page Content Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */                    

                    'servicespagecontent' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/servicespagecontent[/:serId][/:id]',
                            'constraints' => array(
                                        'id' => '[0-9]+',   
                                        'serId' => '[0-9]+',  
                                    ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'ServicesPageContent',
                                'action' => 'index'
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
                
                            /*Services Page ContentAdd Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add[/:rs]',
                                   'constraints' => array(
                                       'rs' => '[0-9]+', 
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                           /*Services Page Content add action end */

                           /*Services Page Contents ajaxlist Action*/
                            'ajaxlist' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxlist',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                           /* Services Page Content ajaxlist Action End */
                            
                           /* Services Page Content status Action*/
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),

                           /*Services Page Contentdelete Action*/ 
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                           
                           /*Services Page Content Edit Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id2]',
                                    'constraints' => array(
                                        'id2' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Services Page Content edit end*/
                            
                           
                        )
                    ),
/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Services Page Content Controller END ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
      
       /* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* -------------------------------- Services Page Template Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */                    

                    'servicespagetemplate' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/servicespagetemplate',
                            'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'ServicesPageTemplate',
                                'action' => 'index'
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
                
                            /*Services Page TemplateAdd Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add',
                                   
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                           /*Services Page Template add action end */

                           /*Services Page Templates ajaxlist Action*/
                            'ajaxlist' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxlist',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                           /* Services Page Template ajaxlist Action End */
                            
                           /* Services Page Template status Action*/
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/status[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),

                           /*Services Page Templatedelete Action*/ 
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                           
                           /*Services Page Template Edit Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* Services Page Template edit end*/
                            
                           
                        )
                    ),
/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* --------------------------------Services Page Template Controller END ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
                    
                    
                    
                ),
            ),

/*-------------------------------------------------------------------------------------------------*/
           
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
            'Admin\Controller\Index' => 'Admin\Controller\IndexController',
            'Admin\Controller\Slider' => 'Admin\Controller\SliderController',
            'Admin\Controller\Menu' => 'Admin\Controller\MenuController',
            'Admin\Controller\Country' => 'Admin\Controller\CountryController',
            'Admin\Controller\SmallPackage'=> 'Admin\Controller\SmallPackageController',
            'Admin\Controller\BigPackage'=> 'Admin\Controller\BigPackageController',
            'Admin\Controller\EcommercePackage' => 'Admin\Controller\EcommercePackageController',
            'Admin\Controller\Website' => 'Admin\Controller\WebsiteController',
            'Admin\Controller\Specification' => 'Admin\Controller\SpecificationController',
            'Admin\Controller\Contacts' => 'Admin\Controller\ContactsController',
            'Admin\Controller\UserEmail' => 'Admin\Controller\UserEmailController',
            'Admin\Controller\Logo' => 'Admin\Controller\LogoController',
            'Admin\Controller\OtherServices' => 'Admin\Controller\OtherServicesController',
            'Admin\Controller\ServicesPage' => 'Admin\Controller\ServicesPageController',
            'Admin\Controller\ServicesPageContent' => 'Admin\Controller\ServicesPageContentController',
            'Admin\Controller\ServicesPageTemplate' => 'Admin\Controller\ServicesPageTemplateController',
            'Admin\Controller\Color' => 'Admin\Controller\ColorController',
            'Admin\Controller\MailedList' =>'Admin\Controller\MailedListController',
            'Admin\Controller\Pages' =>'Admin\Controller\PagesController',
            'Admin\Controller\Languages' =>'Admin\Controller\LanguagesController',
        ),
    ),
    
    'controller_plugins' => array(
               'invokables' => array(            
               'UploadFilesLib' => 'Admin\Controller\Plugin\UploadFilesLib',
        )
    ),
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'admin/index/index'       => __DIR__ . '/../view/admin/index/index.phtml',
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