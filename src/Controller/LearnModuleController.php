<?php

// defining the namespaces
namespace Drupal\learn_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\learn_module\LearnModuleSalutationService;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for the learn_module salutation message
 */

class LearnModuleController extends ControllerBase
{
    /**
     * @var \Drupal\learn_module\LearnModuleSalutationService
     */
    protected $salutation;

    /**
     * @var \Drupal\learn_module\LearnModuleAuthorService
     */
    protected $authorService;

    /**
     * learnModuleController constructor.
     *
     * @param \Drupal\learn_module\LearnModuleSalutationService $salutation
     */
    public function __construct(LearnModuleSalutationService $salutation)
    {
        $this->salutation = $salutation;
    }
    /**
     * {@inheritdoc}
     * get the service via the create() method
     */
    public static function create(ContainerInterface $container)
    {
        return new static(
            $container->get('learn_module.salutation')
        );
    }
    /**
     * hello guys.
     *
     * @return array
     *   My custom message for controller
     */
    public function learnModule()
    {
        return [
            '#markup' => $this->salutation->showSalutation(),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function test()
    {
        return [
            "#markup" => "<h2> hello, dear Drupal User </h2>"
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function routeParameters()
    {
        return [
            "#markup" => "<p> #ze route with parameters </p>"
        ];
    }
}
