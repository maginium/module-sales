<?php

declare(strict_types=1);

namespace Maginium\OrderElasticIndexer\Interfaces\Data;

use Maginium\Order\Interfaces\Data\OrderInterface as BaseOrderInterface;

/**
 * Interface OrderInterface.
 *
 * This interface defines constants used for interacting with the order model in the Maginium module.
 * It includes table name, event prefix, and field identifiers that are commonly used across models and other parts
 * of the application related to the order data.
 */
interface OrderInterface extends BaseOrderInterface
{
    /**
     * Entity table identifier.
     *
     * This constant represents the name of the table used to store order data.
     * It is used across models, repositories, and other parts of the application to reference the database table.
     *
     * @var string
     */
    public const INDEX_NAME = 'orders';
}
