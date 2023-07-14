<?php

namespace Drupal\learn_module;

use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * prepare the salutation to the world
 */
class LearnModuleSalutationService {

    use StringTranslationTrait;

    /**
     * returns the salutation
     */
    public function showSalutation() {
        $time = new \DateTime();
        if ((int) $time->format('G') >= 00 && (int) $time->format('G') < 12) {
            return $this->t('<h2><b>Good morning</b></h2>');
        }
        if ((int) $time->format('G') >= 12 && (int) $time->format('G') < 18) {
            return $this->t('<h2><b>Good afternoon</b></h2>');
        }
        if ((int) $time->format('G') >= 18) {
            return $this->t('<h2><b>Good evening</b></h2>');
        }
    }
}