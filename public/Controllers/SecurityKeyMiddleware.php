<?php

namespace App\Controllers;

use League\Route\Http\Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SecurityKeyMiddleware implements MiddlewareInterface
{

    /**
     * @throws \Exception
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $securityId = $request->getHeaderLine('SecurityKey');
        if ($securityId!= 51){
            throw new Exception\UnauthorizedException('mauvaise clé');
        }
        return $handler->handle($request);
    }
}
