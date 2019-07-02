<?php

namespace Framework;

abstract class BaseController
{
    protected function render($template, array $params = [])
    {
        extract($params);
        //get folder path
        $folder = str_replace(['Controller', '\\'], '', get_class($this));
        $template = VIEW_DIR . $folder . DS . $template;

        if (!file_exists($template)){
            throw new \Exception ("{$template} not found");
        }

        ob_start();
        require_once $template;
        return ob_get_clean();
    }
}