<?php

namespace ExternalApi;

use Data\Repository\InsuranceRepositoryInterface;
use Infrastructure\Request;
use Infrastructure\Response;

class InsuranceController implements ControllerInterface
{
    public function __construct(private InsuranceRepositoryInterface $repository) {}

    public function handle(Request $request): Response
    {
        $result = $this->repository->getAll();

        $response = new Response();
        $response->setContent(json_encode($result));
        $response->setContentType('application/json');
        
        return $response;
    }
}
