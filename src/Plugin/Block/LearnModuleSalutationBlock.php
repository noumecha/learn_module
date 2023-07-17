<?php

namespace Drupal\learn_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\learn_module\LearnModuleSalutationService;

/**
 * Learn module Salutation Block
 *
 * @Block(
 *  id = "learn_module_salutation_block",
 *  admin_label = @Translation("Learn Module Salutation"),
 * )
 */
class LearnModuleSalutationBlock extends BlockBase implements ContainerFactoryPluginInterface {
    /**
     * The salutation service
     * @var \Drupal\learn_module\LearnModuleSalutationService
     */
    protected $salutation;

    /**
     * Constructs a LearnModuleSalutationBlock.
     */
    public function __construct(array $configuration, $plugin_id, $plugin_definition, LearnModuleSalutationService $salutation) {
        parent::__construct($configuration, $plugin_id, $plugin_definition);
        $this->salutation = $salutation;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
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
            '#markup' => $this->salutation->showSalutation(),
        ];
    }

}