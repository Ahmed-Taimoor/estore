<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class HomeProducts extends Enum
{
    const FEATURED_PRODUCTS = 'featured_products';
    const EXPLORE_PRODUCTS = 'explore_products';
    const NEWARRIVAL_PRODUCTS = 'newarrival_products';
    const BESTSELLER_PRODUCTS = 'bestseller_products';
}