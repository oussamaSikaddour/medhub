<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informations Patient - {{ $patientData->full_name_fr }}</title>
    <style>
        body {
            width: 21cm; /* A4 page width in centimeters */
            margin: 0;
            font-family: 'Noto Sans', Arial, sans-serif;
            font-size: 12pt; /* Adjust font size as needed */
        }

        h1 {
            text-align: center;
            font-size: 18pt; /* Adjust heading size as needed */
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        li:first-child { /* Style the first list item (usually patient name) */
            font-weight: bold;
        }

        .patient-image {
            width: 100px;
            height: 100px;
            float: left;
            margin-right: 15px;
        }

        .examen-images {
            clear: both; /* Clear floats after examination details */
        }

        .examen-image {
            width: 75px;
            height: 75px;
            margin: 5px;
            border: 1px solid #ddd;
            float: left;
        }
    </style>
</head>

<body>

<h1>Informations Patient</h1>

<div>
    @if ($patientData->image?->url)
        <img src="{{ $patientData->image?->url }}" alt="Patient Image" class="patient-image">
    @endif
    <ul>
        <li><strong>Nom:</strong> {{ $patientData->full_name_fr }}</li>
        <li><strong>Code:</strong> {{ $patientData->code }}</li>
    </ul>
</div>

<h2>Examens</h2>

@if ($patientData->examenRadios->isNotEmpty())
    <ul>
        @foreach ($patientData->examenRadios as $examenRadio)
            <li>
                <strong>Date d'examen:</strong> {{ $examenRadio->created_at->format('Y-m-d') }}<br>
                <strong>Type:</strong> {{ $examenRadio->type }}<br>

            </li>
            @if ($examenRadio->images->isNotEmpty())
            <div class="examen-images">

                @foreach ($examenRadio->images as $image)
                <img src="https://picsum.photos/200/300" alt="Examen Image" class="examen-image">
            @endforeach

            </div>
        @endif
        @endforeach
    </ul>
@else
    <p>Aucun examen antérieur trouvé.</p>
@endif

<h2>Séjours Médicaux</h2>

@if ($patientData->medicalStays->isNotEmpty())
    <ul>
        @foreach ($patientData->medicalStays as $medicalStay)
            <li>
                <strong>Date d'admission:</strong> {{ $medicalStay->entry_date}}<br>
                <strong>Date de sortie:</strong> {{ $medicalStay->release_date }}<br>
                <strong>Motif du séjour:</strong> {{ $medicalStay->entry_mode }}<br>
            </li>
        @endforeach
    </ul>
@else
    <p>Aucun séjour médical antérieur trouvé.</p>
@endif

</body>
</html>
