<?php

namespace ExternalApi;

use Infrastructure\Request;
use Infrastructure\Response;

interface ControllerInterface
{
    public function handle(Request $request): Response;
}
