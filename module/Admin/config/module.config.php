<?php
return array(
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
 /* ----------------------------------- Category Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'category' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/category',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Category',
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
                
                            
                            /*category Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add[/:page]',
                                    'constraints' => array(
                                        'page'=> '[0-9]+'
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* category Add Action End */

                             /*category Delete Action */
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
                            /* category Delete Action End */


                            /*category ajaxlist Action */
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
                            /* category ajaxlist Action End */

                            /*category status Action */
                            'statusOn' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOn[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOn'
                                    )
                                )
                            ),
                            
                            'statusOff' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOff[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOff'
                                    )
                                )
                            ),
                            
                            /* category status Action End */

                            /*category Edit Action */
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
                            /* category edit Action End */

                            
                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------category Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* ----------------------------------- Uom Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'uom' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/uom',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Uom',
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
                
                            
                            /*Uom Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add[/:page]',
                                    'constraints' => array(
                                        'page'=> '[0-9]+'
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* Uom Add Action End */

                             /*Uom Delete Action */
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
                            /* Uom Delete Action End */


                            /*Uom ajaxlist Action */
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
                            /* Uom ajaxlist Action End */

                            /*Uom status Action */
                            'statusOn' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOn[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOn'
                                    )
                                )
                            ),
                            
                            'statusOff' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOff[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOff'
                                    )
                                )
                            ),
                            
                            /* Uom status Action End */

                            /*Uom Edit Action */
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
                            /* Uom edit Action End */

                            
                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Uom Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/

                    
/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* ----------------------------------- Product Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'product' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/product',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Product',
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
                
                            
                            /*Product Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add[/:page]',
                                    'constraints' => array(
                                        'page'=> '[0-9]+'
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* Product Add Action End */

                             /*Product Delete Action */
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
                            /* Product Delete Action End */


                            /*Product ajaxlist Action */
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
                            /* Product ajaxlist Action End */

                            /*Product status Action */
                            'statusOn' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOn[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOn'
                                    )
                                )
                            ),
                            
                            'statusOff' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOff[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOff'
                                    )
                                )
                            ),
                            
                            /* Product status Action End */

                            /*Product Edit Action */
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
                            /* Product edit Action End */

                            
                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Product Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/
                    
                    
                    
                    
                    
                    
/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* ----------------------------------- Rowmaterial Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'rowmaterial' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/rowmaterial',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Rowmaterial',
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
                
                            
                            /*Rowmaterial Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add[/:page]',
                                    'constraints' => array(
                                        'page'=> '[0-9]+'
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* Rowmaterial Add Action End */

                             /*Rowmaterial Delete Action */
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
                            /* Rowmaterial Delete Action End */


                            /*Rowmaterial ajaxlist Action */
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
                            /* Rowmaterial ajaxlist Action End */

                            /*Rowmaterial status Action */
                            'statusOn' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOn[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOn'
                                    )
                                )
                            ),
                            
                            'statusOff' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOff[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOff'
                                    )
                                )
                            ),
                            
                            /* Rowmaterial status Action End */

                            /*Rowmaterial Edit Action */
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
                            /* Rowmaterial edit Action End */
                               
                            /*Rowmaterial findMaterial Action */
                            'findMaterial' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/findMaterial',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'findMaterial'
                                    )
                                )
                            ),
                            /* Rowmaterial findMaterial Action End */

                            
                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Rowmaterial Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/
                    
/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* ----------------------------------- Purchase Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'purchase' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/purchase',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Purchase',
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
                
                            
                            /*Purchase Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add[/:page]',
                                    'constraints' => array(
                                        'page'=> '[0-9]+'
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* Purchase Add Action End */

                             /*Purchase Delete Action */
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
                            /* Purchase Delete Action End */


                            /*Purchase ajaxlist Action */
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
                            /* Purchase ajaxlist Action End */

                            /*Purchase status Action */
                            'statusOn' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOn[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOn'
                                    )
                                )
                            ),
                            
                            'statusOff' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOff[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOff'
                                    )
                                )
                            ),
                            
                            /* Purchase status Action End */

                            /*Purchase Edit Action */
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
                            /* Purchase edit Action End */
                            
                             /*Purchase Unit of Measure Action */
                            'uom' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/uom',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'uom'
                                    )
                                )
                            ),
                            /* Purchase edit Action End */
                            
                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------category Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/
                    
/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* ----------------------------------- Ingredient Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'ingredient' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/ingredient',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Ingredient',
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
                
                            
                            /*Ingredient Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add[/:page]',
                                    'constraints' => array(
                                        'page'=> '[0-9]+'
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* Ingredient Add Action End */

                             /*Ingredient Delete Action */
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
                            /* Ingredient Delete Action End */


                            /*Ingredient ajaxlist Action */
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
                            /* Ingredient ajaxlist Action End */

                            /*Ingredient status Action */
                            'statusOn' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOn[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOn'
                                    )
                                )
                            ),
                            
                            'statusOff' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOff[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOff'
                                    )
                                )
                            ),
                            
                            /* Ingredient status Action End */

                            /*Ingredient Edit Action */
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
                            /* Ingredient edit Action End */
                            
                            /*Ingredient Edit Action */
                            'ajaxTable' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/ajaxTable',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxTable'
                                    )
                                )
                            ),
                            /* Ingredient edit Action End */
                            
                            /*Ingredient Edit Action */
                            'prize' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/prize',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'prize'
                                    )
                                )
                            ),
                            /* Ingredient edit Action End */
                            
                            /*Ingredient Edit Action */
                            'uom' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/uom',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'uom'
                                    )
                                )
                            ),
                            /* Ingredient edit Action End */

                            
                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Ingredient Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/

                    
                    /* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* ----------------------------------- Employee Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'employee' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/employee',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Employee',
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
                
                            
                            /*category Add Action */
                            'add' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/add[/:page]',
                                    'constraints' => array(
                                        'page'=> '[0-9]+'
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            /* category Add Action End */

                             /*category Delete Action */
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
                            /* category Delete Action End */


                            /*category ajaxlist Action */
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
                            /* category ajaxlist Action End */

                            /*category status Action */
                            'statusOn' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOn[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOn'
                                    )
                                )
                            ),
                            
                            'statusOff' => array(
                                'type' => 'segment',
                                'options' => array(
                                   'route' => '/statusOff[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'statusOff'
                                    )
                                )
                            ),
                            
                            /* category status Action End */

                            /*category Edit Action */
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
                            /* category edit Action End */

                            
                        )
                    ),
/*------------------------------------------------------------------------------------------------*/
/*----------------------------------Employee Controller End -----------------------------------------*/            
/*------------------------------------------------------------------------------------------------*/
                    

                    
                    
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
            'Admin\Controller\Category' => 'Admin\Controller\CategoryController',
            'Admin\Controller\Uom' => 'Admin\Controller\UomController',
            'Admin\Controller\Menu' => 'Admin\Controller\MenuController',
            'Admin\Controller\Rowmaterial' => 'Admin\Controller\RowmaterialController',
            'Admin\Controller\Purchase' => 'Admin\Controller\PurchaseController',
            'Admin\Controller\Product' => 'Admin\Controller\ProductController',
            'Admin\Controller\Ingredient' => 'Admin\Controller\IngredientController',
            'Admin\Controller\Employee' => 'Admin\Controller\EmployeeController',
            'Admin\Controller\Leave' => 'Admin\Controller\LeaveController',
            
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