<?php

return [
  "common"=>[
    "submit-btn"=>"Save"
  ],
 "user"=>[
    'email'=>"Email",
    "l-name"=>"Last Name",
    "f-name"=>"First Name",
    "profile-img"=>"Profile picture",
    "card-number"=>"National Card Number",
    "b-date"=>"Birth Date",
    'b-place'=>"Birth Place",
     "address"=>"Address",
    'tel'=>"Phone Number",
    "work-title"=>"Work Title",
     "field"=>"Work Field",
    "specialty"=>"Specialty",
     "experience"=>"Experience",
      "grade"=>"Grade",
    "h3"=>"The email must be valid, a verification code will be sent to it",
    "for"=>[
        "add-employee"=>"Add Employee",
         "update-employee"=>"Update Employee"
    ],
    "profile-pic-type-err"=>"The Profile picture must be in image format"
 ],
 "role"=>[
  "for"=>[
    "manage"=>"Manage Roles"
  ]
  ],
"patient"=>[
    "code"=>"Patient Code",
    "fNameFr"=>"First name in french",
    "fNameAr"=>"First name in Arabic",
    "lNameAr"=>"Last name in Arabic",
    "lNameFr"=>"Last name in french",
    "FPhone"=>"First Phone",
    "SPhone"=>"Second Phone",
    "email"=>"Email",
    "address"=>"Address",
    "bDate"=>"Birth Date",
    "bPlace"=>"Birth Place",
    "cardNumber"=>"National Card Number",
    "mState"=>"Marital State",
    "gender"=>"Gender",
    "doctorId"=>"Doctor",
    "doctorName"=>"Doctor Name",
    "for"=>[
        "add"=>"Add Patient",
         "update"=>"Update Patient"
    ],
    "patient-pic-type-err"=>"The Patient picture must be in image format"

],
"medical-stay"=>[
    "active-stay-err"=>"You cannot add another medical stay for this patient as they currently have an active stay without a release date",
    "entryDate"=>"Entry Date",
    "room"=>"Room",
    "bed"=>"Bed",
    'entryMode'=>"Entry Mode",
    'diagnostic'=>'diagnostic',
    'releaseDate'=>'releaseDate',
    'releaseMode'=>'releaseMode',
    'releaseState'=>'releaseState',
    'indicationGiven'=>'indication Given',
    'patientId'=>'Patient ',
    "for"=>[
        "add"=>"Add Medical Stay",
         "update"=>"Update Medical Stay"
    ],
],
"examen-radio"=>[
    "type"=>" Exam Type",
    "report"=>"Exam report",
    "images"=>"Exam images",
    "for"=>[
        "add"=>"Add radiological exam",
        "update"=>"update radiological exam"
    ],
    "img-type-err"=>"at least one of the images in the exam is not in image format"

]
];
