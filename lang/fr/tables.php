<?php
return [
    "common" => [
        "excel-file-type-err" => "Le fichier doit être au format Excel (XLSX, XLS, CSV)",
    ],
    'users' => [
        "fullName" => "Nom",
        "email" => "E-mail",
        "specialty" => "Spécialité",
        "registration-date" => "Date d'inscription",
        "phone" => "Numéro de téléphone",
        'card_number' => "Numéro d'identification national",
        'birth_date' => "Date de naissance",
        'birth_place' => "Lieu de naissance",
        'address' => "Adresse",
        "experience" => "Expérience",
        "field" => "Domaine",
        "specialty" => "Spécialité",
        "grade" => "Grade",
        "filters" => [
            "specialty" => "Spécialité :",
            "user-type" => "Rôle de l'utilisateur :",
        ],
        "not-found" => "Aucun utilisateur trouvé pour le moment",
    ],


    'patients' => [
        'not-found' => 'Aucun patient trouvé pour le moment.',
    ],



    'examen-radios' => [
        'doctorName' => 'Nom du docteur',
        'type' => 'Type d\'examen',
        'createdAt' => 'Date de l\'examen',
        'dateMin' => 'Date de début',   // Added French translation
        'dateMax' => 'Date de fin',     // Added French translation
        'filters' => [
            'type' => 'Type d\'examen :',
        ],
        'not-found' => 'Aucun examen radiologique trouvé pour le moment.',
    ],
    'medical-stays' => [
        'not-found' => 'Aucun séjour médical trouvé pour le moment',
    ],

];
