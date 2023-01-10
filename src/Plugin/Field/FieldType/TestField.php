<?php

# adding the namespace
namespace Drupal\learn_module\Plugin\Field\FieldType;

#uses: 
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Provides a field type of TestField.
 * 
 * @FieldType(
 *   id = "test_field",
 *   description = @Translation("Simple test field type"),
 *   label = @Translation("Test Field"),
 *   default_formatter = "test_field_formatter",
 *   default_widget = "test_field_widget",
 * )
 */

class TestField extends FieldItemBase {

    /**
    * {@inheritdoc}
    */
    public static function schema(FieldStorageDefinitionInterface $field_definition) {
        return [
        // columns contains the values that the field will store
            'columns' => [
                // List the values that the field will save. This
                // field will only save a single value, 'value'
                'value' => [
                    'type' => 'text',
                    'size' => 'tiny',
                    'not null' => FALSE,
                ],
                'icon-f' => [
                    'value' => ' fab fa-twitter ',
                    'link' => '#',
                    'size' => 'tiny',
                    'text' => ' Twitter ',
                    'label' => ' Icon twitter ',
                    'show_text' => FALSE,
                    'class' => 'socials-item'
                ]
            ],
        ];
    }

    /**
    * {@inheritdoc}
    */
    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
        $properties = [];
        $properties['value'] = DataDefinition::create('string')->setLabel(t('Value value'));
        $properties['icon-f'] = DataDefinition::create('string')->setLabel(t('Icon-f value'));
    
        return $properties;
    }

    /**
    * {@inheritdoc}
    */
    public function isEmpty() {
        $value = $this->get('value')->getValue();
        return $value === NULL || $value === '';
    }

    /**
    * {@inheritdoc}
    */
    public static function defaultFieldSettings() {
        return [
        // Declare a single setting, 'size', with a default
        // value of 'large'
        'size' => 'large',
        ] + parent::defaultFieldSettings();
    }

}