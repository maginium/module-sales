<?php

declare(strict_types=1);

namespace Maginium\Order\Services;

use Maginium\Framework\Crud\Service;
use Maginium\Order\Interfaces\Repositories\OrderRepositoryInterface;
use Maginium\Order\Interfaces\Services\OrderServiceInterface;

/**
 * Class OrderService.
 *
 * This class extends the base `OrderService` and implements custom functionality for handling orders.
 */
class OrderService extends Service implements OrderServiceInterface
{
    /**
     * OrderService constructor.
     *
     * @param OrderRepositoryInterface $orderRepository The order repository interface.
     */
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        parent::__construct($orderRepository);
    }
}
