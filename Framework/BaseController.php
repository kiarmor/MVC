<?php

namespace Framework;

abstract class BaseController
{
    protected function render($template, array $params = [])
    {
        extract($params);
        $folder = str_replace(['Controller', '\\'], '', get_class($this));
        ob_start();
        require_once VIEW_DIR . $folder . DS . $template;

       return ob_get_clean();
    }
}