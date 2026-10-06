<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    function about(): View {
        return view('about');
    }

     function array(): View {
        //array prehistorico
        $array1 = array();
        //array actual
        $array2 = [];
        $array2[] = 'Juan';
        $array2[] = 'Pepe';
        $array2[] = 'Maria';
        $array2[10] = 'Elisabeth';
        $array2[] = 'Paco';
        $array3 = ['Juan', 'Pepe', 'Maria'];
        $alumnos = [
            'Ajarif Saika, Fátima',
            'Albarrán Joya, Antonio',
            'Burgos Tomé, Adrián',
            'Carrascosa Delgado, Pablo',
            'Castillo García, Joaquín',
            'El Issmail Al Assaf, Amara',
            'Fernández Álvarez, Adrián',
            'Galdón Fernández, Abraham',
            'García González, Ignacio',
            'García López, Pilar',
            'Gorlat Castro, Raúl',
            'Hernández Recio, Iván',
            'Kordass Rjaf-Allah, Noussayr',
            'Maldonado Navarro, Manuel',
            'Montero Pelegrina, Pedro',
            'Montoro Ruiz, Alba',
            'Pérez Montalbán, Christian',
            'Sánchez Sorroche, José',
            'Serrano Rodríguez, Pablo',
            'Vereda Orozco, Gonzalo Jesús',
            'Vicaria García, Francisco Javier',
'            Vilar Martín, Blas',
            'Villegas Rivera, Luis',
        ];

        $grupo = 'Segundo de Desarrollo de Aplicaciones Web A';
        return view('array', ['grupo' => $grupo, "alumnos" => $alumnos]);
        
    }

    /*function aboutMetodo(): View {
        return view('about');
    }*/

    function index(): View {
        return view('index');
    }

    function portfolio(): View{
        return view('portfolio');
    }
}