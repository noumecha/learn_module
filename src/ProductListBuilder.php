<?php 

namespace Drupal\learn_module;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\link;
use Drupal\Core\Url;

/**
 * EntityListBuilder Interface corresponding to 
 * the product entity list
 */

class ProductEntityListBuilder extends EntityListBuilder {

    /**
     * @inheritdoc
     */

    public function buildHeader()
    {
        $header['id'] = $this->t('Product ID');
        $header['name'] = $this->t('Product Name');
        return $header + parent::buildHeader();
    }

    /**
     * @inheritdoc
     */
    public function buildRow(EntityInterface $entity)
    {
        /* @var $entity \Drupal\learn_module\Entity\Product */
        $row['id'] = $entity->id();
        $row['name'] = $entity->toLink();

        return $row + parent::buildRow($entity);
    }

}