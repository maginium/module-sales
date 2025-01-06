<?php

declare(strict_types=1);

namespace Maginium\Order\Repositories;

use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollectionFactory;
use Maginium\Framework\Crud\Repository;
use Maginium\Order\Interfaces\Data\OrderInterfaceFactory as ModelFactory;
use Maginium\Order\Interfaces\Repositories\OrderRepositoryInterface;

/**
 * Class OrderRepository.
 *
 * This class extends the base `OrderRepository` and implements custom functionality for handling orders.
 */
class OrderRepository /* extends Repository */ implements OrderRepositoryInterface
{
    /**
     * StoreRepository constructor.
     *
     * @param ModelFactory $model The order model factory.
     * @param OrderCollectionFactory $collection The order collection factory.
     */
    public function __construct(
        ModelFactory $model,
        OrderCollectionFactory $collection,
    ) {
        // parent::__construct($model, $collection);
    }
}
