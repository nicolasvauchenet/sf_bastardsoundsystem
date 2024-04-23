<?php

namespace App\AppBundle\Twig;

use DateTimeInterface;
use Exception;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DateExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('date_diff', [$this, 'dateDiff']),
        ];
    }

    /**
     * @throws Exception
     */
    public function dateDiff($date1, $date2): int
    {
        if(!($date1 instanceof \DateTimeInterface)) {
            $date1 = new \DateTimeImmutable($date1);
        }

        if(!($date2 instanceof \DateTimeInterface)) {
            $date2 = new \DateTimeImmutable($date2);
        }

        $interval = $date1->diff($date2);

        return (int)$interval->format('%r%a');
    }
}
