<?php

declare(strict_types=1);

namespace Elastic\Apm\Tests\UnitTests\ConfigTests;

use Elastic\Apm\Impl\Util\SingletonInstanceTrait;
use PHPUnit\Framework\Assert as PHPUnitAssert;

/**
 * @implements OptionTestMetadataInterface<string>
 */
final class StringOptionTestMetadata implements OptionTestMetadataInterface
{
    use SingletonInstanceTrait;

    /** @inheritDoc */
    public function randomValidValue(string &$rawValue, &$parsedValue, $differentFromParsedValue = null): void
    {
        if (!is_null($differentFromParsedValue)) {
            PHPUnitAssert::assertIsString($differentFromParsedValue);
        }

        $parsedValue = ($differentFromParsedValue ?? 'A') . '_X';
        $rawValue = $parsedValue;
    }

    /** @inheritDoc */
    public function invalidRawValues(): iterable
    {
        return [];
    }
}
