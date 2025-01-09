<?php

declare(strict_types=1);

namespace Maginium\OrderApi\Actions;

use Maginium\Framework\Crud\Actions\DeleteById as BaseDeleteById;
use Maginium\Framework\Support\Facades\Log;
use Maginium\OrderApi\Interfaces\DeleteInterface;
use Maginium\OrderElasticIndexer\Interfaces\Services\OrderServiceInterface;

/**
 * Class DeleteByIdAction.
 *
 * This action deletes an model by its ID.
 */
class DeleteById extends BaseDeleteById implements DeleteInterface
{
    /**
     * @var OrderServiceInterface
     */
    protected $service;

    /**
     * DeleteByIdAction constructor.
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
