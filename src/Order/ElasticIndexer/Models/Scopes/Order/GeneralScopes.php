<?php

declare(strict_types=1);

namespace Maginium\OrderElasticIndexer\Models\Scopes\Order;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Trait OrderScopes.
 *
 * This trait provides scope methods specifically for filtering order-based data,
 * such as by `order_id`, `order_code`, and other order-related attributes.
 *
 * @method AbstractCollection scopeOrderId(int $orderId) Find orders by their `order_id`.
 */
trait GeneralScopes
{
}
