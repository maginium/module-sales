<?php

declare(strict_types=1);

use Maginium\Framework\Component\Module;

/**
 * Registers multiple modules based on a list of namespaces and their respective paths.
 *
 * This script registers each module by iterating over an associative array of module namespaces
 * and their corresponding directory paths. The `Module::register` method is called
 * for each module to register it within the application.
 *
 * @param array $extensions An associative array where each key is a fully-qualified module namespace
 *                           (e.g., 'Maginium_Framework'), and the value is the absolute file path
 *                           to the module's directory (e.g., __DIR__).
 */
$extensions = [
    // Core sales order modules
    'Maginium_Order' => __DIR__ . '/Order/Core',
    'Maginium_OrderApi' => __DIR__ . '/Order/Api',
    'Maginium_OrderStats' => __DIR__ . '/Order/Stats',
    'Maginium_OrderElasticIndexer' => __DIR__ . '/Order/ElasticIndexer',

    // Rest sales order modules
    'Maginium_OrderTrack' => __DIR__ . '/Order/Extensions/Track',
    'Maginium_OrderComment' => __DIR__ . '/Order/Extensions/Comment',
    'Maginium_OrderProductImage' => __DIR__ . '/Order/Extensions/ProductImage',
    'Maginium_OrderPurchaseSource' => __DIR__ . '/Order/Extensions/PurchaseSource',

    // Sales invoice modules
    'Maginium_Invoice' => __DIR__ . '/Invoice/Core',
    'Maginium_InvoiceStats' => __DIR__ . '/Invoice/Stats',

    // Sales creditmemo modules
    'Maginium_Creditmemo' => __DIR__ . '/Creditmemo/Core',
    'Maginium_CreditmemoStats' => __DIR__ . '/Creditmemo/Stats',

    // Sales shipment modules
    'Maginium_Shipment' => __DIR__ . '/Shipment/Core',
    'Maginium_ShipmentStats' => __DIR__ . '/Shipment/Stats',

    // Sales payment method modules
    'Maginium_PaymentMethod' => __DIR__ . '/PaymentMethod',

    // Addtional sales modules
    'Maginium_SalesArchive' => __DIR__ . '/Extensions/Archive',
    'Maginium_SalesOrderStatus' => __DIR__ . '/Extensions/OrderStatus',
    'Maginium_FreeShippingBar' => __DIR__ . '/Extensions/FreeShippingBar',
    'Maginium_SalesCommentAuthor' => __DIR__ . '/Extensions/CommentAuthor',
];

// Register each module using the provided extensions list.
Module::registerModules($extensions);
