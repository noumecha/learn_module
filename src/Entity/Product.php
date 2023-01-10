<?php 

namespace Drupal\learn_module\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * 
 * Define the Product entity 
 * for learning purposes
 * 
 * @ContentEntityType (
 *      id = "product",
 *      label = @Translation("Product"), 
 *      handlers = {
 *          "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *          "list_builder" = "Drupal\learn_module\ProductListBuilder",
 *          
 *          "form" = {
 *              "default" = "Drupal\learn_module\Form\ProductForm",
 *              "add" = "Drupal\learn_module\Form\ProductForm",
 *              "edit" = "Drupal\learn_module\Form\ProductForm",
 *              "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *          },
 *          "route_provider" = {
 *              "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *          }
 *      },
 *      base_table = "product",
 *      admin_permission = "administer site configuration",
 *      entity_keys = {
 *          "id" = "id",
 *          "label" = "label",
 *          "uuid" = "uuid",
 *      },
 *      links = {
 *          "canonical" = "/admin/structure/product/{product}",
 *          "add-form" = "/admin/structure/product/add",
 *          "edit-form" = "/admin/structure/product/{product}/edit",
 *          "delete-form" = "/admin/structure/product/{product}/delete",
 *          "collection" = "/admin/structure/product",
 *      }
 * )
 * 
 */

class Product extends ContentEntityBase implements ProductInterface {

    /**
     * @inheritdoc
     * 
     */
    public function getName() {
        return $this->get('name')->value;
    }
    /**
     * @inheritdoc
     * 
     */
    public function setName($name) {
        $this->set('name', $name);
        return $this;
    }
    /**
     * @inheritdoc
     * 
     */
    public function getProductNumber() {
        return $this->get('number')->value;
    }
    /**
     * @inheritdoc
     * 
     */
    public function setProductNumber($number) {
        $this->set('number', $number);
        return $this;
    }
    /**
     * @inheritdoc
     * 
     */
    public function getProductRemoteId() {
        return $this->get('remote_id')->value;
    }
    /**
     * @inheritdoc
     * 
     */
    public function setProductRemoteId($id) {
        $this->set('remote_id', $id);
        return $this;
    }
    /**
     * @inheritdoc
     * 
     */
    public function getProductsource() {
        return $this->get('source')->value;
    }
    /**
     * @inheritdoc
     * 
     */
    public function setProductSource($source) {
        $this->set('source', $source);
        return $this;
    }

    /**
     * @inheritdoc
     * 
     */
    public function getCreatedTime () {
        return $this->get('created')->value;
    }
    /**
     * @inheritdoc
     * 
     */
    public function setCreatedTime($timestamp) {
        $this->set('created', $timestamp);
        return $this;
    }
    /**
     * definitions of the fields of the Entity
     */
    public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
    {
        $fields = parent::baseFieldDefinitions($entity_type);   
        
        $fields["name"] = BaseFieldDefinition::create('string')
        ->setLabel(t('Product Name'))
        ->setDescription(t('the name of the product'))
        ->setSettings([
            'max_length' => 255,
            'text_processing' => 0,
        ])
        ->setDefaultValue('')
        ->setDisplayOptions('view', [
            'label' => 'hidden',
            'type' => 'string',
            'weight' => '-4',
        ])
        ->setDisplayOptions('form', [
            'type' => 'string_textfield',
            'weight' => '-4',
        ])
        ->setDisplayConfigurable('form', TRUE)
        ->setDisplayConfigurable('view', TRUE);

        $fields['number'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('Number'))
            ->setDescription(t('The product number'))
            ->setSettings(
                [
                    'min' => 1,
                    'max' => 10000
                ]
            )
            ->setDefaultValue(NULL)
            ->setDisplayOptions('view', [
                'label' => 'above',
                'type' => 'number_unformatted',
                'weight' => -4,
            ])
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('form', TRUE);
        $fields['remote_id'] = BaseFieldDefinition::create('string')
            ->setLabel(t('Remote ID'))
            ->setDescription(t('The product remote id'))
            ->setSettings([
                'max_length' => 255,
                'text_processing' => 0,
            ])
            ->setDefaultValue('');
        $fields['source'] = BaseFieldDefinition::create('string')
            ->setLabel(t('Source'))
            ->setDescription(t('The source of the product'))
            ->setSettings([
                'max_length' => 255,
                'text_processing' => 0,
            ])
            ->setDefaultValue('');
        $fields['created'] = BaseFieldDefinition::create('created')
            ->setLabel(t('Created'))
            ->setDescription(t('The time that the entity was created'));
        $fields['changed'] = BaseFieldDefinition::create('changed')
            ->setLabel(t('Changed'))
            ->setDescription(t('The time that the entity was last edited'));

        return $fields;
    }

}