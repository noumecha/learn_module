<?php

// defining the namespaces
namespace Drupal\learn_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\learn_module\LearnModuleFirstService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for the learn_module salutation message
 */

class LearnModuleController extends ControllerBase
{
    /**
     * @var \Drupal\learn_module\LearnModuleFirstService
     */
    protected $firstService;

    # we can use service by statically method :
    # $service = \Drupal::service('module_name.service_name');

    /**
     * learnModuleController constructor.
     *
     * @param \Drupal\learn_module\LearnModuleFirstService $firstService
     */
    public function __construct(LearnModuleFirstService $firstService) {
        $this->firstService = $firstService;
    }
    /**
     * {@inheritdoc}
     * get the service via the create() method
     */
    public static function create(ContainerInterface $container) {
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
            '#markup' => $this->firstService->getSalutation(),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function test() {
        $noumel = "hello";
        return [
            "#markup" => $noumel
        ];
    }
}