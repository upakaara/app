<?php

if (!function_exists('is_active')) {
    /**
     * Check if specified route or routes matches current route
     *
     * @param string|array $route
     * @return string
     */
    function is_active($route) {
        $route = is_array($route) ? $route : [$route];

        $active = (count(array_filter($route, function($item) {
            $type = request()->get("type");
            if($item === 'jobs' && $type === null) {
                return true;
            }
            return $item === $type;
        })) > 0);

        return ($active) ? 'active' : '';
    }
}