<?php

class Utils 
{
    public static function dateFR2SQL($delimiter, $dateStr)
    {
        $parts = explode($delimiter, $dateStr);
        
        if (count($parts) < 3) {
            return $dateStr;
        }

        $tmp = $parts[0];
        $parts[0] = $parts[2];
        $parts[2] = $tmp;
        return implode('-', $parts);
    }

    public static function parseEvents(&$data)
    {
        if (!isset($data['events'])) {
            return;
        }

        foreach ($data['events'] as $eventId) {
            $data['event' . $eventId] = 1;
        }
        unset($data['events']);
    }
}

// END /lib/Utils.class.php
