<?php

namespace Drupal\mrmilu_cro\Helper;

use Drupal\Core\Site\Settings;

class CROHelper {
  protected $enabled;

  public function __construct() {
    $this->enabled = Settings::get('CRO_ENABLED') ?? FALSE;
  }

  public static function getCookieContext() {
    $cookieContext =& drupal_static('cookie_context');
    if ($cookieContext !== NULL) {
      return $cookieContext;
    }
    if (self::getSessionCookie()) {
      $cookieContext = self::getSessionCookie();
      return $cookieContext;
    }
  }

  public function isEnabled() {
    return $this->enabled;
  }

  public function hasSessionCookie($request) {
    return $this->getSessionCookie($request) !== NULL;
  }

  public static function getSessionCookie($request = NULL) {
    if ($request == NULL) $request = \Drupal::request();
    return $request->cookies->get(Settings::get('CRO_EXPERIMENT_COOKIE_NAME'));
  }

  public function setSessionCookie() {
    $cookieContext =& drupal_static('cookie_context');
    if ($cookieContext !== NULL) {
      return $cookieContext;
    }
    $cookieContext = $this->getRandomVariant();
    setcookie(Settings::get('CRO_EXPERIMENT_COOKIE_NAME'), $cookieContext, time() + Settings::get('CRO_EXPERIMENT_COOKIE_SECONDS'));
  }

  public function getRandomVariant() {
    $variants = Settings::get('CRO_EXPERIMENT_VARIANTS');
    $variants_length = count($variants) - 1;
    $random_variant = rand(0, $variants_length);
    return $variants[$random_variant];
  }
}
