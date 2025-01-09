<?php

declare(strict_types=1);

namespace Maginium\OrderApi\Actions;

use Maginium\Framework\Crud\Actions\Upsert as BaseUpsert;
use Maginium\Framework\Support\Facades\Log;
use Maginium\OrderApi\Interfaces\UpsertInterface;
use Maginium\OrderElasticIndexer\Interfaces\Services\OrderServiceInterface;

/**
 * Class UpsertAction.
 *
 * This action upserts (updates or inserts) an model in the service.
 */
class Upsert extends BaseUpsert implements UpsertInterface
{
    /**
     * @var OrderServiceInterface
     */
    protected $service;

    /**
     * UpsertAction constructor.
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
