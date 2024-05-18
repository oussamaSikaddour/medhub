<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informations Patient - {{ $patientData->full_name_fr }}</title>
  <style>
    body {
      width: 21cm;
      margin: 0;
      font-family: 'Noto Sans', Arial, sans-serif;
      font-size: 12pt;
    }

    h1 {
      text-align: center;
      font-size: 18pt;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    li {
      margin-bottom: 10px;
    }

    li:first-child {
      font-weight: bold;
    }


    .patient-image {
      width: 100px;
      height: 100px;
      float: left;
      margin-right: 15px;
    }

    .examen-images {
      clear: both;
    }

    .examen-image {
        width: 100%;
      height: 800px; /* Set image height to 800px */
      object-fit: cover; /* Resize image to fit container, maintaining aspect ratio */
      display: block;
      margin-top: 15px;
    }
.stay {
height: 800px;
}


  </style>
</head>
<body>
  <h1>Informations Patient</h1>

  <div>
    @if ($patientData->image)
      <img src="{{ $patientData->image->url }}" alt="Patient Image" class="patient-image">
    @endif
    <ul>
      <li><strong>Nom:</strong> {{ $patientData->last_name_fr }}  {{ $patientData->first_name_fr }}</li>
      <li><strong>Code:</strong> {{ $patientData->code }}</li>
    </ul>
  </div>



  @if ($patientData->includeRadios)
  <h2>Examens</h2>

  @if ($patientData->examenRadios->isNotEmpty())
    <ul>
      @foreach ($patientData->examenRadios as $examenRadio)
        <li>
          <strong>Date d'examen:</strong> {{ $examenRadio->created_at->format('Y-m-d') }}<br>
          <strong>Type:</strong> {{ $examenRadio->type }}<br>

          <div >
          {!! $examenRadio->report !!}
          </div>

          @if ($examenRadio->images->isNotEmpty())
            <div class="examen-images">
              @foreach ($examenRadio->images as $image)
                <img src="{{ public_path("storage/".$image->path) }}" alt="Examen Image" class="examen-image">
              @endforeach
            </div>
          @else
            <p>Aucun examen associé.</p>
          @endif
        </li>
      @endforeach
    </ul>
  @else
    <p>Aucun examen antérieur trouvé.</p>
  @endif
  @endif

  @if ($patientData->includeMStays)
  <h2>Séjours Médicaux</h2>

  @if ($patientData->medicalStays->isNotEmpty())
    <ul>
      @foreach ($patientData->medicalStays as $medicalStay)
        <div class="stay" >
          <strong>Date d'admission:</strong> {{ $medicalStay->entry_date }}<br>
          <strong>Motif du séjour:</strong> {{ $medicalStay->entry_mode }}<br>

        <div >
            {!! $medicalStay->diagnostic !!}

        </div>

        @if($medicalStay->release_date)
        <strong>Date de sortie:</strong> {{ $medicalStay->release_date }}<br>
        <strong>Motif du sortie:</strong> {{ $medicalStay->release_mode }}<br>
        <div >
            {!! $medicalStay->release_state !!}
        </div>
        <div >
            {!! $medicalStay->indication_given !!}
        </div>
        @endIf
    </div>
      @endforeach
    </ul>
  @else
    <p>Aucun séjour médical antérieur trouvé.</p>
  @endif
  @endif
</body>
</html>
