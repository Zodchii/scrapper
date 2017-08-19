<?php

/**
 * Created by PhpStorm.
 * User: Zodchii
 * Date: 8/19/2017
 * Time: 4:52 PM
 */
class Scrapper
{
    private $errors;
    private $videoId = '';
    private $downloadUrl = '';

    public function __construct()
    {
        if (!isset($_GET['url'])) {
            $this->setError('no params url');
        } else {
            $url = strip_tags($_GET['url']);
            if (strpos($url, 'youtube.com') !== FALSE) {
                $url = trim($url);
                parse_str(parse_url($url, PHP_URL_QUERY), $params);
                $this->videoId = $params['v'];
                $this->makeUrl();
            } else {
                $this->setError('bad params url');
                return false;
            }
        }
        return true;
    }

    private function makeUrl()
    {
        $this->downloadUrl = 'http://api.youtube6download.top/fetch/link.php?i=' . $this->videoId;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function setError($errorMsg)
    {
        $this->errors[] = $errorMsg;
    }

    public function getResponse()
    {
        $status = $this->getErrors() ? false : true;
        return json_encode([
            'status' => $status
            , 'errors' => $this->getErrors()
            , 'videoId' => $this->videoId
            , 'downloadUrl' => $this->downloadUrl
        ]);
    }

}