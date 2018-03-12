<?php


if (! function_exists('fooFormatText')) {
    /**
     * Format text.
     *
     * @param  string  $text
     * @return string
     */
    function fooFormatText($text){
        // Format text
        return $text;
    }
}





if (! function_exists('getSetting')) {
  
    function getSetting($key){


        $value = App\Model\Settings::where('meta_key', $key)->value('meta_value');
        return $value;
    }
}




if (! function_exists('getUserMenu')) {
  
    function getUserMenu($slug){

        return App\Http\Controllers\Admin\MenuController::getUserMenu($slug);
      
    }
}


if (! function_exists('getThumbnail')) {

    function getThumbnail($img_path, $width, $height, $type = "fit"){
        
        return app('App\Http\Controllers\ImageController')->getImageThumbnail($img_path, $width, $height, $type);
    }

}









?>