<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

if (!function_exists('cms_namespace')) {
    
    function cms_namespace($path=""){

        return str_replace(DIRECTORY_SEPARATOR, '\\', sprintf("\\Tall\\Cms\\%s", $path));
    }
}

if (!function_exists('cms_path')) {
    
    function cms_path($path=""){

        return str_replace(["\\","/","//"], DIRECTORY_SEPARATOR, sprintf("%s/%s", __DIR__, $path));
    }
}

if (!function_exists('cms_core_path')) {
    
    function cms_core_path($path=""){

        return cms_path(sprintf("src/%s", $path));
    }
}

if (!function_exists('cms_route_path')) {
    
    function cms_route_path($path=""){

        return cms_path(sprintf("routes/%s", $path));
    }
}

if (!function_exists('cms_resources_path')) {
    
    function cms_resources_path($path=""){

        return cms_path(sprintf("resources/%s", $path));
    }
}

if (!function_exists('cms_database_path')) {
    
    function cms_database_path($path=""){

        return cms_path(sprintf("databese/%s", $path));
    }
}

if (!function_exists('livewire')) {
    
    function livewire($hint, $component="-component"){

        return sprintf("tall::%s%s",$hint, $component);
    }
}