<?php
namespace lyricsovh;

abstract class LyricsAPI {
    const URL = "https://api.lyrics.ovh";
    const VERSION = "v1";

    public static function search($artist, $title) {
        // $url/$version/$artist/$title
        $url = sprintf("%s/%s/%s/%s",
            LyricsAPI::URL, LyricsAPI::VERSION, urlencode($artist), urlencode($title));

        // get request met cUrl
        $options = array(
            CURLOPT_URL=>$url,
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_CONNECTTIMEOUT=>5,
            CURLOPT_TIMEOUT=>5,
        );
        $curl = curl_init();
        curl_setopt_array($curl, $options);
        if(!$response = curl_exec($curl)) {
            switch (curl_errno($curl)) {
                case 28: //
                    throw new TimeoutException(curl_error($curl), 1);
                    break;
                default: // curl error
                    throw new APIException(curl_error($curl), 1);
                    break;
            }
        } else {
            // Return json reponse
            return $response;
        }
        curl_close($curl);

        throw new LyricsNotFoundException("Lyrics niet gevonden!", 1);
    }
}

class APIException extends \Exception {}

class TimeoutException extends \Exception {}

// Wanneer er geen lyrics gevonden worden
class LyricsNotFoundException extends \Exception {}