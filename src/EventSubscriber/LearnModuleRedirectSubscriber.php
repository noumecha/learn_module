<?php
namespace Drupal\learn_module\EventSubscriber;

use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
#use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\Core\Routing\LocalRedirectResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Url;

/***
 * Subscribes to the kernet Request evnet and redircets to the home page
 * When the user has the "non_grata" role.
 *
 */

class LearnModuleRedirectSubscriber implements EventSubscriberInterface
{

    /**
     * @var \Drupal\Core\Routing\CurrentRouteMatch $currentRouteMatch
    */
    protected $currentRouteMatch;

    /**
     * @var \Drupal\Core\Session\AccountProxyInterface $currentUser
     */

    protected $currentUser;

    /**
     *
     * LearnModuleRedirectSubscriber constructor.
     *
     * @param \Drupal\Core\Routing\CurrentRouteMatch $current_route_match
     * @param \Drupal\Core\Session\AccountProxyInterface $currentUser
     */

    public function __construct(AccountProxyInterface $currentUser,CurrentRouteMatch $current_route_match)
    {
        $this->currentRouteMatch = $current_route_match;
        $this->currentUser = $currentUser;
    }

    /**
     * {@inheritdoc}
     * get the service via the create() method
     */
    public static function create(ContainerInterface $container) {
        //$current_route_match = $container->get('current_route_match');
        return new static(
            $container->get('learn_module.redirect_subscriber')#,
            //$current_route_match
        );
    }

    /**
     * {@inheritdoc}
     * we use this function genrerally to subscribe to some event
     */
    public static function getSubscribedEvents()
    {
        //$events['kernel.request'][] = ['onRequet',0];
        $events[KernelEvents::REQUEST][] = ['onRequet',0];
        return $events;
    }

    /**
     * Handler for the kernel request event.
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function onRequet(GetResponseEvent $event)
    {

        $route_name = $this->currentRouteMatch->getRouteName();
        //var_dump($route_name);
        if ($route_name !== 'learn_module.redirect_subscriber')
        {
            return ;
        }
        $roles = $this->currentUser->getRoles();
        if(in_array('authenticated', $roles))
        {
            $url = Url::fromUri('internal:/');
            $event->setResponse(new LocalRedirectResponse($url->toString()));
        }
        /*$request = $event->getRequest();
        $path = $request->getPathInfo();

        if($path !== '/redirect')
        {
            return;
        }

        $roles = $this->currentUser->getRoles();
        //dump($request);
        if(in_array('authenticated', $roles))
        {
            $event->setResponse(new RedirectResponse('/node/1'));
        }*/
    }
}