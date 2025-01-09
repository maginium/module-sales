<?php

declare(strict_types=1);

namespace Maginium\OrderApi\Actions;

use Maginium\Framework\Crud\Actions\GetList as BaseGetList;
use Maginium\Framework\Support\Facades\Log;
use Maginium\OrderApi\Interfaces\GetListInterface;
use Maginium\OrderElasticIndexer\Interfaces\Services\OrderServiceInterface;

/**
 * Class GetListAction.
 *
 * This action retrieves a list of models from the service.
 */
class GetList extends BaseGetList implements GetListInterface
{
    /**
     * @var OrderServiceInterface
     */
    protected $service;

    /**
     * GetListAction constructor.
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
