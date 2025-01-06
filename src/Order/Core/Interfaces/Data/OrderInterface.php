<?php

declare(strict_types=1);

namespace Maginium\Order\Interfaces\Data;

use Maginium\Framework\Database\Interfaces\Data\ModelInterface;

// use Maginium\Framework\Database\Interfaces\HasMetadataInterface;

/**
 * Interface OrderInterface.
 *
 * This interface defines constants used for interacting with the order model in the Maginium module.
 * It includes table name, event prefix, and field identifiers that are commonly used across models and other parts
 * of the application related to the order data.
 */
interface OrderInterface extends /* HasMetadataInterface, */ ModelInterface
{
    /**
     * Entity table_name identifier.
     *
     * This constant represents the name of the table used to store order data.
     * It is used across models, repositories, and other parts of the application to reference the database table.
     *
     * @var string
     */
    public const TABLE_NAME = 'sales_order';

    /**
     * Prefix of model events names.
     *
     * This constant defines the prefix used for model-related event names.
     * Events related to order data can be triggered with names like
     * "order_save_before" or "order_delete_after".
     *
     * @var string
     */
    public const EVENT_PREFIX = 'sales_order';

    /**
     * The name of the table that stores EAV attribute labels.
     *
     * This table contains labels for EAV (Entity-Attribute-Value) attributes,
     * which provide a human-readable name for attributes used across models like
     * orders, categories, and customers.
     */
    public const EAV_ATTRIBUTE_LABEL_TABLE_NAME = 'eav_attribute_label';

    /**
     * Order ID field.
     *
     * This constant represents the field name for the unique identifier (ID) of the order.
     * It is used in database operations to reference the order's ID field.
     *
     * @var string
     */
    public const ID = 'model_id';
}
