<?php

if (!function_exists('isLoggedIn')) {
    function isLoggedIn(): Bool
    {
    
        $user=session('user');

        return isset($user['id'])?true:false;
            
    }

 
}

if (!function_exists('getUserId')) {
    function getUserId():int
    {
    
        $user=session('user');


        return $user['id']??0;
            
    }

 
}
