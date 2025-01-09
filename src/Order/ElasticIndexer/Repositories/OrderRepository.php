<?php

declare(strict_types=1);

namespace Maginium\OrderElasticIndexer\Repositories;

use Maginium\Framework\Crud\Repository;
use Maginium\Order\Interfaces\Repositories\OrderRepositoryInterface;
use Maginium\OrderElasticIndexer\Interfaces\Data\OrderInterface;

/**
 * Class OrderRepository.
 *
 * This class extends the base `OrderRepository` and implements custom functionality for handling orders.
 */
class OrderRepository extends Repository implements OrderRepositoryInterface
{
    /**
     * The repository identifier.
     *
     * @var string
     */
    protected string $repositoryId = 'order';

    /**
     * OrderRepository constructor.
     *
     * @param OrderInterface $model The order model interface.
     */
    public function __construct(OrderInterface $model)
    {
        parent::__construct($model);
    }
}
