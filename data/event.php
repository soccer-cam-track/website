<?php

$events = include(__DIR__ . "/events.php");

$event_name = $_GET["e"] ?? null;

if (isset($events[$event_name])) {
    return ["event" => $events[$event_name]];
} else {
    die();
}
