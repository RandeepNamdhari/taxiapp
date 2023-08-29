<?php

if (!function_exists('isLoggedIn')) {
    function isLoggedIn(): Bool
    {
    
        $user=session('user');

        return isset($user['id'])?true:false;
            
    }

 
}
