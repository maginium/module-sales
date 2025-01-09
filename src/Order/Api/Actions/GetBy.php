<?php

declare(strict_types=1);

namespace Maginium\OrderApi\Actions;

use Maginium\Framework\Crud\Actions\GetBy as BaseGetBy;
use Maginium\Framework\Support\Facades\Log;
use Maginium\OrderApi\Interfaces\GetByInterface;
use Maginium\OrderElasticIndexer\Interfaces\Services\OrderServiceInterface;

/**
 * Class GetByAction.
 *
 * This action retrieves an model based on specific criteria.
 */
class GetBy extends BaseGetBy implements GetByInterface
{
    /**
     * @var OrderServiceInterface
     */
    protected $service;

    /**
     * GetByAction constructor.
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
