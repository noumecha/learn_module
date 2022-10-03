<?php

// defining the namespaces 
namespace Drupal\learn_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for the learn_module salutation message
 */

class LearnModuleController extends ControllerBase
{
    /**
     * hello guys.
     * 
     * @return array
     *   My custom message by controller
     */
    public function learnModule() 
    {
        return [
            '#markup' => $this->t('hello guys'),
        ];
    }
}