<?php

namespace ExternalApi;

use Data\Repository\InsuranceRepositoryInterface;
use Infrastructure\Request;
use Infrastructure\Response;

class InsuranceController
{
    public function __construct(private InsuranceRepositoryInterface $repository) {}

    public function getOverview(Request $request): Response
    {
        // $result = $this->repository->getAll();

        // $response = new Response();
        // $response->setContent(json_encode($result));
        // $response->setContentType('application/json');
        
        // return $response;
        return new Response('Retrieving OVERVIEW data!');
    }

    public function getDetails(Request $request): Response
    {
        return new Response('Retrieving DETAILS data!');
    }
}
