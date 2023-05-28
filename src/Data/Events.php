<?php

namespace App\Data;

class Events
{
    static function getEvents(): array
    {
        $dir = __dir__ . "/../../events";
        $events_by_date = [];

        foreach (scandir($dir) as $f) {
            if ($f == "." || $f == "..") continue;
            $name = explode(".", $f)[0];
            $data = include($dir . "/" . $f);
            $data["tag"] = $name;

            $events_by_date[$data["date_start"]] = $data;
        }

        ksort($events_by_date);
        $events = [];
        foreach ($events_by_date as $event) {
            $events[$event["tag"]] = $event;
        }
        $events = array_reverse($events, true);

        return $events;
    }
}
