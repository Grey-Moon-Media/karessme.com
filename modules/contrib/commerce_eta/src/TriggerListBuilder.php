<?php

namespace Drupal\commerce_eta;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of Trigger entities.
 */
class TriggerListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Trigger');
    $header['id'] = $this->t('Machine name');
    $header['target_entity_type'] = $this->t('Target Entity Type');
    $header['cron_status'] = $this->t('Cron');
    $header['status'] = $this->t('Status');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /** @var \Drupal\commerce_eta\Entity\Trigger $entity */

    if ($entity->getStatus() == NULL || $entity->getStatus() == FALSE) {
      $status = $this->t('Disabled');
    }
    else {
      $status = $this->t('Enabled');
    }

    if ($entity->getCronStatus() == NULL || $entity->getCronStatus() == FALSE) {
      $cron_status = $this->t('Disabled');
    }
    else {
      $cron_status = $this->t('Enabled');
    }

    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    $row['target_entity_type'] = $entity->getTargetEntityType();
    $row['cron_status'] = $cron_status;
    $row['status'] = $status;
    return $row + parent::buildRow($entity);
  }

}
