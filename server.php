<?php
include 'config.php';
$server = stream_socket_server(sprintf('tcp://%s:%d', HOST, SERVER_DEBUG_PORT), $errno, $errstr);

if (!$server) {
  echo "$errstr ($errno)\n";
} else {
  while ($conn = stream_socket_accept($server, 600)) {
    $request = fread($conn, 1024);

    preg_match('/GET (.*?) HTTP/', $request, $matches);
    $url = $matches[1];

    $queryString = parse_url($url, PHP_URL_QUERY);

    if ($queryString) {
      echo "Event: $queryString\n";
    }

    fwrite($conn, "HTTP/1.1 200 OK\r\nContent-Type: text/plain\r\n\r\nOK\n");
    fclose($conn);
  }

  fclose($server);
}
