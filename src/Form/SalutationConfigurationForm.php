<?php

namespace Drupal\learn_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * configuration form definition for the salutation message
 */
class SalutationConfigurationForm extends ConfigFormBase {
    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames()
    {
        return ['learn_module.custom_salutation'];
    }
    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'salutation_configuration_form';
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $config = $this->config('learn_module.custom_salutation');
        $form['message'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Message de salutation'),
            '#description' => $this->t('Entrez une salutation s\'il vous plait'),
            '#default_value' => $config->get('message'),
        );
        return parent::buildForm($form, $form_state);
    }
    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $this->config('learn_module.custom_salutation')
            ->set('message', $form_state->getValue('message'))
            ->save();
        parent::submitForm($form, $form_state);
    }
    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        $message = $form_state->getValue('message');
        if (strlen($message) > 26) {
            $form_state->setErrorByName('message', $this->t('Le message de salutation est trop long, la limite requise est de 26 carractère'));
        }
    }
}