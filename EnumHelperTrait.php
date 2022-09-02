<?php

declare(strict_types=1);

trait EnumHelperTrait
{
    /**
     * @return array
     */
    public static function names(): array
    {
        return array_column(static::cases(), 'name');
    }

    /**
     * @return array
     */
    public static function values(): array
    {
        return array_column(static::cases(), 'value');
    }

    /**
     * @return array
     */
    public static function toArray(): array
    {
        return array_combine(self::names(), self::values());
    }

    /**
     * @return array
     */
    public static function toArrayFlip(): array
    {
        return array_flip(self::toArray());
    }

    /**
     * @return bool|string
     */
    public static function toJson(): bool|string
    {
        return json_encode(self::toArray(), JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return bool|string
     */
    public static function toJsonFlip(): bool|string
    {
        return json_encode(self::toArrayFlip(), JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function hasValue($value): bool
    {
        return !empty(static::tryFrom($value));
    }

    /**
     * @param $key
     * @return bool
     */
    public static function hasCase($key): bool
    {
        return array_key_exists($key, self::toArray());
    }
}
