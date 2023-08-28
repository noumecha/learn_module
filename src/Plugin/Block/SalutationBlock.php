<?php

namespace Drupal\learn_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\learn_module\LearnModuleAuthorService;

/**
 * learn module salutation block.
 *
 * @Block(
 *  id = "learn_module_salutation_block",
 *  admin_label = @Translation("learn module salutation"),
 * )
 */

class SalutationBlock extends BlockBase implements ContainerFactoryPluginInterface
{
    /**
     *
     * use the salutation service
     *
     * @var \Drupal\learn_module\LearnModuleAuthorService
     */
    protected $author;
    /**
     *
     * get salutation service from injection
     */
    public function __construct(array $configuration, $plugin_id, $plugin_definition, LearnModuleAuthorService $author)
    {
        parent::__construct($configuration, $plugin_id, $plugin_definition);
        $this->author = $author;
    }

    /**
     * constrction of SalutationBlock
     */

    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
    {
        return new static(
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->get('learn_module.author')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        return [
            //dump($this->author),
            '#markup' => '<h4>' . $this->author->getName() . '</h4>',
        ];
    }
}
