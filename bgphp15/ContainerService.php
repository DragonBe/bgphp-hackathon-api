<?php

namespace Bgphp;

Class ContainerService
{
    protected $pdo;

    public function __construct()
    {
        $dsn = sprintf('sqlite:%s', __DIR__ . '/../data/db/shipping.db');
        $this->pdo = new \PDO($dsn);
    }

    public function fetch($id)
    {
        $sc = new ShippingConnector($this->pdo);
        $data = $sc->find($id);
        $fields = ['container', 'latitude', 'longitude', 'timestamp', 'destination'];
        $elements = array_flip(['container', 'latitude', 'longitude', 'destination']);
        return array_intersect_key(array_combine($fields, $data[0]), $elements);
    }

    public function fetchAll()
    {

    }

    public function store($data)
    {
        $sc = new ShippingConnector($this->pdo);
        $sc->save($data->id, $data->lat, $data->lon, $data->destination);
    }
}