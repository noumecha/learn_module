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
        return [
            #static::SETTINGS
            'learn_module.settings'
        ];
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
        $config = $this->config('learn_module.settings');
        $form['salutation'] = array(
            '#type' => 'textfield',
            '#description' => $this->t('Entrez le message de salutation ! (20carractères max)'),
            '#title' => $this->t('Salutation'),
            '#default_value' => $config->get('learn_module.salutation') !== null ? $config->get('learn_module.salutation')  : 'test',
        );
        $form['salutation_name'] = array(
            '#type' => 'textfield',
            '#description' => $this->t('Entrez votre nom ! (20carractères max)'),
            '#title' => $this->t('Salutation Name'),
            '#default_value' => $config->get('learn_module.salutation_name') !== null ? $config->get('learn_module.salutation_name')  : 'noumel',
        );
        $form['salutation_id'] = array(
            '#type' => 'number',
            '#description' => $this->t('Entrez l\'id'),
            '#title' => $this->t('Salutation Id'),
            '#default_value' => $config->get('learn_module.salutation_id') !== null ? $config->get('learn_module.salutation_id')  : rand(10,1000),
        );
        //dump($config);
        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     * this is for submiting the form after be fill
     * his work is to get the value in the field
     * save it & show successfull message to the user
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $this->config('learn_module.settings')
            ->set('salutation', $form_state->get('learn_module.salutation'))
            ->set('salutation_name', $form_state->get('learn_module.salutation_name'))
            ->set('salutation_id', $form_state->get('learn_module.salutation_id'))
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
        if (strlen($salutation) > 20)
            $form_state->setErrorByName('salutation', $this->t('Le message de salutation est trop long !'));
        if (strlen($salutation) < 4)
            $form_state->setErrorByName('salutation', $this->t('Le message de salutation est trop court (4 carractère minimum) !'));
        if (strlen($form_state->getValue('salutation_name')) > 26)
            $form_state->setErrorByName('salutation_name', $this->t('Votre nom est trop long !'));
        if (strlen($form_state->getValue('salutation_name')) < 3)
            $form_state->setErrorByName('salutation_name', $this->t('Votre nom est trop court (3 carractère minimum)!'));

    }
}