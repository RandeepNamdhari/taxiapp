<?php
 use App\Models\SystemSettingModel;

   global $colors;  

   $colors=array('A'=>'lightgreen',
                 'B'=>'brown',
                 'C'=>'red',
                 'D'=>'orange',
                 'R'=>'gray'
              );

if (!function_exists('randomColor')) {
    function randomColor(string $string): string
    {
       
       
        return $GLOBALS['colors'][strtoupper(mb_substr($string, 0, 1))]??'gray';
        

            
    }

 
}

if (!function_exists('system_setting')) {
    function system_setting(string $key)
    {
       
        $obj=new SystemSettingModel();

        return $obj->getSetting($key);

            
    }

 
}