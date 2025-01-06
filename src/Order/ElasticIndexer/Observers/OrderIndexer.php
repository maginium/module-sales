<?php

declare(strict_types=1);

namespace Maginium\OrderElasticIndexer\Observers;

use Maginium\ElasticIndexer\Abstracts\AbstractIndexerObserver;
use Maginium\Framework\Database\Interfaces\Data\ModelInterface;
use Maginium\Framework\Support\Facades\Log;
use Maginium\Order\Interfaces\Data\OrderInterface;

/**
 * Class OrderIndexer.
 *
 * This class observes order-related events such as save, delete, duplicate, and mass actions.
 * It processes the reindexing of categories based on changes made to order models.
 */
class OrderIndexer extends AbstractIndexerObserver
{
    /**
     * OrderIndexer constructor.
     *
     * Initializes the observer with optional dependencies for the model and index repository.
     * Additionally, it sets the class name for logging purposes, allowing for easier tracking of events.
     *
     * @param ModelInterface $model The model for order models.
     */
    public function __construct(
        OrderInterface $model,
    ) {
        // Call parent constructor to initialize model and index repository
        parent::__construct($model);

        // Set the logger class name to the current observer's class for better logging context
        Log::setClassName(static::class);
    }

    /**
     * Executes actions after a order is saved.
     *
     * Logs the event and triggers reindexing for the saved order model.
     *
     * @param object $model The order model that was saved.
     *
     * @return void
     */
    protected function saveAfter($model): void
    {
        // Trigger reindexing for the saved order by its model ID
        $this->reindex([$model->getData($this->model->getKeyName())]);
    }

    /**
     * Executes actions after a order is deleted.
     *
     * Logs the event and triggers reindexing for the deleted order model.
     *
     * @param object $model The order model that was deleted.
     *
     * @return void
     */
    protected function deleteAfter($model): void
    {
        // Trigger reindexing for the deleted order by its model ID
        $this->reindex([$model->getData($this->model->getKeyName())]);
    }

    /**
     * Executes actions before duplicating a order.
     *
     * Logs the event and triggers reindexing for the duplicated order model.
     *
     * @param object $model The order model to be duplicated.
     *
     * @return void
     */
    protected function duplicateEvent($model): void
    {
        // Trigger reindexing for the duplicated order by its model ID
        $this->reindex([$model->getData($this->model->getKeyName())]);
    }

    /**
     * Executes actions after mass duplicating categories.
     *
     * Logs the event and triggers reindexing for each duplicated order model.
     *
     * @param ModelInterface[] $models The array of duplicated order models.
     *
     * @return void
     */
    protected function massDuplicateAfter(array $models): void
    {
        // Loop through the array of duplicated models and trigger reindexing for each order
        foreach ($models as $model) {
            // Trigger reindexing for each duplicated order model
            $this->reindex([$model->getData($this->model->getKeyName())]);
        }
    }

    /**
     * Executes actions after mass deleting categories.
     *
     * Logs the event and triggers reindexing for each deleted order model.
     *
     * @param ModelInterface[] $models The array of deleted order models.
     *
     * @return void
     */
    protected function massDeleteAfter(array $models): void
    {
        // Loop through the array of deleted models and trigger reindexing for each order
        foreach ($models as $model) {
            // Trigger reindexing for each deleted order model
            $this->reindex([$model->getData($this->model->getKeyName())]);
        }
    }
}
