<?php

    return [

        /**
         * Roles
         */
        'roles' => [
            'root' => [
                'alberto.rsesc@protonmail.com',
            ],
            'editor' => array_merge([
                'aniluczf@gmail.com',
            ], explode(',', env('BLOG_EDITORS'))),
        ],

        // Pet Sizes
        'sizes' => [
            'mini' => 'Miniatura',
            'small' => 'Pequeño',
            'medium' => 'Mediano',
            'large' => 'Grande'
        ],

        'veterinary_services' => [
            'Cesárea',
            'Cirugías',
            'Consulta',
            'Desparasitación',
            'Diagnóstico',
            'Esterilización',
            'Estética',
            'Vacunación',
            'Venta de accesorios',
        ],

        'genders' => [
            'male',
            'female'
        ],

        'age_ranges' => [
            'días',
            'semanas',
            'meses',
            'años'
        ],

        /*
         * Reporting Causes
        */
        'reporting_causes' => [
            'no-answer' => 'No Contestan',
            'invalid-data' => 'Info. Errónea',
            'offensive' => 'Contenido Ofensivo',
            'spam' => 'Spam/Irrelevante',
            'suspicious' => 'Posible Fraude/Sospechoso',
            'other' => 'Otro'
        ],

    ];
