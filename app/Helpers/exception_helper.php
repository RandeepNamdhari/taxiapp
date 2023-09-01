<?php

use CodeIgniter\Database\Exceptions\DatabaseException;


if (!function_exists('run_with_exceptions')) {
    function run_with_exceptions(Closure $callback,$returnType=null)
    {
        try {

          
            return $callback();


        } catch (\Throwable $e) {
            
          log_message('error', $e->getMessage());

          $arrayResponse=array('status'=>0,'development_error_message'=>$e->getMessage(),'type'=>'warning');

        }

         catch (\Exception $e) {

          log_message('error', $e->getMessage());


            $arrayResponse=array('status'=>0,'development_error_message'=>$e->getMessage(),'type'=>'warning');

          
        }

         catch (\PDOException $e) {

          log_message('error', $e->getMessage());


            $arrayResponse=array('status'=>0,'development_error_message'=>$e->getMessage(),'type'=>'warning');

           
        }

        catch (DatabaseException $e) {

          log_message('error', $e->getMessage());


            $arrayResponse=array('status'=>0,'development_error_message'=>$e->getMessage(),'type'=>'warning');

         
        }

        if(isset($arrayResponse['development_error_message']) && $returnType=='array'):

            $arrayResponse['message']=$arrayResponse['development_error_message'];

            return $arrayResponse;

        elseif(isset($arrayResponse['development_error_message'])):

            return false;

        endif;
        
    }

 
}
