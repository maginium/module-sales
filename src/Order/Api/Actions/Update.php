<?php

declare(strict_types=1);

namespace Maginium\OrderApi\Actions;

use Maginium\Framework\Crud\Actions\Update as BaseUpdate;
use Maginium\Framework\Support\Facades\Log;
use Maginium\OrderApi\Interfaces\UpdateInterface;
use Maginium\OrderElasticIndexer\Interfaces\Services\OrderServiceInterface;

/**
 * Class UpdateAction.
 *
 * This action updates an existing model in the service.
 */
class Update extends BaseUpdate implements UpdateInterface
{
    /**
     * @var OrderServiceInterface
     */
    protected $service;

    /**
     * UpdateAction constructor.
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
