<?php
namespace Jme\Symfony\Component;

use Symfony\Component\HttpFoundation\Response;

class JsonResponse extends Response
{
    /**
     * @param string $content
     * @param int $status
     * @param array $headers 
     */
    public function __construct($content, $status = 200, array $headers = array() )
    {
        parent::__construct($content, $status, $headers);
        
        $this->headers->set('Content-Type', 'application/json');
    }
}