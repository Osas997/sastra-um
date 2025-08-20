<?php

namespace App\Enums;

enum CitranKategori: string
{
    case VISUAL = 'visual';
    case AUDITORI = 'auditori';
    case OLFAKTORI = 'olfaktori';
    case GUSTATORI = 'gustatori';
    case TAKTIL = 'taktil';
    case KINESTETIK = 'kinestetik';
    case ORGANIK = 'organik';
}
