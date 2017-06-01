<?php

namespace AppBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;


class RedirectAfterEditionSubscriber implements EventSubscriberInterface
{
    public function __construct(RouterInterface $router) {
        $this->router = $router;
    }

    public function onEditionSuccess(FormEvent $event)
    {
        $url = $this->router->generate('wino_index');
        $response = new RedirectResponse($url);
        $event->setResponse($response);
    }

    public static function getSubscribedEvents() {
        return [
            FOSUserEvents::PROFILE_EDIT_SUCCESS => 'onEditionSuccess'
        ];
    }
}
