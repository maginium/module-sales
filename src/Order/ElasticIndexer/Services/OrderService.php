<?php

declare(strict_types=1);

namespace Maginium\OrderElasticIndexer\Services;

use Maginium\Framework\Elasticsearch\Eloquent\Service;
use Maginium\OrderElasticIndexer\Interfaces\Repositories\OrderRepositoryInterface;
use Maginium\OrderElasticIndexer\Interfaces\Services\OrderServiceInterface;
use Maginium\OrderElasticIndexer\Repositories\OrderRepository;

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
    public function __construct(OrderRepository $orderRepository)
    {
        parent::__construct($orderRepository);
    }
}
