<?php

namespace App\Helpers;

class HttpClient
{
    private static $defualtHeaders = array(
        CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET'
    );

    /**
     * Undocumented function
     *
     * @param string $url
     * @param array? $headers
     * @return string
     */
    public static function request($url, $headers = null) : string | bool
    {
        $ch = curl_init($url);
        $newHeaders = !empty($headers) ?
            array_replace(self::$defualtHeaders, $headers) :
            self::$defualtHeaders;

        curl_setopt_array($ch, $newHeaders);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        return  !empty($error) ? json_encode([
            "error" => $error
        ]) :
        $response ?? false;
    }

}
