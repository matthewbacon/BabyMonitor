<?php

namespace BabyMonitor\Tables\Factories;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ArraySerializable;
use BabyMonitor\Model\FeedModel;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;

class FeedTablegatewayFactory implements FactoryInterface
{
    public function createService(
        ServiceLocatorInterface $serviceLocator
    )
    {
        $dbAdapter = $serviceLocator->get(
            'Zend\Db\Adapter\Adapter'
        );
        $hydrator = new ArraySerializable();
        $rowObjectPrototype = new FeedModel();
        $resultSet = new HydratingResultSet(
            $hydrator, $rowObjectPrototype
        );
        return new TableGateway(
            'tblfeeds', $dbAdapter, null, $resultSet
        );
    }
}