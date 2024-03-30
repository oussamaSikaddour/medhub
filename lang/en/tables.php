<?php
return [
    "common"=>[
        "excel-file-type-err"=>"The file must be in Excel format (XLSX, XLS, CSV)",
    ],
    'users'=> [
     "fullName"=>"Name",
     "email"=>"Email",
     "specialty"=>"Specialty",
     "registration-date"=>"Registration Date",
     "phone"=>"Phone Number",
     'card_number'=>"National identification number",
     'birth_date'=>"Birth Date",
     'birth_place'=>"Birth Place",
     'address'=>"Address",
     "experience"=>"Experience",
     "field"=>"Field",
      "specialty"=>"Specialty",
      "grade"=>"Grade",
     "filters"=>[
              "specialty"=>"Specialty :",
              "user-type"=>"User Role :"
     ],
     "not-found"=>"No users Found at the moment",
    ],

"examen-radios"=>[
          "doctorName"=>"Doctor Name",
          "type"=>"Exam Type",
         "createdAt"=>"Exam Date",
         "dateMin"=>"Date start",
         "dateMax"=>"Date End",
          "filters"=>[
            "type"=>"Exam Type:",
            ],
        "not-found"=>"No radiological exams  Found at the moment",
        ],

];
