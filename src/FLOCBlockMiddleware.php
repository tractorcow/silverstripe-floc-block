<?php

namespace TractorCow\SilverStripeFLOCBlock;

use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\HTTPResponse;
use SilverStripe\Control\Middleware\HTTPMiddleware;
use SilverStripe\Core\Environment;

class FLOCBlockMiddleware implements HTTPMiddleware
{
    protected function getEnabled()
    {
        $enabled = Environment::getEnv('SS_FLOC_BLOCK') ?: 'true';
        return strcasecmp($enabled, 'true') === 0;
    }

    public function process(HTTPRequest $request, callable $delegate)
    {
        /** @var HTTPResponse $result */
        $result = $delegate($request);

        if ($this->getEnabled()) {
            // Inject new header
            $policy = $result->getHeader('permissions-policy');
            $newPolicy = $policy
                ? "{$policy}, interest-cohort=()"
                : 'interest-cohort=()';
            $result->addHeader('permissions-policy', $newPolicy);
        }

        return $result;
    }
}
