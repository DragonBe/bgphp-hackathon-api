<?php
namespace bgphp\V1\Rest\Tracker;

class TrackerResourceFactory
{
    public function __invoke($services)
    {
        return new TrackerResource();
    }
}
