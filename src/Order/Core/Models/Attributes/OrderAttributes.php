<?php

declare(strict_types=1);

namespace Maginium\Order\Models\Attributes;

// use Maginium\Framework\Database\Concerns\HasCustomAttributes;
// use Maginium\Framework\Database\Concerns\HasMetadata;
// use Maginium\Framework\Database\Concerns\HasStatus;
use Maginium\Framework\Database\Concerns\HasTimestamps;
use Maginium\Order\Models\Attributes\Order\GetterAttributes;
use Maginium\Order\Models\Attributes\Order\SetterAttributes;
use Maginium\Store\Models\Concerns\HasStores;

/**
 * Trait OrderAttributes.
 *
 * Defines attributes for the Order model, including getters, setters,
 * and common order-related functionalities like date of birth, gender, status, etc.
 */
trait OrderAttributes
{
    // Getters for order attributes (e.g., name, email)
    use GetterAttributes;
    // Methods to manage custom attributes
    // use HasCustomAttributes;
    // Methods for managing metadata
    // use HasMetadata;
    // Methods to manage order status
    // use HasStatus;
    // Methods for managing stores associated with the order
    use HasStores;
    // Methods to handle timestamps (created_at, updated_at)
    use HasTimestamps;
    // Setters for order attributes (e.g., name, email)
    use SetterAttributes;
}
