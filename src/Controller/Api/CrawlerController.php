<?php

namespace App\Controller\Api;

use App\Base\Controller\ApiController;
use App\Dto\Crawler\CrawlerGetLinks;
use App\Exception\ValidationException;
use App\Service\WebCrawler\WebCrawler;
use AutoMapperPlus\Exception\UnregisteredMappingException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/crawler", name="api_crawler_")
 */
class CrawlerController extends ApiController
{
    /**
     * @throws ValidationException
     * @throws UnregisteredMappingException
     *
     * @Route("/get/links", name="get_links")
     */
    public function getLinks(/*CrawlerGetLinks $crawlerGetLinks,*/): JsonResponse
    {
//        $this->dtoValidator->validate($crawlerGetLinks);
//
//        $user = $this->mapper->mapToObject($userRegister, new User());

        // TODO dorobić ignorowanie podstron
        // Przy walutach i językach bardzo pomocne
        $crawlerFacade = new WebCrawler();
        $dto = new CrawlerGetLinks();
        $dto->setDomainUrl('https://12factor.net/');
        $crawlerFacade->getAllWebsiteLinks($dto);

        return new JsonResponse();
    }
}
