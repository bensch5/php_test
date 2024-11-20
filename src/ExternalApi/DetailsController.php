<?php

namespace ExternalApi;

use Data\Repository\InsuranceRepositoryInterface;
use Infrastructure\Request;
use Infrastructure\Response;

class DetailsController implements ControllerInterface
{
    public function __construct(private InsuranceRepositoryInterface $repository) {}

    public function handle(Request $request): Response
    {
        $response = new Response();

        $content = 'Retrieving DETAILS data!';
        $response->setContent(json_encode($content));

        $response->setContentType('application/json');
        
        return $response;
    }
}
