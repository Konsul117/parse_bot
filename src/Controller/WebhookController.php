<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WebhookController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/hook/", name="app_webhook_index", methods={"POST"})
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $this->logger->notice($request->getContent());

        return new JsonResponse();
    }
}
