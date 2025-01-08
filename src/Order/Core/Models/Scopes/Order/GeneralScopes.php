<?php

declare(strict_types=1);

namespace Maginium\Order\Models\Scopes\Order;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Maginium\Order\Models\Order;

/**
 * Trait OrderScopes.
 *
 * Defines general scopes for order operations.
 *
 * @method AbstractCollection|null scopeFindById(int $orderId) Finds a order by their ID.
 * @method AbstractCollection scopeFindByStatus(string $status) Retrieves orders based on their account status.
 * @method AbstractCollection scopeFindByCreatedAt(string $date) Retrieves orders created on or after the given date.
 * @method AbstractCollection scopeFindByUpdatedAt(string $date) Retrieves orders updated on or after the given date.
 */
trait GeneralScopes
{
    /**
     * Finds a order by their ID.
     *
     * @param int $orderId The order ID to search for.
     *
     * @return AbstractCollection|null The order, or null if not found.
     */
    public function scopeFindById(int $orderId): ?AbstractCollection
    {
        return $this->getCollection()
            ->addFieldToFilter('entity_id', ['eq' => $orderId])
            ->addAttributeToSelect('*');
    }

    /**
     * Retrieves orders based on their account status (e.g., enabled or disabled).
     *
     * @param string $status The status of the account (e.g., 'enabled', 'disabled').
     *
     * @return AbstractCollection The collection of orders with the specified status.
     */
    public function scopeFindByStatus(string $status): AbstractCollection
    {
        return $this->getCollection()
            ->addFieldToFilter('status', ['eq' => $status])
            ->addAttributeToSelect('*');
    }

    /**
     * Retrieves orders created on or after the given date.
     *
     * @param string $date The date to filter orders by.
     *
     * @return AbstractCollection The collection of orders created on or after the specified date.
     */
    public function scopeFindByCreatedAt(string $date): AbstractCollection
    {
        return $this->getCollection()
            ->addFieldToFilter('created_at', ['gteq' => $date])
            ->addAttributeToSelect('*');
    }

    /**
     * Retrieves orders updated on or after the given date.
     *
     * @param string $date The date to filter orders by.
     *
     * @return AbstractCollection The collection of orders updated on or after the specified date.
     */
    public function scopeFindByUpdatedAt(string $date): AbstractCollection
    {
        return $this->getCollection()
            ->addFieldToFilter('updated_at', ['gteq' => $date])
            ->addAttributeToSelect('*');
    }
}
