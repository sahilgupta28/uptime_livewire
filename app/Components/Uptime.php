<?php

namespace App\Components;

use Exception;
use Http;

class Uptime
{
    public function start($url): bool | String
    {
        $output = false;
        try {
            $uptime = Http::get($url)->status();
            if (str_contains($uptime, '200')) {
                $output = true;
            }
        } catch (Exception $e) {
            $output = $e->getMessage();
        }
        return $output;
    }
}
