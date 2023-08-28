<?php

namespace Drupal\learn_module;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * prepare the salutation to the world
 */
class LearnModuleSalutationService {

    use StringTranslationTrait;

    /**
     * @var \Drupal\Core\Config\ConfigFactoryInterface
     */
    protected $configFactory;
    /**
     * LearnModuleSalutationService constructor
     * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
     *
     */
    public function __construct(ConfigFactoryInterface $config_factory) {
        $this->configFactory = $config_factory;
    }

    /**
     * returns the salutation
     */
    public function showSalutation() {
        // get the config message from the configuration form
        $config = $this->configFactory->get('learn_module.custom_salutation');
        $msg = $config->get('message');

        //dump($msg);
        if ($msg == "") {
            $msg = "hello";
        }

        $time = new \DateTime();
        if ((int) $time->format('G') >= 00 && (int) $time->format('G') < 12) {
            return $this->t('<h2><b>'.$msg.' now is morning</b></h2>');
        }
        if ((int) $time->format('G') >= 12 && (int) $time->format('G') < 18) {
            return $this->t('<h2><b>'.$msg.' now is afternoon</b></h2>');
        }
        if ((int) $time->format('G') >= 18) {
            return $this->t('<h2><b>'.$msg.' now is evening</b></h2>');
        }
    }

}