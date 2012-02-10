<?php
namespace Jme\Symfony\JmeSymfonyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController,
    Jme\Symfony\Component\JsonResponse;


class Controller extends BaseController
{
    /**
     *
     * @param array $errors
     * @param array $data 
     * @param int $status http statuscode
     * 
     * @return Response
     */
    public function jsonErrorResponse(array $errors, array $data = array(), $status = 403 )
    {
        $arr = array(
            'status' => 'FAIL',
            'errors' => $errors,
            'data'   => $data,
        );
        
        $response = new JsonResponse(json_encode($arr), $status);
        
        return $response;
    }
    
    /**
     *
     * @param array $data 
     * 
     * @return Response
     */
    public function jsonSuccessResponse(array $data = array() )
    {
        $arr = array(
            'status' => 'SUCCESS',
            'data'   => $data,
        );
        
        $response = new JsonResponse(json_encode($arr), 200);
        
        return $response;
    }
}