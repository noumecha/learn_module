<?php 

namespace Drupal\learn_module\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupla\Core\Form\FormStateInterface;

/**
 * This for is use for Create Edit Entity product
 */

class ProductForm extends ContentEntityForm {

    /**
     * @inheritdoc
     */
    public function save (array $form, FormStateInterface $form_state) {

        $entity = $this->entity;

        $status = parrent::save($form, $form_state);

        switch ($status) {
            case SAVED_NEW:
                $this->messenger()->addMessage($this->t('Create the %label Product.',[
                    '%label' => $entity->label(),
                ]));
                break;
            default:
                $this->messenger()->addMessage($this->t('Saved the %label Product.',[
                    '%label' => $entity->label(),
                ]));
        }
        $form_state->setRebuildInfo('entity.product.canonical',['product' => $entity->id()]);
        
    }

}