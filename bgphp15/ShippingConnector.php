<?php

namespace Bgphp;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class ShippingConnector
{
    /** @var \PDO The PDO abstract */
    protected $pdo;

    /**
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param \PDO $pdo
     * @return ShippingConnector
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }

    public function find($id)
    {
        if (false === ($stmt = $this->getPdo()->prepare('SELECT * FROM container ORDER BY timestamp DESC WHERE id = ?'))) {
            throw new \DomainException('Cannot prepare the request: ' . implode(' - ', $this->getPdo()->errorInfo()));
        }
        $stmt->bindParam(1, $id);
        if (false === $stmt->execute()) {
            throw new InvalidArgumentException('Cannot execute request for ID: ' . implode(' - ', $stmt->errorInfo()));
        }
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function save($id, $latitude, $longitude, $destination)
    {
        if (false === ($stmt = $this->getPdo()->prepare('INSERT INTO container VALUES (?, ?, ?, ?, ?)'))) {
            throw new \DomainException('Cannot prepare the request: ' . implode(' - ', $this->getPdo()->errorInfo()));
        }
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $latitude);
        $stmt->bindParam(3, $longitude);
        $stmt->bindparam(4, date('Y-m-d H:i:s'));
        $stmt->bindParam(5, $destination);
        if (false === $stmt->execute()) {
            throw new InvalidArgumentException('Cannot execute request for ID: ' . implode(' - ', $stmt->errorInfo()));
        }
        return true;
    }
}