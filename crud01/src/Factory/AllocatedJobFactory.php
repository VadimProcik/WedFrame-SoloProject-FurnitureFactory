<?php

namespace App\Factory;

use App\Entity\AllocatedJob;
use App\Repository\AllocatedJobRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<AllocatedJob>
 *
 * @method        AllocatedJob|Proxy create(array|callable $attributes = [])
 * @method static AllocatedJob|Proxy createOne(array $attributes = [])
 * @method static AllocatedJob|Proxy find(object|array|mixed $criteria)
 * @method static AllocatedJob|Proxy findOrCreate(array $attributes)
 * @method static AllocatedJob|Proxy first(string $sortedField = 'id')
 * @method static AllocatedJob|Proxy last(string $sortedField = 'id')
 * @method static AllocatedJob|Proxy random(array $attributes = [])
 * @method static AllocatedJob|Proxy randomOrCreate(array $attributes = [])
 * @method static AllocatedJobRepository|RepositoryProxy repository()
 * @method static AllocatedJob[]|Proxy[] all()
 * @method static AllocatedJob[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static AllocatedJob[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static AllocatedJob[]|Proxy[] findBy(array $attributes)
 * @method static AllocatedJob[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static AllocatedJob[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class AllocatedJobFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(AllocatedJob $allocatedJob): void {})
        ;
    }

    protected static function getClass(): string
    {
        return AllocatedJob::class;
    }
}
