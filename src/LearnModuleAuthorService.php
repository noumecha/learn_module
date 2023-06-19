<?php

namespace Drupal\learn_module;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Config\ConfigFactoryInterface;

class LearnModuleAuthorService
{
    use StringTranslationTrait;
    /**
     * {@inheritdoc}
     * defined class porperties
     */
    protected $author = "#Ze Navigator";
    /**
     * @var \Drupal\Core\Config\ConfigFactoryInterface
     */
    //protected $configFactory;

    /**
     * LearnModuleFirstService constructor
     *
     * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
     */

    /*public function __construct(ConfigFactoryInterface $config_factory)
    {
        $this->configFactory = $config_factory;
    }*/

    public function getName()
    {
        return $this->author;
    }
}
