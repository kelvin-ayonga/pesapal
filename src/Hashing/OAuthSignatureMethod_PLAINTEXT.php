<?php

namespace Kelvinlogic\Pesapal\Hashing;

use Kelvinlogic\Pesapal\Utility\OAuthUtil;


/**
 * Class OAuthSignatureMethod_PLAINTEXT
 *
 * @package Kelvinlogic\Pesapal\Hashing
 */
class OAuthSignatureMethod_PLAINTEXT extends OAuthSignatureMethod
{
    /**
     * @return string
     */
    public function get_name()
    {
        return "PLAINTEXT";
    }

    /**
     * @param $request
     * @param $consumer
     * @param $token
     *
     * @return mixed
     */
    public function build_signature($request, $consumer, $token)
    {
        $sig = [
            OAuthUtil::urlencode_rfc3986($consumer->secret),
        ];

        if ($token) {
            array_push($sig, OAuthUtil::urlencode_rfc3986($token->secret));
        } else {
            array_push($sig, '');
        }

        $raw = implode("&", $sig);
        // for debug purposes
        $request->base_string = $raw;

        return OAuthUtil::urlencode_rfc3986($raw);
    }
}