<?php 
namespace Drupal\learn_module\EventSubscriber;

use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/***
 * Subscribes to the kernet Request evnet and redircets to the home page 
 * When the user has the "non_grata" role.
 * 
 */

class LearnModuleRedirectSubscriber implements EventSubscriberInterface 
{
    /**
     * 
     * @var \Drupal\Core\Session\AccountProxyInterface
     */
    protected $currentUser;

    /**
     * 
     * LearnModuleRedirectSubscriber constructor.
     * 
     * @param \Drupal\Core\Session\AccountProxyInterface $currentUser
     */

    public function __construct(AccountProxyInterface $currentUser)
    {
        $this->currentUser = $currentUser;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents() 
    {
        $events['kernel.request'][] = ['onRequet',0];
        return $events;
    }
    
    /**
     * Handler for the kernel request event.
     * 
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function onRequet(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $path = $request->getPathInfo();

        if($path !== '/redirect') 
        {
            return;
        }

        $roles = $this->currentUser->getRoles();
        if(in_array('non_grata', $roles))
        {
            $event->setResponse(new RedirectResponse('/node/1'));
        }
    }
}