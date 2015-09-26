<?php
namespace bgphp\V1\Rest\Container;

class ContainerResourceFactory
{
    public function __invoke($services)
    {
        return new ContainerResource();
    }
}
