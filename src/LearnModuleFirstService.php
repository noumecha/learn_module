<?php

namespace Drupal\learn_module;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Prepares the salutation to the world with service.
 */
class LearnModuleFirstService
{
    use StringTranslationTrait;
    /**
     * @var \Drupal\Core\Config\ConfigFactoryInterface
     */
    //protected $configFactory;

    /**
     * @var \Sympfony\Component\EventDispatcher\EventDispatcherInterface
     */

    //protected $eventDispatcher;

    /**
     * LearnModuleFirstService constructor
     *
     * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher
     */

    /*public function __construct(ConfigFactoryInterface $config_factory, EventDispatcherInterface $eventDispatcher)
    {
        $this->configFactory = $config_factory;
        $this->eventDispatcher = $eventDispatcher;
    }*/

    /**
     * Returns the salutation
     */
    public function getSalutation() {
        $time = new \DateTime();
        $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
        //$config = $this->configFactory->get('learn_module.settings');
        //$salutation = $config->get('salutation');
        //dump($config);
        /*if ($salutation !== " " && $salutation )
        {
            if ((int) $time->format('G') >= 00 && (int) $time->format('G') < 12) {
                return $this->t('<center> '.$salutation.' dear '.$user->get('name')->value.' we are at morning </center>');
            }
            // afternoon
            if ((int) $time->format('G') > 12 && (int) $time->format('G') < 18) {
                return $this->t('<center> '.$salutation.' dear '.$user->get('name')->value.' we are at afternoon </center>');
            }
            // evening
            if ((int) $time->format('G') >= 18) {
                return $this->t('<center> '.$salutation.' dear '.$user->get('name')->value.' we are at evening </center>');
            }
        }*/
        // morning
        if ((int) $time->format('G') >= 00 && (int) $time->format('G') < 12) {
            return $this->t('<center> Good morning dear '.$user->get('name')->value.'</center>');
        }
        // afternoon
        if ((int) $time->format('G') > 12 && (int) $time->format('G') < 18) {
            return $this->t('<center> Good afternoon dear '.$user->get('name')->value.'</center>');
        }
        // evening
        if ((int) $time->format('G') >= 18) {
            return $this->t('<center> Good evening dear '.$user->get('name')->value.'</center>');
        }
    }
}