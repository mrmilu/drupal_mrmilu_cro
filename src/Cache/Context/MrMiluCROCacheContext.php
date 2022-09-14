<?php

namespace Drupal\mrmilu_cro\Cache\Context;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\Context\CacheContextInterface;
use Drupal\mrmilu_cro\Helper\CROHelper;

class MrMiluCROCacheContext implements CacheContextInterface {

  public static function getLabel() {
    return t('CRO Cache Context');
  }

  public function getContext() {
    return CROHelper::getCookieContext();
  }

  public function getCacheableMetadata() {
    return new CacheableMetadata();
  }
}
