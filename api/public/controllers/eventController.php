<?php
namespace controllers;
use Psr\Container\ContainerInterface;

    Class EventController
    {
        protected $container;

        public function __construct(ContainerInterface $container) {
            $this->container = $container;
        }

        public static function test($request, $response, $args) {
            $response->getBody()->write("Hello world2!");
            return $response;
        }
    }


?>