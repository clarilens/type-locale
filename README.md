# clarilens/type-locale

Shared PHP enums for standard country, language, currency, and country-code top-level domain identifiers. Requires PHP 8.1 or newer.

```php
use Clarilens\TypeLocale\Country;
use Clarilens\TypeLocale\Language;
use Clarilens\TypeLocale\Currency;
use Clarilens\TypeLocale\WebDomainZone;

Country::AM->value;                    // AM
Language::HY->value;                   // hy
Currency::AMD->value;                  // AMD
WebDomainZone::AM->value;              // am
```

The enums contain identifiers only. A country does not imply a language, currency, or top-level domain. Site language `hy` and country code `AM` are distinct. Display names belong in a separate localization layer. `Country::HY`, `Country::lang()`, `Country::fullName()`, and `Country::webDomainZone()` are removed.

## Data snapshots

The checked-in source files under `data/` are inputs to `python3 tools/generate.py`. Regeneration does not access the network. Review changes against the upstream registries before replacing snapshots, and release removals as breaking changes.

| Set | Snapshot | Source |
| --- | --- | --- |
| Country | `iso3166.tab`, current as of ISO/TC 46 N1127 (2024-02-29) per file header | [ISO 3166 country codes](https://www.iso.org/iso-3166-country-codes.html) and system `iso3166.tab` |
| Language | ISO 639-1 codes extracted from SIL ISO 639-3 code tables, 2026-07-15 | [SIL download tables](https://iso639-3.sil.org/code_tables/download_tables) |
| Currency | SIX ISO 4217 List One, published 2026-09-17 | [SIX data standards](https://www.six-group.com/en/products-services/financial-information/market-reference-data/data-standards.html) |
| WebDomainZone | IANA Root Zone Database, retrieved 2026-10-11 | [IANA root database](https://www.iana.org/domains/root/db) |

The language code snapshot is attributed to [SIL International](https://iso639-3.sil.org/). The package includes only ISO 639-1 two-letter codes; it does not include the full ISO 639-3 set. `Currency` includes current currency, fund, metal, and special unit codes with an alphabetic code in SIX List One. `WebDomainZone` uses ASCII (Punycode) values for internationalized country-code domains.

No source synonyms are shipped yet. Add them only after a shared real-world input and its meaning are verified.
