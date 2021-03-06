<?php

declare (strict_types = 1);

namespace Mt\Action;

use Doctrine\Common\Cache\Cache;
use Fig\Http\Message\RequestMethodInterface;
use Fig\Http\Message\StatusCodeInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Expressive\Template\TemplateRendererInterface;

abstract class AbstractAction implements MiddlewareInterface, RequestMethodInterface, \Fig\Http\Message\StatusCodeInterface
{
    /**
     *
     * @var TemplateRendererInterface
     */
    protected $renderer;
    /**
     *
     * @var Cache
     */
    protected $cache;
    
    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }
    /**
     * Process an incoming server request and return a response, 
     * optionally delegating to the next middleware component to create the response.
     * 
     * @param Request $request
     * @param DelegateInterface $delegate
     * @return Response
     */
    public function process(Request $request, DelegateInterface $delegate) 
    {
        return $this->dispatch($request, $delegate);
    }
    
    abstract public function dispatch(Request $request, DelegateInterface $delegate): Response;
}