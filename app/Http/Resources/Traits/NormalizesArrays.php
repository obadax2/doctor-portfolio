<?php

namespace App\Http\Resources\Traits;

trait NormalizesArrays
{
    /**
     * Filament Repeaters store data as [{key: "value"}] but seeders use flat ["value"].
     * Normalize both to flat string array.
     */
    private function normalizeSimple(?array $data, string $key): array
    {
        if (empty($data)) return [];
        $first = $data[array_key_first($data)] ?? null;
        if (is_string($first)) return $data;
        // Handle both indexed and keyed arrays from repeater
        return array_values(array_map(
            fn($item) => is_string($item) ? $item : ($item[$key] ?? $item[0] ?? (string) $item),
            $data
        ));
    }
}