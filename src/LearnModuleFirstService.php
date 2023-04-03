<?php

namespace Drupal\learn_module;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Prepares the salutation to the world with service.
 */
class LearnModuleFirstService
{
    use StringTranslationTrait;
    /**
     * @var \Drupal\Core\Config\ConfigFactoryInterface
     */
    protected $configFactory;

    /**
     * LearnModuleFirstService constructor
     *
     * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
     */

    public function __construct(ConfigFactoryInterface $config_factory)
    {
        $this->configFactory = $config_factory;
    }

    /**
     * Returns the salutation
     */
    public function getSalutation() {
        $time = new \DateTime();
        $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
        $config = $this->configFactory->get('learn_module.custom_salutation');
        #dump($config);
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