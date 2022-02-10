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
    $time = new \DateTime();
    kint((int) $time->format('G'));
    if ((int) $time->format('G') >= 00 && (int) $time->format('G') < 12) {
      return $this->t('Good morning world');
    }
    if ((int) $time->format('G') >= 12 && (int) $time->format('G') < 18) {
      return $this->t('Good afternoon world');
    }
    if ((int) $time->format('G') >= 18) {
      return $this->t('Good evening world');
    }
  }
}
