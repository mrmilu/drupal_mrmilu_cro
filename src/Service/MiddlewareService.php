<?php

namespace Drupal\mrmilu_cro\Service;

use Drupal\mrmilu_cro\Helper\CROHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class MiddlewareService implements HttpKernelInterface {

  protected $httpKernel;

  public function __construct(HttpKernelInterface $http_kernel) {
    $this->httpKernel = $http_kernel;
  }

  public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = TRUE) {
    $cro_helper = new CROHelper();
    if ($cro_helper->isEnabled()) {
      if (!$cro_helper->hasSessionCookie($request)) {
        $cro_helper->setSessionCookie();
      }
    }
    return $this->httpKernel->handle($request, $type, $catch);
  }
}
