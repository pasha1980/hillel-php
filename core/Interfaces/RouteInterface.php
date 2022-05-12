<?php

namespace Aigletter\Framework\Interfaces;

interface RouteInterface
{
    public function route(string $uri): callable;
}