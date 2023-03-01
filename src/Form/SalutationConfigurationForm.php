<?php

namespace Drupal\learn_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * configuration form definition for the salutation message
 * for adding some great way to our first controller
 */
class SalutationConfigurationForm extends ConfigFormBase {
    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames()
    {
        return ['learn_module.greeting_message'];
    }
    /**
     * {@inheritdoc}
     * get the unique id for the form
     * this function is required
     */
    public function getFormId() {
        return 'salutation_configuration_form';
    }
    /**
     * {@inheritdoc}
     * this function is for building the form field
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $config = $this->config('learn_module.greeting_message');
        //dump($config);
        $form['salutation'] = array(
            '#type' => 'textfield',
            '#description' => $this->t('Entrez le message de salutation ! (20carractères max)'),
            '#title' => $this->t('Salutation'),
            '#default_value' => /*'hello',*/$config->get('salutation'),
        );

        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     * this is for sumbittins the form after be fill
     * his work is to get the value in the field
     * save it & show successfull message to the user
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $this->config('learn_module.greeting_message')
            ->set('salutation', $form_state->get('salutation'))
            ->save();
        parent::submitForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     * this function help us to validate the form & handling errors
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        $salutation = $form_state->getValue('salutation');
        if (strlen($salutation) > 20) {
            $form_state->setErrorByName('salutation', $this->t('Le message de salutation est trop long !'));
        }
    }
}