<?php

namespace App\Enums;

use App\Enums\Traits\ToArrayTrait;
use App\Enums\Traits\ValueByNameTrait;

/*
 * Enumeration of Russian grammatical cases.
 */
enum RussianCase: int implements Lableable, Arrayable, ValueByNameInterface
{
    use ToArrayTrait,
        ValueByNameTrait;

    /*
     * Nominative.
     */
    case NOMINATIVE = 0;

    /*
     * Genitive.
     */
    case GENITIVE = 1;

    /*
     * Dative.
     */
    case DATIVE = 2;

    /*
     * Accusative.
     */
    case ACCUSATIVE = 3;

    /*
     * Instrumental.
     */
    case INSTRUMENTAL = 4;

    /*
     * Prepositional.
     */
    case PREPOSITIONAL = 5;

    /**
     * Returns label in Russian.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::NOMINATIVE => 'именительный',
            self::GENITIVE => 'родительный',
            self::DATIVE => 'дательный',
            self::ACCUSATIVE => 'винительный',
            self::INSTRUMENTAL => 'творительный',
            self::PREPOSITIONAL => 'предложный',
        };
    }

    /**
     * Returns label in English.
     *
     * @return string
     */
    public function englishLabel(): string
    {
        return match ($this) {
            self::NOMINATIVE => 'nominative',
            self::GENITIVE => 'genitive',
            self::DATIVE => 'dative',
            self::ACCUSATIVE => 'accusative',
            self::INSTRUMENTAL => 'instrumental',
            self::PREPOSITIONAL => 'prepositional',
        };
    }
}
