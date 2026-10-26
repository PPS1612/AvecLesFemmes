<?php

namespace App\Enum;

enum StatutDemande: string
{
    case EN_ATTENTE = 'EN_ATTENTE';
    case ANNULEE = 'ANNULEE';
    case ACCEPTEE = 'ACCEPTEE';
    case REFUSEE = 'REFUSEE';
}