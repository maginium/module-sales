<?php

declare(strict_types=1);

namespace Maginium\Order\Facades;

use Maginium\Framework\Database\Interfaces\Data\ModelInterface;
use Maginium\Framework\Support\Facade;
use Maginium\Order\Interfaces\Data\OrderInterface;

/**
 * Class Order.
 *
 * Facade for interacting with the Order Repository, which retrieves country information.
 *
 * @method static int|null getSortOrder() Get the sort order of the order.
 * @method static void setSortOrder(int $sortOrder) Set the sort order of the order.
 * @method static bool isDefault() Check if the order is the default order.
 * @method static void setIsDefault(bool $isDefault) Set whether the order is the default.
 * @method static int getId() Get the order ID.
 * @method static void setId(int $id) Set the order ID.
 * @method static string getCode() Get the order code.
 * @method static void setCode(string $code) Set the order code.
 * @method static string getName() Get the order name.
 * @method static void setName(string $name) Set the order name.
 * @method static int getDefaultGroupId() Get the default group ID for the order.
 * @method static void setDefaultGroupId(int $defaultGroupId) Set the default group ID for the order.
 * @method static \Magento\Store\Api\Data\OrderExtensionInterface|null getExtensionAttributes() Retrieve the order's extension attributes.
 * @method static void setExtensionAttributes(\Magento\Store\Api\Data\OrderExtensionInterface $extensionAttributes) Set the order's extension attributes.
 *
 * @see OrderInterface
 * @see ModelInterface
 */
class Order extends Facade
{
    /**
     * Get the accessor for the facade.
     *
     * This method must be implemented by subclasses to return the accessor string
     * corresponding to the underlying service or class the facade represents.
     *
     * @return string The accessor for the facade.
     */
    protected static function getAccessor(): string
    {
        return OrderInterface::class;
    }
}
