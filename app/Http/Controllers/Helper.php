<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Helper extends Controller
{
    static public function dateFormatFr(string $date): string
    {
        // Créer un objet DateTime en utilisant la date fournie
        $dateTime = new DateTime($date);

        // Formater la date en français (jour mois année)
        return $dateTime->format('d/m/Y');
    }

    static public function dateTimeFormatFr(string $dateTime): string
    {
        // Créer un objet DateTime en utilisant la date et l'heure fournies
        $dateTimeObj = new DateTime($dateTime);

        // Formater la date et l'heure en français (jour mois année à heure:minute)
        return $dateTimeObj->format('d/m/Y à H:i');
    }


    static public function formatCustomDate(string $date)
    {
        $parsedDate = Carbon::parse($date);
        return $parsedDate->format('d M. Y H:i');
    }
}
