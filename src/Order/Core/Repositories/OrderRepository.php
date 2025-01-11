<?php

declare(strict_types=1);

namespace Maginium\Order\Repositories;

use Maginium\Framework\Crud\Repository;
use Maginium\Order\Interfaces\Data\OrderInterface;
use Maginium\Order\Interfaces\Repositories\OrderRepositoryInterface;

/**
 * Class OrderRepository.
 *
 * This class extends the base `OrderRepository` and implements custom functionality for handling orders.
 */
class OrderRepository extends Repository implements OrderRepositoryInterface
{
    /**
     * StoreRepository constructor.
     *
     * @param OrderInterface $model The order model factory.
     */
    public function __construct(
        OrderInterface $model,
    ) {
        parent::__construct($model);
    }
}
