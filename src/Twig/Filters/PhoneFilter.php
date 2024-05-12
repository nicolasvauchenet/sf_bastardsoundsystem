<?php

namespace App\Twig\Filters;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class PhoneFilter extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('format_phone', $this->formatPhone(...)),
        ];
    }

    public function formatPhone($number): array|string|null
    {
        $number = str_replace([' ', '.'], '', $number);

        if(str_starts_with($number, '0')) {
            $number = '+33' . substr($number, 1);
        }

        return preg_replace("/^\+33(\d)(\d{2})(\d{2})(\d{2})(\d{2})$/", "+33 $1 $2 $3 $4 $5", $number);
    }
}
