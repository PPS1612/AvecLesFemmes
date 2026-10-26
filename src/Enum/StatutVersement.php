<?php
namespace App\Enum;


enum StatutVersement: string
{
    case VERSE = 'VERSE';
    case EN_ATTENTE_RATTRAPAGE = 'EN_ATTENTE_RATTRAPAGE';
    case RATTRAPAGE = 'RATTRAPAGE';
    CASE MANQUEE = 'MANQUE';
}