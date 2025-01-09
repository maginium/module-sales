<?php

declare(strict_types=1);

namespace Maginium\OrderApi\Actions;

use Maginium\Framework\Crud\Actions\GetById as BaseGetById;
use Maginium\Framework\Support\Facades\Log;
use Maginium\OrderApi\Interfaces\GetByIdInterface;
use Maginium\OrderElasticIndexer\Interfaces\Services\OrderServiceInterface;

/**
 * Class GetByIdAction.
 *
 * This action retrieves an model by its ID.
 */
class GetById extends BaseGetById implements GetByIdInterface
{
    /**
     * @var OrderServiceInterface
     */
    protected $service;

    /**
     * GetByIdAction constructor.
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
