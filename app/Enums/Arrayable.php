<?php

namespace App\Enums;

/**
 * Интерфейс получения перечисления в виде массива.
 */
interface Arrayable
{
    /**
     * Возвращает ассоциативный массив.
     *
     * @return array
     */
    public static function toArray(): array;
}