<?php
return [
    "common" => [
        "excel-file-type-err" => "يجب أن يكون الملف بتنسيق إكسل (XLSX ، XLS ، CSV)",
    ],
    'users' => [
        "fullName" => "الاسم",
        "email" => "البريد الإلكتروني",
        "specialty" => "التخصص",
        "registration-date" => "تاريخ التسجيل",
        "phone" => "رقم الهاتف",
        'card_number' => "الرقم الوطني",
        'birth_date' => "تاريخ الميلاد",
        'birth_place' => "مكان الميلاد",
        'address' => "العنوان",
        "experience" => "الخبرة",
        "field" => "المجال",
        "specialty" => "التخصص",
        "grade" => "الدرجة",
        "filters" => [
            "specialty" => "التخصص:",
            "user-type" => "دور المستخدم:",
        ],
        "not-found" => "لا يوجد مستخدمون في الوقت الحالي",
    ],

    'patients' => [
        'title' => 'بحث المرضى',
        'not-found' => 'لم يتم العثور على أي مريض في الوقت الحالي.',
    ],
    'examen-radios' => [
        'doctorName' => 'اسم الطبيب',
        'type' => 'نوع الفحص',
        'createdAt' => 'تاريخ الفحص',
        'dateMin' => 'تاريخ البدء',        // Added Arabic translation
        'dateMax' => 'تاريخ الانتهاء',      // Added Arabic translation
        'filters' => [
            'type' => 'نوع الفحص :',
        ],
        'not-found' => 'لم يتم العثور على أي فحوصات إشعاعية في الوقت الحالي.',
    ],
    'medical-stays' => [
        'not-found' => 'لم يتم العثور على إقامات طبية في الوقت الحالي',
    ],


];
