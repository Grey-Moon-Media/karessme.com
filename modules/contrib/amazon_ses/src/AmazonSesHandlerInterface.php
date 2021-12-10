<?php

namespace Drupal\amazon_ses;

/**
 * Interface for the Amazon SES handler.
 */
interface AmazonSesHandlerInterface {

  /**
   * Send an email using the AWS SDK.
   *
   * @param array $message
   *   An array of message data.
   *
   * @return string|bool
   *   The message ID tf successful, or FALSE if an error occurs.
   */
  public function send(array $message);

  /**
   * Get verified identities.
   *
   * @return array
   *   An array of verified indentities.
   */
  public function getIdentities();

  /**
   * Verify an identity.
   *
   * @param string $identity
   *   The identity to verify.
   * @param string $type
   *   The type of the identity, domain or email.
   */
  public function verifyIdentity($identity, $type);

  /**
   * Delete a verified identity.
   *
   * @param string $identity
   *   The identity to delete.
   */
  public function deleteIdentity($identity);

  /**
   * Get sending quota.
   *
   * @return array
   *   An array of quota information.
   */
  public function getSendQuota();

  /**
   * Get sending statistics.
   *
   * @return array
   *   An array of statistics.
   */
  public function getSendStatistics();

}
