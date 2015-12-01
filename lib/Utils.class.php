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

    public static function cleanInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

// END /lib/Utils.class.php
