<?php 

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PermissionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Your filter logic before the controller method is executed.
        $permissions = $arguments;

        $response=\App\Models\UserRoleModel::hasPermission($permissions);
       
        if(isset($response['access']) && $response['access']):

        else:

            echo 'access denied.You have not permission for the action.';

       //     echo '<pre>';print_r($response);die;
           //   return redirect()->to('admin/login');
        endif;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Your filter logic after the controller method is executed.
    }
}
