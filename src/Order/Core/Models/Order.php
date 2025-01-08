<?php

declare(strict_types=1);

namespace Maginium\Order\Models;

use Magento\Sales\Api\Data\OrderInterface as BaseOrderInterface;
use Magento\Sales\Model\Order as BaseOrder;
use Maginium\Foundation\Enums\DataType;
use Maginium\Framework\Database\Concerns\HasEnhancedModel;
use Maginium\Framework\Database\Interfaces\SearchableInterface;
use Maginium\Order\Interfaces\Data\OrderInterface;
use Maginium\Order\Models\Attributes\OrderAttributes;
use Maginium\Order\Models\Scopes\OrderScopes;

/**
 * Class Order.
 *
 * Model for handling countries.
 * This model interacts with the corresponding resource model
 * for database operations and provides methods to access and modify
 * the data fields.
 *
 * @template TKey of array-key
 * @template TValue
 */
class Order extends BaseOrder implements BaseOrderInterface, OrderInterface, SearchableInterface
{
    // Include additional database handling utilities.
    use HasEnhancedModel;
    // Trait for handling attributes
    use OrderAttributes;
    // Trait for handling scopes
    use OrderScopes;

    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    public static string $table = self::TABLE_NAME;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    public static string $primaryKey = self::ID;

    /**
     * The "type" of the primary key ID.
     *
     * This is usually 'int', but could be 'string' for UUIDs.
     *
     * @var string
     */
    public static string $keyType = DataType::INT;

    /**
     * Get the instance as an array.
     *
     * This method delegates to `toArray` to convert the group instance into an array,
     * optionally including only specific keys.
     *
     * @param array $keys Optional array of keys to include in the resulting array.
     *                    Defaults to all keys ('*') if not specified.
     *
     * @return array The model's data as an associative array.
     */
    public function toDataArray(array $keys = ['*']): array
    {
        // Delegate to the `toArray` method for conversion and key filtering
        return parent::toArray($keys);
    }
}
