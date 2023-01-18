<?php 

namespace Drupal\learn_module;

use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Prepares the salutation to the world with service.
 */
class LearnModuleFirstService 
{
    use StringTranslationTrait;
    /**
     * Returns the salutation
     */
    public function getSalutation() {
        $time = new \DateTime();
        //$user = \Drupal::currentUser();
        $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
        // morning
        if ((int) $time->format('G') >= 00 && (int) $time->format('G') < 12) {
            return $this->t('<center> Good morning '.$user->get('name')->value.'</center>');
        }
        // afternoon
        if ((int) $time->format('G') > 12 && (int) $time->format('G') < 18) {
            return $this->t('<center> Good afternoon '.$user->get('name')->value.'</center>');
        }
        // evening
        if ((int) $time->format('G') >= 18) {
            return $this->t('<center> Good evening '.$user->get('name')->value.'</center>');
        }
    }
}