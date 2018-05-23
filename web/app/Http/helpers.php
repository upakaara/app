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
          return $item === request()->get("type");
        })) > 0);

        return ($active) ? 'active' : '';
    }
}