<?php

class HttpCall {
  public static function get($url, $data = null) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, self::buildGetUrl($url, $data));
    curl_setopt($ch, CURLOPT_HTTPHEADER,[
        "X-API-KEY: PHPApp"
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
  }

  private static function buildGetUrl($url, $data = null) {
    if ($data) {
      $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    return $url;
  }
}

?>