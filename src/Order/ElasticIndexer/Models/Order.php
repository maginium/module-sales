<?php

declare(strict_types=1);

namespace Maginium\OrderElasticIndexer\Models;

use Maginium\Foundation\Enums\DataType;
use Maginium\Framework\Database\EloquentModel;
use Maginium\Framework\Database\Enums\Searcher;
use Maginium\Framework\Elasticsearch\Eloquent\Model;
use Maginium\Order\Interfaces\Data\OrderInterface;
use Maginium\Order\Models\Attributes\OrderAttributes;
use Maginium\OrderElasticIndexer\Models\Scopes\OrderScopes;

/**
 * Order Model.
 *
 * Represents the Order model with attributes and relationships mapped
 * to the `orders` table and Elasticsearch for indexing purposes.
 *
 * @mixin EloquentModel
 */
class Order extends Model implements OrderInterface
{
    // Trait for handling attributes
    use OrderAttributes;
    // Trait for handling scopes
    use OrderScopes;

    /**
     * Connection name for the database.
     *
     * @var string
     */
    protected $connection = Searcher::ELASTIC_SEARCH;

    /**
     * Elasticsearch index name.
     *
     * @var string
     */
    protected $index = self::TABLE_NAME;

    /**
     * Primary key for the Order model.
     *
     * @var string
     */
    protected $primaryKey = self::ID;

    /**
     * The "type" of the primary key ID.
     *
     * This is usually 'int', but could be 'string' for UUIDs.
     *
     * @var string
     */
    protected $keyType = DataType::INT;
}
