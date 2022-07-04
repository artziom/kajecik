<?php

namespace App\Factory;

use App\Entity\Budget;
use App\Repository\BudgetRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Budget>
 *
 * @method static Budget|Proxy createOne(array $attributes = [])
 * @method static Budget[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Budget|Proxy find(object|array|mixed $criteria)
 * @method static Budget|Proxy findOrCreate(array $attributes)
 * @method static Budget|Proxy first(string $sortedField = 'id')
 * @method static Budget|Proxy last(string $sortedField = 'id')
 * @method static Budget|Proxy random(array $attributes = [])
 * @method static Budget|Proxy randomOrCreate(array $attributes = [])
 * @method static Budget[]|Proxy[] all()
 * @method static Budget[]|Proxy[] findBy(array $attributes)
 * @method static Budget[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Budget[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static BudgetRepository|RepositoryProxy repository()
 * @method Budget|Proxy create(array|callable $attributes = [])
 */
final class BudgetFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'name' => self::faker()->text(),
            'createdAt' => null, // TODO add DATETIME ORM type manually
            'updatedAt' => null, // TODO add DATETIME ORM type manually
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Budget $budget): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Budget::class;
    }
}
