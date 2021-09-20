<?php

namespace App\Helpers; 

class Helper {

    public static function getURL() {
        // return 'This works';

        $req_uri = $_SERVER['REQUEST_URI'];
        $path = substr($req_uri,0,strrpos($req_uri,'horizontal-light-menu'));

        return $path . "horizontal-light-menu";
    }

    public static function setTitle($page_name) {
    
        // echo $page_name;

        $admin_name = '| CORK - Multipurpose Bootstrap Dashboard Template';

        if ($page_name === 'sales') :
            echo 'Sales Admin ' . $admin_name;
        endif;
    }

    public static function set_breadcrumb($page_name, $category_name) {
        
        $category = ucfirst($category_name);
        
        $removeUnderscore = str_replace('_', ' ', $page_name);

        $removeDash = str_replace('-', ' ', $removeUnderscore);

        $page = ucwords($removeDash);

        if ($page_name === 'sales') :
            // echo 'Sales Admin ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        endif;
    }

    public static function scrollspy($offset) {
        echo 'data-target="#navSection" data-spy="scroll" data-offset="'. $offset . '"';
    }
}












