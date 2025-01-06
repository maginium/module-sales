<?php

declare(strict_types=1);

namespace Maginium\Order\Models\Scopes;

use Maginium\Order\Models\Scopes\Order\GeneralScopes;

/**
 * Trait OrderScopes.
 *
 * This trait provides common query scopes for the Order model, enabling
 * flexible querying options through the use of predefined scopes.
 *
 * It includes general, store, and website scopes to allow querying across
 * different contexts like store and website-specific data.
 */
trait OrderScopes
{
    // Include general query scopes applicable to the Order model.
    use GeneralScopes;
}
