<?php

namespace App\Enums;

/**
 * Интерфейс получения значения перечисления по имени.
 */
interface ValueByNameInterface
{
    /**
     * Возвращает значение по имени.
     *
     * @param string $name Имя перечисления
     * @return int
     */
    public static function getValueByName(string $name): int;
}