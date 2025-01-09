<?php

declare(strict_types=1);

namespace Maginium\OrderApi\Actions;

use Maginium\Framework\Crud\Actions\Save as BaseSave;
use Maginium\Framework\Support\Facades\Log;
use Maginium\OrderApi\Interfaces\CreateInterface;
use Maginium\OrderElasticIndexer\Interfaces\Services\OrderServiceInterface;

/**
 * Class SaveAction.
 *
 * This action saves a new model into the service.
 */
class Save extends BaseSave implements CreateInterface
{
    /**
     * @var OrderServiceInterface
     */
    protected $service;

    /**
     * SaveAction constructor.
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
