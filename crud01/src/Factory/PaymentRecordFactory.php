<?php

namespace App\Factory;

use App\Entity\PaymentRecord;
use App\Repository\PaymentRecordRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<PaymentRecord>
 *
 * @method        PaymentRecord|Proxy create(array|callable $attributes = [])
 * @method static PaymentRecord|Proxy createOne(array $attributes = [])
 * @method static PaymentRecord|Proxy find(object|array|mixed $criteria)
 * @method static PaymentRecord|Proxy findOrCreate(array $attributes)
 * @method static PaymentRecord|Proxy first(string $sortedField = 'id')
 * @method static PaymentRecord|Proxy last(string $sortedField = 'id')
 * @method static PaymentRecord|Proxy random(array $attributes = [])
 * @method static PaymentRecord|Proxy randomOrCreate(array $attributes = [])
 * @method static PaymentRecordRepository|RepositoryProxy repository()
 * @method static PaymentRecord[]|Proxy[] all()
 * @method static PaymentRecord[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static PaymentRecord[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static PaymentRecord[]|Proxy[] findBy(array $attributes)
 * @method static PaymentRecord[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PaymentRecord[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class PaymentRecordFactory extends ModelFactory
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
            'dateTime' => self::faker()->dateTime(),
            'status' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(PaymentRecord $paymentRecord): void {})
        ;
    }

    protected static function getClass(): string
    {
        return PaymentRecord::class;
    }
}
