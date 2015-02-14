<?php

namespace BabyMonitor\Tables\Factories;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use BabyMonitor\Tables\FeedTable;

class FeedTableFactory implements FactoryInterface
{
    public function createService(
        ServiceLocatorInterface $serviceLocator
    )
    {
        $tableGateway = $serviceLocator->get(
            'BabyMonitor\Tables\FeedTableGateway'
        );
        $table = new FeedTable($tableGateway);

        return $table;
    }
}