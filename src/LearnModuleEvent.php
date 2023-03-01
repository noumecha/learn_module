<?php

namespace Drupal\learn_module;

use Symfony\Component\EventDispatcher\Event;

/**
 * Event class to dispatched from the LearnModuleSalutation service.
 */

class LearnModuleEvent extends Event
{
    const EVENT = 'learn_module.salutation_event';

    /**
     * The salutation message.
     * @var string
     */
    protected $message;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setValue($message)
    {
        $this->message = $message;
    }
}