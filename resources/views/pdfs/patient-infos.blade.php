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

/* Header */
.entete {
  width: 100%;
  height: 100px;
  object-fit: contain;
}

/* Patient information */

.patient__infos{
    width: 100%;
}
.patient__infos  td {
  vertical-align: middle;
}
.patient__infos  td p{
margin: 10px;
}

.patient__img {
  width: 150px;
  height: 150px;
  margin-left:300px;
  border: 3px solid black;
  border-radius: 10px;
}


/* Clearing floats */
.examen-images {
  clear: both;
}

/* Examen images */
.examen-image {
  width: 100%;
  height: 800px;
  object-fit: cover;
  display: block;
  margin-top: 15px;
}

/* Medical stay */
.stay {
  height: 800px;
  padding: 10px; /* Add padding for content within stay */
  border: 1px solid #ddd; /* Add a light border for separation */
  margin-bottom: 15px; /* Add spacing between stays */
}


  </style>
</head>
<body>
    <img  class="intete" src="{{public_path("img/entete.png") }}" alt="">

  <table class="patient__infos">

    <tr>
        <td>

                <p><strong>Nom:</strong> {{ $patientData->last_name_fr }}  {{ $patientData->first_name_fr }}</p>
                 <p><strong>Code:</strong> {{ $patientData->code }}</p>
                 <p><strong>DDN:</strong> {{ $patientData->birth_date }}</p>

        </td>
        <td>
            @if ($patientData->image)
            <img
            src="{{ public_path("storage/".$patientData->image->path) }}"
            alt="Patient Image"
            class="patient__img">
          @endif
        </td>
    </tr>
  </table>



  @if ($patientData->includeRadios)
  <h3>Examens Radiologiques</h3>

  @if ($patientData->examenRadios->isNotEmpty())
    <ul>
      @foreach ($patientData->examenRadios as $examenRadio)
        <li>
          <strong>Date d'examen:</strong> {{ $examenRadio->created_at->format('Y-m-d') }}<br>
          <strong>Type:</strong> {{ app('my_constants')['RADIO_TYPES']['fr'][$examenRadio->type] }}<br>

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
  <h3>Séjours Médicaux</h3>

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
