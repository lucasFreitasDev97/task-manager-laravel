<?php

namespace App\Enums;

enum TaskStatus: string
{
    case ONGOING = 'ongoing';
    case NOT_STARTED = 'not_started';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match($this) {
            self::ONGOING => 'Em andamento',
            self::NOT_STARTED => 'Não iniciado',
            self::COMPLETED => 'Concluído',
        };
    }
}
