<?php

declare(strict_types=1);

namespace Maginium\OrderElasticIndexer\Models\Scopes;

use Maginium\Order\Models\Scopes\Order\GeneralScopes;

/**
 * Trait OrderScopes.
 *
 * This trait provides common query scopes for the Order model, enabling
 * flexible querying options through the use of predefined scopes.
 */
trait OrderScopes
{
    // Include general query scopes applicable to the Order model.
    use GeneralScopes;
}
