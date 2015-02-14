<?php

namespace BabyMonitor\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManagerInterface;

class FeedsController extends AbstractActionController
{
    const DEFAULT_FEED_COUNT = 5;

    public function setEventManager(
        EventManagerInterface $events
    )
    {
        parent::setEventManager($events);
        $controller = $this;
        $events->attach('dispatch',
            function ($e) use ($controller)
            {
                $controller->layout('layout/index-action-layout');
            }, 100);
    }

    public function indexAction()
    {
        $feedTable = $this->getServiceLocator()->get(
            'BabyMonitor\Tables\FeedTable'
        );
        $resultset = $feedTable->fetchMostRecentFeeds(
            self::DEFAULT_FEED_COUNT
        );

        $view = new ViewModel();
        $view->setVariables(array(
            'resultset' => $resultset,
        ));

        return $view;
    }

    public function searchAction()
    {
        return new ViewModel();
    }

    public function deleteAction()
    {
        return new ViewModel(array(
            'id' => $this->params()->fromRoute('id',0)
        ));
    }

    public function manageAction()
    {
        return new ViewModel();
    }

    public function viewAction()
    {
        return new ViewModel();
    }
}