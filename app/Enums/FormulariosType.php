<?php

namespace App\Enums;

class FormulariosType
{
    public const FROM_OPTIONS = [
        'PayPal' => 'PayPal',
        'Skrill' => 'Skrill',
        'Bitcoin' => 'Bitcoin',
        'Tehther' => 'Tehther',
    ];

    public const TRANS_PERU_OPTIONS = [
        'PeruSol' => 'PeruSol',
        'PeruDolar' => 'PeruDolar',
    ];

    public const TRANS_COLOMBIA_OPTIONS = [
        'ColombiaBolivar' => 'ColombiaBolivar',
    ];
}