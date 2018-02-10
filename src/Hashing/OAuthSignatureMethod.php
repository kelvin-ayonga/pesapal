<?php

namespace Kelvinlogic\Pesapal\Hashing;


/**
 * Class OAuthSignatureMethod
 *
 * @package Kelvinlogic\Pesapal\Hashing
 */
class OAuthSignatureMethod
{
    /**
     * @param $request
     * @param $consumer
     * @param $token
     * @param $signature
     *
     * @return bool
     */
    public function check_signature(&$request, $consumer, $token, $signature)
    {
        $built = $this->build_signature($request, $consumer, $token);

        return $built == $signature;
    }
}