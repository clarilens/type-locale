<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use Clarilens\TypeLocale\Country;
use Clarilens\TypeLocale\Currency;
use Clarilens\TypeLocale\Language;
use Clarilens\TypeLocale\WebDomainZone;

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

check(count(Country::cases()) === 249, 'Country snapshot size changed');
check(count(Language::cases()) === 184, 'ISO 639-1 snapshot size changed');
check(count(Currency::cases()) === 178, 'ISO 4217 snapshot size changed');
check(count(WebDomainZone::cases()) === 316, 'IANA ccTLD snapshot size changed');

check(Country::AM->value === 'AM', 'Armenia country code');
check(Language::HY->value === 'hy', 'Armenian language code');
check(WebDomainZone::AM->value === 'am', 'Armenian ccTLD');
check(Country::tryFrom('HY') === null, 'Language code must not be a country');
check(Currency::AMD->symbol() === '֏', 'Armenian dram symbol');
check(Currency::USD->symbol() === '$', 'US dollar symbol');
check(Currency::XAU->symbol() === 'XAU', 'Currency without symbol uses code');

echo "OK\n";
