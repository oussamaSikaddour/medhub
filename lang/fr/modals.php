<?php

return [
    "common" => [
        "submit-btn" => "Enregistrer"
    ],
    "user" => [
        'email' => "E-mail",
        "l-name" => "Nom de famille",
        "f-name" => "Prénom",
        "profile-img" => "Photo de profil",
        "card-number" => "Numéro de carte nationale",
        "b-date" => "Date de naissance",
        'b-place' => "Lieu de naissance",
        "address" => "Adresse",
        'tel' => "Numéro de téléphone",
        "work-title" => "Titre professionnel",
        "field" => "Domaine professionnel",
        "specialty" => "Spécialité",
        "experience" => "Expérience",
        "grade" => "Grade",
        "h3" => "L'e-mail doit être valide, un code de vérification y sera envoyé",
        "for" => [
            "add-employee" => "Ajouter un employé",
            "update-employee"=>"Mettre à jour l'employé"
        ],
        "profile-pic-type-err"=>"La photo de profil doit être au format image"
    ],
    "role" => [
        "for" => [
            "manage" => "Gérer les rôles"
        ]
        ],

"patient" => [
            "code" => "Code Patient",
            "fNameFr" => "Prénom en français",
            "fNameAr" => "Prénom en arabe",
            "lNameAr" => "Nom en arabe",
            "lNameFr" => "Nom en français",
            "FPhone" => "Premier téléphone",
            "SPhone" => "Deuxième téléphone",
            "email" => "Email",
            "address" => "Adresse",
            "bDate" => "Date de naissance",
            "bPlace" => "Lieu de naissance",
            "cardNumber" => "Numéro de carte nationale",
            "mState" => "État civil",
            "gender" => "Genre",
            "doctorId" => "Médecin traitant",
            "doctorName"=>"Nom du Médecin traitant ",
            "for" => [
                "add" => "Ajouter un patient",
                "update" => "Mettre à jour le patient"
            ],
            "patient-pic-type-err" => "La photo du patient doit être au format image"
        ],
        'medical-stay' => [
            'entryDate' => 'Date d\'entrée',
            'room' => 'Chambre',
            'bed' => 'Lit',
            'entryMode' => 'Mode d\'entrée',
            'diagnostic' => 'Diagnostic',
            'releaseDate' => 'Date de sortie',
            'releaseMode' => 'Mode de sortie',
            'releaseState' => 'État de sortie',
            'indicationGiven' => 'Indication donnée',
            'patientId' => 'Patient',
            'for' => [
                'add' => 'Ajouter une séjour médical',
                'update' => 'Mettre à jour le séjour médical',
            ],
        ],
        'examen-radio' => [
            'type' => 'Type d\'examen',
            'report' => 'Rapport d\'examen',
            'images' => 'Images de l\'examen',
            'for' => [
                'add' => 'Ajouter un examen radiologique',
                'update' => 'Mettre à jour un examen radiologique',
            ],
            'img-type-err' => 'Au moins une des images de l\'examen n\'est pas dans un format d\'image valide.',
        ],
];
