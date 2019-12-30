<?php


namespace App\Dto\Crawler;

use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Validator\Constraints as Assert;

class FilterCrawledLinksDto
{
    /**
     * @var UuidInterface
     *
     * @Assert\Type(
     *     type="Ramsey\Uuid\UuidInterface",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $crawlingHistoryId;

    /**
     * @Assert\NotNull(
     *     message = "You need to specify filtering pattern"
     * )
     * @var string
     */
    private $pattern;

    public function __construct(?array $data = null)
    {
        $this->crawlingHistoryId = $data['crawlingHistoryId'] ?? null;
        $this->pattern = $data['pattern'] ?? null;
    }

    /**
     * @return UuidInterface
     */
    public function getCrawlingHistoryId(): UuidInterface
    {
        return $this->crawlingHistoryId;
    }

    /**
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }
}