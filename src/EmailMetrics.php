<?php
namespace Baghayi\PepipostAPI;

use DateTime;

class EmailMetrics
{

    private $date;
    private $tag;
    private $metrics;

    public function __construct(DateTime $date, string $tag, array $metrics)
    {
        $this->date = $date;
        $this->tag = $tag;
        $this->metrics = $metrics;
    }

    public function date(): DateTime
    {
        return $this->date;
    }

    public function tag(): string
    {
        return $this->tag;
    }

    public function bounce(): int
    {
        return (int) ($this->metrics['bounce'] ?? 0);
    }

    public function softBounce(): int
    {
        return (int) ($this->metrics['soft_bounce'] ?? 0);
    }

    public function hardBounce(): int
    {
        return (int) ($this->metrics['hard_bounce'] ?? 0);
    }

    public function open(): int
    {
        return (int) ($this->metrics['open'] ?? 0);
    }

    public function uniqueOpen(): int
    {
        return (int) ($this->metrics['unique_open'] ?? 0);
    }

    public function dropped(): int
    {
        return (int) ($this->metrics['dropped'] ?? 0);
    }

    public function click(): int
    {
        return (int) ($this->metrics['click'] ?? 0);
    }

    public function spam(): int
    {
        return (int) ($this->metrics['spam'] ?? 0);
    }

    public function sent(): int
    {
        return (int) ($this->metrics['sent'] ?? 0);
    }

    public function invalid(): int
    {
        return (int) ($this->metrics['invalid'] ?? 0);
    }

}
