<?php

declare(strict_types=1);

namespace Maginium\Order\Models;

use InvalidArgumentException;
use Maginium\Framework\Support\Collection;
use Maginium\Order\Interfaces\Data\OrderInterface;
use Maginium\Order\Interfaces\Repositories\OrderRepositoryInterface;
use RuntimeException;

/**
 * Order Registry Class to manage the registration and retrieval of order-related orders.
 *
 * This class is responsible for registering, retrieving, and managing order orders.
 */
class OrderRegistry
{
    /**
     * Registered order orders identified by a key.
     *
     * @var Collection
     */
    protected Collection $orders;

    /**
     * Instance of OrderRepositoryInterface to load order orders when needed.
     *
     * @var OrderRepositoryInterface
     */
    protected OrderRepositoryInterface $orderRepository;

    /**
     * Constructor to initialize the OrderRegistry with a given OrderRepositoryInterface.
     *
     * @param OrderRepositoryInterface $orderRepository The order repository to load orders when needed.
     */
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;

        // Initialize as a Collection to store registered orders
        $this->orders = Collection::make();
    }

    /**
     * Retrieve an order order by its key, loading lazily if not already registered.
     *
     * @param string|int $orderId The key under which the order order is registered.
     *
     * @return OrderInterface The order order registered under the given key.
     */
    public function get(string|int $orderId): OrderInterface
    {
        /** @var OrderInterface $order */
        $order = $this->orders->get($orderId, fn() => $this->orderRepository->find($orderId));

        // Lazy load the order order if it is not already registered
        return $order;
    }

    /**
     * Register an order order by key, with an option to handle duplicate keys gracefully.
     *
     * @param string $key The key to register the order order under.
     * @param mixed $value The order order to register.
     * @param bool $graceful Option to handle duplicate keys gracefully.
     *
     * @throws InvalidArgumentException If the key is already registered (when $graceful is false).
     *
     * @return void
     */
    public function register(string $key, mixed $value, bool $graceful = false): void
    {
        if ($this->orders->has($key)) {
            if ($graceful) {
                return;
            }

            throw new RuntimeException('Registry key "' . $key . '" already exists');
        }

        // Register the order order under the given key
        $this->orders->put($key, $value);
    }

    /**
     * Check if an order order is registered under a given key.
     *
     * @param string $key The key to check.
     *
     * @return bool True if the key is registered, false otherwise.
     */
    public function isRegistered(string $key): bool
    {
        return $this->orders->has($key);
    }

    /**
     * Unregister an order order by key, removing it from the registry.
     *
     * @param string $key The key to unregister.
     *
     * @return void
     */
    public function unregister(string $key): void
    {
        $this->orders->forget($key);
    }

    /**
     * Retrieve all registered order orders (key-value pairs).
     *
     * @return array An associative array of all registered key-value pairs for order orders.
     */
    public function getAll(): array
    {
        return $this->orders->toArray();
    }

    /**
     * Clear all registered order orders, resetting the registry.
     *
     * @return void
     */
    public function _resetState(): void
    {
        // Reset the Collection holding order orders
        $this->orders = Collection::make();
    }

    /**
     * Destruct registry items, ensuring all order orders are unregistered upon destruction.
     *
     * @return void
     */
    public function __destruct()
    {
        // Unregister each order on object destruction
        $this->orders->each(fn($key) => $this->unregister($key));
    }
}
