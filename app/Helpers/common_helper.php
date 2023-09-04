<?php
   global $colors;  

   $colors=array('A'=>'lightgreen',
                 'B'=>'brown',
                 'C'=>'red',
                 'D'=>'orange',
                 'R'=>'gray');

if (!function_exists('randomColor')) {
    function randomColor(string $string): string
    {
       
        return $GLOBALS['colors'][strtoupper(mb_substr($string, 0, 1))];
        

            
    }

 
}