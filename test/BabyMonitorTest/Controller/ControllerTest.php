<?php

namespace BabyMonitorTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

// Needs to be included
date_default_timezone_set('Europe/London');

class RoutingTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;

    public function setUp()
    {
        $this->setApplicationConfig(
            include dirname(__DIR__) . '/../TestConfig.php.dist'
        );
        parent::setUp();
    }

    public function testFeedHomePageCanBeAccessed()
    {
        $this->dispatch('baby-monitor/feeds');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('BabyMonitor');
        $this->assertControllerName('BabyMonitor\Controller\Feeds');
        $this->assertControllerClass('FeedsController');
        $this->assertActionName('Index');
        $this->assertMatchedRouteName('feeds/action');
        $this->assertQueryContentContains("h1", "Feeds Home");
    }
}