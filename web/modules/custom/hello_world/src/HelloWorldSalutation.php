<?php

namespace Drupal\hello_world;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\hello_world\HelloWorldSalutationInterface;

/**
 * Prepares the salutation to the world.
 */
class HelloWorldSalutation implements HelloWorldSalutationInterface {

  use StringTranslationTrait;

  /**
   * Returns the salutation
   */
  public function getSalutation() {
    $unixTime = time();
    $timeZone = new \DateTimeZone('Europe/London');

    $time = new \DateTime();
    $time->setTimestamp($unixTime)->setTimezone($timeZone);

    $formattedTime = $time->format('G');

    if ((int) $formattedTime >= 00 && (int) $formattedTime < 12) {
      return $this->t('Good morning world');
    }
    if ((int) $formattedTime >= 12 && (int) $formattedTime < 18) {
      return $this->t('Good afternoon world');
    }
    if ((int) $formattedTime >= 18) {
      return $this->t('Good evening world');
    }
  }
}
