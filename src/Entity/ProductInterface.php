<?php 

namespace Drupal\learn_module\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

use EntityChangedTrait;

/**
 * Represents a Product entity.
 */
interface ProductInterface extends ContentEntityInterface, EntityChangedInterface 
{
    /**
     * Gets the Product name
     * 
     * @return string
     */
    public function getName();

    /**
     * Sets the product name.
     * 
     * @param string $name
     * 
     * @return \Drupal\learn_module\Entity\ProductInterface
     *      The called product Entity
     */
    public function setName ($name);

    /**
     * Gets the product number 
     * 
     * @return int
     */
    public function getProductNumber();

    /**
     * Sets the product number
     * 
     * @param int $number
     * 
     * @return \Drupal\learn_module\Entity\ProductInterface
     *      the called entity 
     * 
     */
    public function setProductNumber($number);

    /** 
     * Gest the product remoter ID
     * 
     * @return string
     * 
     */
    public function getProductRemoteId();

    /**
     * Sets the product remote ID
     * 
     * @param string $id
     * 
     * @return \Drupal\learn_module\Entity\ProductInterface
     *      called the product entity
     */
    public function setProductRemoteId($id);

    /**
     * Gets the product source
     * 
     * @return string
     */

     public function getProductSource();

    /**
     * Sets the product source.
     * 
     * @param string $source
     * 
     * @return \Drupal\learn_module\Entity\ProductInterface
     * 
     * 
     */
    public function setProductSource($source);

    /** 
     * Gets the product creation timestamp.
     * 
     * @return int
     */
    public function getCreatedTime();

    /**
     * Sets the product creation timestamp
     * 
     * @param int $timestamp
     * 
     * @return \Drupal\learn_module\Entity\ProductInterface
     */
    public function setCreatedTime($timestamp);

}