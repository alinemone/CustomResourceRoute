<?php


namespace App\Routing;


use Illuminate\Routing\ResourceRegistrar;

class customResourceRegistrar extends ResourceRegistrar
{

    protected $resourceDefaults =  [
        'details',
        'index',
        'create',
        'store',
        'show',
        'edit',
        'update',
        'destroy',

    ];


    protected function addResourceDetails($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/details';

        $action = $this->getResourceAction($name, $controller, 'details', $options);

        return $this->router->get($uri, $action);
    }



}
