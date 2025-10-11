<?php

namespace App\Enums;

/**
 * Интерфейс получения лейбла.
 */
interface Lableable
{
    /**
     * Возвращает лейбл.
     *
     * @return string
     */
    public function label(): string;
}
