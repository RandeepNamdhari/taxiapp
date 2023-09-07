<?php

use CodeIgniter\Database\Exceptions\DatabaseException;


if (!function_exists('run_with_exceptions')) {
    function run_with_exceptions(Closure $callback,$returnType=null)
    {
        try {

          
            return $callback();


        } catch (\Throwable $e) {
            
          log_message('error', $e->getMessage());

          $arrayResponse=array('status'=>0,'development_error_message'=>$e->getMessage(),'type'=>'warning','object'=>$e);

        }

         catch (\Exception $e) {

          log_message('error', $e->getMessage());


            $arrayResponse=array('status'=>0,'development_error_message'=>$e->getMessage(),'type'=>'warning','object'=>$e);

          
        }

         catch (\PDOException $e) {

          log_message('error', $e->getMessage());


            $arrayResponse=array('status'=>0,'development_error_message'=>$e->getMessage(),'type'=>'warning','object'=>$e);

           
        }

        catch (\DatabaseException $e) {

          log_message('error', $e->getMessage());


            $arrayResponse=array('status'=>0,'development_error_message'=>$e->getMessage(),'type'=>'warning','object'=>$e);

         
        }
         catch (ErrorException $e) {

          log_message('error', $e->getMessage());


            $arrayResponse=array('status'=>0,'development_error_message'=>$e->getMessage(),'type'=>'warning','object'=>$e);

         
        }
        

        if(isset($arrayResponse['development_error_message'])):

           if (ENVIRONMENT === 'development'):

            $arrayResponse['message']=$arrayResponse['development_error_message'];

        else:

            $arrayResponse['message']='Oops! Something went wrong.';

            unset($arrayResponse['object']);


            endif;

            return $arrayResponse;

        endif;
        
    }

 
}
