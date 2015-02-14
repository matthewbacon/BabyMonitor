<?php

return array(
    'router' => array(
        'routes' => array(
            'feeds' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/baby-monitor',
                    'defaults' => array(
                        '__NAMESPACE__' => 'BabyMonitor\Controller',
                        'controller'    => 'Feeds',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'page' => array(
                        'type'      => 'Segment',
                        'options'   => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(),
                        ),
                    ),
                    'delete' => array(
                        'type'      => 'Segment',
                        'options'   => array(
                            'route' => '/feeds/delete/[:id]',
                            'constraints' => array(
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'action' => 'delete',
                            ),
                        ),
                        'may_terminate' => true,
                    ),
                    'manage' => array(
                        'type'      => 'Segment',
                        'options'   => array(
                            'route' => '/feeds/manage/[:id]',
                            'constraints' => array(
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'action' => 'manage',
                            ),
                        ),
                        'may_terminate' => true,
                    ),
                    'view' => array(
                        'type'      => 'Segment',
                        'options'   => array(
                            'route' => '/feeds/view/[:id]',
                            'constraints' => array(
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'action' => 'view',
                            ),
                        ),
                        'may_terminate' => true,
                    ),
                    'search' => array(
                        'type'      => 'Segment',
                        'options'   => array(
                            'route' => '/feeds/search[/][:start][/:end]',
                            'constraints' => array(
                                'start' => '[0-9]{4}(-[0-9]{4}){2}',
                                'end' => '[0-9]{4}(-[0-9]{4}){2}',
                            ),
                            'defaults' => array(
                                'action' => 'search',
                            ),
                        ),
                        'may_terminate' => true,
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'BabyMonitor\Controller\Feeds' => 'BabyMonitor\Controller\FeedsController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'template_map' => array(
            'layout/index-action-layout' => __DIR__ . '/../view/layout/layout.phtml',
            'BabyMonitor\Feeds\alternativetemplate' => __DIR__ . '/../view/baby-monitor/feeds/alternative.phtml',
        ),
    ),
);