<?php

namespace oangia\OAuth;

use oangia\CUrl\CUrl;
use oangia\OAuth\Exceptions\TokenInvalidException;

class Google {
    public function getInfo( $access_token ) {
        # v1 https://www.googleapis.com/plus/v1/people/me?access_token=
        $url = 'https://www.googleapis.com/oauth2/v1/tokeninfo?access_token=' . $access_token;
        $curl = new CUrl;
        $info = json_decode($curl->connect('GET', $url), true);
        return $this->parse($info);
    }

    private function parse($info)
    {
        if (isset($info['error']) || ! isset($info['id'])) {
            throw new TokenInvalidException('Access token invalid');
        }
        $info['email'] = isset($info['emails']) && isset($info['emails'][0]['value']) ? $info['emails'][0]['value'] : null;
        return $info;
    }
}