<?php

declare(strict_types=1);

namespace Maginium\OrderElasticIndexer\Models\Indexer\Fulltext\Action;

use Magento\Framework\App\AreaList;
use Maginium\ElasticIndexer\Models\Indexer\Fulltext\Action\AbstractAction;
use Maginium\OrderElasticIndexer\Models\ResourceModel\Indexer\Fulltext\Action\FulltextIndexer as ResourceModel;

/**
 * Class Full.
 *
 * Handles the full reindexing action for the order elastic indexer.
 * Extends the AbstractAction to leverage common indexing capabilities.
 */
class Full extends AbstractAction
{
    /**
     * Constructor.
     *
     * Initializes the full indexing action with the required dependencies.
     *
     * @param AreaList $areaList Manages the application areas (e.g., frontend, adminhtml).
     * @param ResourceModel $resourceModel Provides methods for interacting with the database during indexing.
     */
    public function __construct(
        AreaList $areaList,
        ResourceModel $resourceModel,
    ) {
        // Call parent constructor
        parent::__construct($areaList, $resourceModel);
    }
}
