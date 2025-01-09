<?php

declare(strict_types=1);

namespace Maginium\OrderApi\Actions;

use Maginium\Framework\Crud\Actions\Search as BaseSearch;
use Maginium\Framework\Support\Facades\Log;
use Maginium\OrderApi\Interfaces\SearchInterface;
use Maginium\OrderElasticIndexer\Interfaces\Services\OrderServiceInterface;

/**
 * Class SearchAction.
 *
 * This action searches for models in the service based on search criteria.
 */
class Search extends BaseSearch implements SearchInterface
{
    /**
     * @var OrderServiceInterface
     */
    protected $service;

    /**
     * SearchAction constructor.
     *
     * @param OrderServiceInterface $service
     */
    public function __construct(OrderServiceInterface $service)
    {
        parent::__construct($service);

        // Set the class name for logging purposes
        Log::setClassName(static::class);
    }
}
