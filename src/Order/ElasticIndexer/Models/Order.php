<?php

declare(strict_types=1);

namespace Maginium\OrderElasticIndexer\Models;

use Magento\Sales\Api\Data\OrderInterface as BaseOrderInterface;
use Maginium\Foundation\Enums\DataType;
use Maginium\Framework\Database\Eloquent\Model as EloquentModel;
use Maginium\Framework\Database\Enums\SearcherEngines;
use Maginium\Framework\Elasticsearch\Eloquent\Model;
use Maginium\Order\Models\Attributes\OrderAttributes;
use Maginium\OrderElasticIndexer\Interfaces\Data\OrderInterface;
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
    protected $connection = SearcherEngines::ELASTIC_SEARCH;

    /**
     * Elasticsearch index name.
     *
     * @var string
     */
    protected $index = OrderInterface::INDEX_NAME;

    /**
     * Primary key for the Order model.
     *
     * @var string
     */
    protected $primaryKey = OrderInterface::ID;

    /**
     * The "type" of the primary key ID.
     *
     * This is usually DataType::INT, but could be 'string' for UUIDs.
     *
     * @var string
     */
    protected $keyType = DataType::INT;

    /**
     * The attributes that should be treated as dates.
     *
     * These attributes will be cast to Carbon instances.
     *
     * @var array
     */
    protected $dates = [
        BaseOrderInterface::CUSTOMER_DOB,
    ];

    /**
     * The attributes that should be treated as dates.
     *
     * These attributes will be cast to Carbon instances.
     *
     * @var array
     */
    protected $hidden = [
        BaseOrderInterface::ENTITY_ID,
    ];

    /**
     * The attributes that should be cast to specific data types.
     *
     * This ensures that attributes are automatically cast to the correct type when accessed.
     *
     * @var array
     */
    protected $casts = [
        OrderInterface::ID => DataType::INT,
        BaseOrderInterface::WEIGHT => DataType::FLOAT,
        BaseOrderInterface::QUOTE_ID => DataType::INT,
        BaseOrderInterface::STORE_ID => DataType::INT,
        BaseOrderInterface::ENTITY_ID => DataType::INT,
        BaseOrderInterface::SUBTOTAL => DataType::FLOAT,
        BaseOrderInterface::IS_VIRTUAL => DataType::INT,
        BaseOrderInterface::EMAIL_SENT => DataType::INT,
        BaseOrderInterface::CUSTOMER_ID => DataType::INT,
        BaseOrderInterface::TOTAL_DUE => DataType::FLOAT,
        BaseOrderInterface::TAX_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::TOTAL_PAID => DataType::FLOAT,
        BaseOrderInterface::GRAND_TOTAL => DataType::FLOAT,
        BaseOrderInterface::TAX_CANCELED => DataType::FLOAT,
        BaseOrderInterface::TAX_INVOICED => DataType::FLOAT,
        BaseOrderInterface::TAX_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::EDIT_INCREMENT => DataType::INT,
        BaseOrderInterface::BASE_SUBTOTAL => DataType::FLOAT,
        BaseOrderInterface::CUSTOMER_GENDER => DataType::INT,
        BaseOrderInterface::BASE_TOTAL_DUE => DataType::FLOAT,
        BaseOrderInterface::QUOTE_ADDRESS_ID => DataType::INT,
        BaseOrderInterface::TOTAL_ITEM_COUNT => DataType::INT,
        BaseOrderInterface::TOTAL_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::TOTAL_CANCELED => DataType::FLOAT,
        BaseOrderInterface::TOTAL_INVOICED => DataType::FLOAT,
        BaseOrderInterface::BASE_TOTAL_PAID => DataType::FLOAT,
        BaseOrderInterface::CUSTOMER_IS_GUEST => DataType::INT,
        BaseOrderInterface::DISCOUNT_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::SHIPPING_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::BASE_TAX_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::CUSTOMER_GROUP_ID => DataType::INT,
        BaseOrderInterface::CAN_SHIP_PARTIALLY => DataType::INT,
        'send_email' => DataType::BOOLEAN,
        'shipping_address_id' => DataType::INT,
        BaseOrderInterface::BILLING_ADDRESS_ID => DataType::INT,
        BaseOrderInterface::BASE_GRAND_TOTAL => DataType::FLOAT,
        BaseOrderInterface::BASE_TAX_CANCELED => DataType::FLOAT,
        BaseOrderInterface::SHIPPING_CANCELED => DataType::FLOAT,
        BaseOrderInterface::SHIPPING_INVOICED => DataType::FLOAT,
        BaseOrderInterface::SHIPPING_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::SUBTOTAL_CANCELED => DataType::FLOAT,
        BaseOrderInterface::SUBTOTAL_INVOICED => DataType::FLOAT,
        BaseOrderInterface::SUBTOTAL_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::TOTAL_QTY_ORDERED => DataType::FLOAT,
        BaseOrderInterface::SUBTOTAL_INCL_TAX => DataType::FLOAT,
        BaseOrderInterface::SHIPPING_INCL_TAX => DataType::FLOAT,
        BaseOrderInterface::BASE_TAX_INVOICED => DataType::FLOAT,
        BaseOrderInterface::BASE_TAX_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::DISCOUNT_CANCELED => DataType::FLOAT,
        BaseOrderInterface::DISCOUNT_INVOICED => DataType::FLOAT,
        BaseOrderInterface::DISCOUNT_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::STORE_TO_BASE_RATE => DataType::FLOAT,
        BaseOrderInterface::BASE_TO_ORDER_RATE => DataType::FLOAT,
        BaseOrderInterface::CUSTOMER_NOTE_NOTIFY => DataType::INT,
        BaseOrderInterface::ADJUSTMENT_NEGATIVE => DataType::FLOAT,
        BaseOrderInterface::ADJUSTMENT_POSITIVE => DataType::FLOAT,
        BaseOrderInterface::BASE_TOTAL_CANCELED => DataType::FLOAT,
        BaseOrderInterface::STORE_TO_ORDER_RATE => DataType::FLOAT,
        BaseOrderInterface::SHIPPING_TAX_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::BASE_TOTAL_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::BASE_TO_GLOBAL_RATE => DataType::FLOAT,
        BaseOrderInterface::BASE_TOTAL_INVOICED => DataType::FLOAT,
        BaseOrderInterface::BASE_DISCOUNT_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::BASE_SHIPPING_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::CAN_SHIP_PARTIALLY_ITEM => DataType::INT,
        BaseOrderInterface::PAYMENT_AUTH_EXPIRATION => DataType::INT,
        BaseOrderInterface::SHIPPING_TAX_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::TOTAL_ONLINE_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::TOTAL_OFFLINE_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::BASE_SUBTOTAL_INCL_TAX => DataType::FLOAT,
        BaseOrderInterface::BASE_SHIPPING_INCL_TAX => DataType::FLOAT,
        BaseOrderInterface::BASE_DISCOUNT_CANCELED => DataType::FLOAT,
        BaseOrderInterface::BASE_DISCOUNT_INVOICED => DataType::FLOAT,
        BaseOrderInterface::BASE_DISCOUNT_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::BASE_SHIPPING_CANCELED => DataType::FLOAT,
        BaseOrderInterface::BASE_SHIPPING_INVOICED => DataType::FLOAT,
        BaseOrderInterface::BASE_SHIPPING_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::BASE_SUBTOTAL_CANCELED => DataType::FLOAT,
        BaseOrderInterface::BASE_SUBTOTAL_INVOICED => DataType::FLOAT,
        BaseOrderInterface::BASE_SUBTOTAL_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::BASE_TOTAL_QTY_ORDERED => DataType::FLOAT,
        BaseOrderInterface::BASE_SHIPPING_TAX_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::BASE_TOTAL_INVOICED_COST => DataType::FLOAT,
        BaseOrderInterface::SHIPPING_DISCOUNT_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::BASE_ADJUSTMENT_NEGATIVE => DataType::FLOAT,
        BaseOrderInterface::BASE_ADJUSTMENT_POSITIVE => DataType::FLOAT,
        BaseOrderInterface::FORCED_SHIPMENT_WITH_INVOICE => DataType::INT,
        BaseOrderInterface::BASE_SHIPPING_TAX_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::BASE_TOTAL_ONLINE_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::BASE_TOTAL_OFFLINE_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::PAYMENT_AUTHORIZATION_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::BASE_SHIPPING_DISCOUNT_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::DISCOUNT_TAX_COMPENSATION_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::DISCOUNT_TAX_COMPENSATION_INVOICED => DataType::FLOAT,
        BaseOrderInterface::DISCOUNT_TAX_COMPENSATION_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::BASE_DISCOUNT_TAX_COMPENSATION_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::BASE_DISCOUNT_TAX_COMPENSATION_INVOICED => DataType::FLOAT,
        BaseOrderInterface::BASE_DISCOUNT_TAX_COMPENSATION_REFUNDED => DataType::FLOAT,
        BaseOrderInterface::SHIPPING_DISCOUNT_TAX_COMPENSATION_AMOUNT => DataType::FLOAT,
        BaseOrderInterface::BASE_SHIPPING_DISCOUNT_TAX_COMPENSATION_AMNT => DataType::FLOAT,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * This is a list of attributes that can be filled using mass-assignment.
     *
     * @var array
     */
    protected $fillable = [
        BaseOrderInterface::WEIGHT,
        BaseOrderInterface::QUOTE_ID,
        BaseOrderInterface::STORE_ID,
        BaseOrderInterface::SUBTOTAL,
        BaseOrderInterface::TOTAL_DUE,
        BaseOrderInterface::IS_VIRTUAL,
        BaseOrderInterface::EMAIL_SENT,
        BaseOrderInterface::TAX_AMOUNT,
        BaseOrderInterface::TOTAL_PAID,
        BaseOrderInterface::GRAND_TOTAL,
        BaseOrderInterface::CUSTOMER_ID,
        BaseOrderInterface::TAX_CANCELED,
        BaseOrderInterface::TAX_INVOICED,
        BaseOrderInterface::TAX_REFUNDED,
        BaseOrderInterface::BASE_SUBTOTAL,
        BaseOrderInterface::EDIT_INCREMENT,
        BaseOrderInterface::BASE_TOTAL_DUE,
        BaseOrderInterface::TOTAL_REFUNDED,
        BaseOrderInterface::TOTAL_CANCELED,
        BaseOrderInterface::TOTAL_INVOICED,
        BaseOrderInterface::BASE_TOTAL_PAID,
        BaseOrderInterface::DISCOUNT_AMOUNT,
        BaseOrderInterface::SHIPPING_AMOUNT,
        BaseOrderInterface::CUSTOMER_GENDER,
        BaseOrderInterface::BASE_TAX_AMOUNT,
        BaseOrderInterface::BASE_GRAND_TOTAL,
        BaseOrderInterface::QUOTE_ADDRESS_ID,
        BaseOrderInterface::TOTAL_ITEM_COUNT,
        BaseOrderInterface::CUSTOMER_IS_GUEST,
        BaseOrderInterface::CUSTOMER_GROUP_ID,
        BaseOrderInterface::BASE_TAX_CANCELED,
        BaseOrderInterface::SHIPPING_CANCELED,
        BaseOrderInterface::SHIPPING_INVOICED,
        BaseOrderInterface::SHIPPING_REFUNDED,
        BaseOrderInterface::SUBTOTAL_CANCELED,
        BaseOrderInterface::SUBTOTAL_INVOICED,
        BaseOrderInterface::SUBTOTAL_REFUNDED,
        BaseOrderInterface::TOTAL_QTY_ORDERED,
        BaseOrderInterface::SUBTOTAL_INCL_TAX,
        BaseOrderInterface::SHIPPING_INCL_TAX,
        BaseOrderInterface::BASE_TAX_INVOICED,
        BaseOrderInterface::BASE_TAX_REFUNDED,
        BaseOrderInterface::DISCOUNT_CANCELED,
        BaseOrderInterface::DISCOUNT_INVOICED,
        BaseOrderInterface::DISCOUNT_REFUNDED,
        BaseOrderInterface::CAN_SHIP_PARTIALLY,
        BaseOrderInterface::BILLING_ADDRESS_ID,
        BaseOrderInterface::STORE_TO_BASE_RATE,
        BaseOrderInterface::BASE_TO_ORDER_RATE,
        BaseOrderInterface::ADJUSTMENT_NEGATIVE,
        BaseOrderInterface::ADJUSTMENT_POSITIVE,
        BaseOrderInterface::BASE_TOTAL_CANCELED,
        BaseOrderInterface::STORE_TO_ORDER_RATE,
        BaseOrderInterface::SHIPPING_TAX_AMOUNT,
        BaseOrderInterface::BASE_TOTAL_REFUNDED,
        BaseOrderInterface::BASE_TO_GLOBAL_RATE,
        BaseOrderInterface::BASE_TOTAL_INVOICED,
        BaseOrderInterface::BASE_DISCOUNT_AMOUNT,
        BaseOrderInterface::CUSTOMER_NOTE_NOTIFY,
        BaseOrderInterface::BASE_SHIPPING_AMOUNT,
        BaseOrderInterface::SHIPPING_TAX_REFUNDED,
        BaseOrderInterface::TOTAL_ONLINE_REFUNDED,
        BaseOrderInterface::TOTAL_OFFLINE_REFUNDED,
        BaseOrderInterface::BASE_SUBTOTAL_INCL_TAX,
        BaseOrderInterface::BASE_SHIPPING_INCL_TAX,
        BaseOrderInterface::BASE_DISCOUNT_CANCELED,
        BaseOrderInterface::BASE_DISCOUNT_INVOICED,
        BaseOrderInterface::BASE_DISCOUNT_REFUNDED,
        BaseOrderInterface::BASE_SHIPPING_CANCELED,
        BaseOrderInterface::BASE_SHIPPING_INVOICED,
        BaseOrderInterface::BASE_SHIPPING_REFUNDED,
        BaseOrderInterface::BASE_SUBTOTAL_CANCELED,
        BaseOrderInterface::BASE_SUBTOTAL_INVOICED,
        BaseOrderInterface::BASE_SUBTOTAL_REFUNDED,
        BaseOrderInterface::BASE_TOTAL_QTY_ORDERED,
        BaseOrderInterface::CAN_SHIP_PARTIALLY_ITEM,
        BaseOrderInterface::PAYMENT_AUTH_EXPIRATION,
        BaseOrderInterface::BASE_SHIPPING_TAX_AMOUNT,
        BaseOrderInterface::BASE_TOTAL_INVOICED_COST,
        BaseOrderInterface::SHIPPING_DISCOUNT_AMOUNT,
        BaseOrderInterface::BASE_ADJUSTMENT_NEGATIVE,
        BaseOrderInterface::BASE_ADJUSTMENT_POSITIVE,
        BaseOrderInterface::BASE_SHIPPING_TAX_REFUNDED,
        BaseOrderInterface::BASE_TOTAL_ONLINE_REFUNDED,
        BaseOrderInterface::BASE_TOTAL_OFFLINE_REFUNDED,
        BaseOrderInterface::FORCED_SHIPMENT_WITH_INVOICE,
        BaseOrderInterface::PAYMENT_AUTHORIZATION_AMOUNT,
        BaseOrderInterface::BASE_SHIPPING_DISCOUNT_AMOUNT,
        BaseOrderInterface::DISCOUNT_TAX_COMPENSATION_AMOUNT,
        BaseOrderInterface::DISCOUNT_TAX_COMPENSATION_INVOICED,
        BaseOrderInterface::DISCOUNT_TAX_COMPENSATION_REFUNDED,
        BaseOrderInterface::BASE_DISCOUNT_TAX_COMPENSATION_AMOUNT,
        BaseOrderInterface::BASE_DISCOUNT_TAX_COMPENSATION_INVOICED,
        BaseOrderInterface::BASE_DISCOUNT_TAX_COMPENSATION_REFUNDED,
        BaseOrderInterface::SHIPPING_DISCOUNT_TAX_COMPENSATION_AMOUNT,
        BaseOrderInterface::BASE_SHIPPING_DISCOUNT_TAX_COMPENSATION_AMNT,
    ];
}
