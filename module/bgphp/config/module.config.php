<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'bgphp\\V1\\Rest\\Container\\ContainerResource' => 'bgphp\\V1\\Rest\\Container\\ContainerResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'bgphp.rest.container' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/container[/:container_id]',
                    'defaults' => array(
                        'controller' => 'bgphp\\V1\\Rest\\Container\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'bgphp.rest.container',
        ),
    ),
    'zf-rest' => array(
        'bgphp\\V1\\Rest\\Container\\Controller' => array(
            'listener' => 'bgphp\\V1\\Rest\\Container\\ContainerResource',
            'route_name' => 'bgphp.rest.container',
            'route_identifier_name' => 'container_id',
            'collection_name' => 'container',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'bgphp\\V1\\Rest\\Container\\ContainerEntity',
            'collection_class' => 'bgphp\\V1\\Rest\\Container\\ContainerCollection',
            'service_name' => 'container',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'bgphp\\V1\\Rest\\Container\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'bgphp\\V1\\Rest\\Container\\Controller' => array(
                0 => 'application/vnd.bgphp.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'bgphp\\V1\\Rest\\Container\\Controller' => array(
                0 => 'application/vnd.bgphp.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'bgphp\\V1\\Rest\\Container\\ContainerEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'bgphp.rest.container',
                'route_identifier_name' => 'container_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'bgphp\\V1\\Rest\\Container\\ContainerCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'bgphp.rest.container',
                'route_identifier_name' => 'container_id',
                'is_collection' => true,
            ),
        ),
    ),
);
