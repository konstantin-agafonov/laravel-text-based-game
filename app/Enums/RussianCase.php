<?php

namespace App\Enums;

use App\Enums\Traits\ToArrayTrait;
use App\Enums\Traits\ValueByNameTrait;

/*
 * Перечисление падежей русского языка.
 */
enum RussianCase: int implements Lableable, Arrayable, ValueByNameInterface
{
    use ToArrayTrait,
        ValueByNameTrait;

    /*
     * Именительный.
     */
    case NOMINATIVE = 0;

    /*
     * Родительный.
     */
    case GENITIVE = 1;

    /*
     * Дательный.
     */
    case DATIVE = 2;

    /*
     * Винительный.
     */
    case ACCUSATIVE = 3;

    /*
     * Творительный.
     */
    case INSTRUMENTAL = 4;

    /*
     * Предложный.
     */
    case PREPOSITIONAL = 5;

    /**
     * Возвращает лейбл на русском языке.
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
     * Возвращает лейбл на английском языке.
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
