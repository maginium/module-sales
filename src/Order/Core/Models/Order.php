<?php

declare(strict_types=1);

namespace Maginium\Order\Models;

use Magento\Framework\Model\AbstractExtensibleModel;
use Magento\Framework\Model\AbstractModel;
use Magento\Sales\Api\Data\OrderInterface as BaseModelInterface;
use Maginium\Foundation\Enums\DataType;
use Maginium\Framework\Database\Eloquent\Model;
use Maginium\Framework\Database\Interfaces\SearchableInterface;
use Maginium\Order\Interfaces\Data\OrderInterface;
use Maginium\Order\Models\Attributes\OrderAttributes;
use Maginium\Order\Models\Scopes\OrderScopes;
use Maginium\OrderElasticIndexer\Models\Order as ElasticModel;

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
class Order extends Model implements OrderInterface, SearchableInterface
{
    // Trait for handling attributes
    use OrderAttributes;
    // Trait for handling scopes
    use OrderScopes;

    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    public $table = self::TABLE_NAME;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    public $primaryKey = self::ID;

    /**
     * The "type" of the primary key ID.
     *
     * This is usually 'int', but could be 'string' for UUIDs.
     *
     * @var string
     */
    public $keyType = DataType::INT;

    /**
     * The class name of the Elastic model associated with this instance.
     *
     * Used for Elasticsearch integration, enabling indexing and querying of model data.
     *
     * @var class-string<ElasticModel>|null
     */
    public ?string $elasticModel = ElasticModel::class;

    /**
     * The class name of the base model associated with this instance.
     *
     * Provides a base configuration model for resource handling or fallback logic.
     *
     * @var class-string<AbstractModel>|class-string<AbstractExtensibleModel>|null
     */
    protected ?string $baseModel = BaseModelInterface::class;
}
