<?php
if (!function_exists('formatNumber')) {
    function formatNumber($n)
    {
        if ($n < 1000) return $n;
        $suffix = ['', 'k', 'M', 'G', 'T', 'P', 'E', 'Z', 'Y'];
        $power = floor(log($n, 1000));
        return round($n / (1000 ** $power), 1, PHP_ROUND_HALF_EVEN) . $suffix[$power];
    }
}
