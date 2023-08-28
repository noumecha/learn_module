<?php

namespace Drupal\learn_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\learn_module\LearnModuleSalutationService;

/**
 * Greeting block
 *
 * @Block (
 *  id = "greeting block",
 *  admin_label = @Translation("greeting block")
 * )
 */

class GreetingBlock extends BlockBase implements ContainerFactoryPluginInterface {
    /**
     * the salutation service
     * @var \Drupal\learn_module\LearnModuleSalutationService
     */
    protected $salutation;

    /**
     * construct the greeting block
     */
    public function __construct(array $configuration, $plugin_id, $plugin_definition, LearnModuleSalutationService $salutation )
    {
        parent::__construct($configuration, $plugin_id, $plugin_definition);
        $this->salutation = $salutation;
    }
    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
    {
        return new static(
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->get('learn_module.salutation')
        );
    }
    /**
     * {@inheritdoc}
     */
    public function build() {
        return [
            '#markup' => 'greeting block',
        ];
    }
}