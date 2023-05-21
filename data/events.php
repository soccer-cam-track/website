<?php

$dir = __dir__ . "/events";
$events = [];

foreach (scandir($dir) as $f) {
    if ($f == "." || $f == "..") continue;
    $name = explode(".", $f)[0];

    $events[$name] = include($dir . "/" . $f);
    $events[$name]["tag"] = $name;
}

return $events;
