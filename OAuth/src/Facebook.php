<?php

namespace oangia\OAuth;

use oangia\CUrl\CUrl;
use oangia\OAuth\Exceptions\TokenInvalidException;

class Facebook {
    public function getGraph(
    	$access_token,
    	$fields = 'id,name,about,email,picture{url}'
	) {
        $url = 'https://graph.facebook.com/me?fields=' . $fields . '&access_token=' . $access_token;
        $curl = new CUrl();
        $graph = json_decode($curl->connect('GET', $url), true);
        return $this->parse($graph); 
    }

    private function parse($graph)
    {
        if (isset($graph['error']) || ! isset($graph['id'])) {
            throw new TokenInvalidException('Access token invalid');
        }
        $graph['email'] = isset($graph['email'])? :null;
        return $graph;
    }
}