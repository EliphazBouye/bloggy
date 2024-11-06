<?php

namespace Bloggy\Core;

class Controller {
    public function  __construct() {}

    public function render(string $template_name, $params = []) {
        // Find view
        $dir = dirname(__DIR__, 1)."/View/";
        $template_path = $dir.$template_name.".php";

        // Render view from where view is
        if (file_exists($template_path)) {
            if (!empty($params)) {
                extract($params);

                ob_start();
            
                include $template_path;
                ob_get_flush();
            }
            
            
           
            //ob_clean();
        } else {
            throw new \Exception("Template not found: " . $template_name); 
        }

    }

}
