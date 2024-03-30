<?php
return [
    "common"=>[
        "submit-btn"=>"تحقق"
    ],
    "login"=>[
        "instruction"=>"يرجى تقديم المعلومات التالية",
        'email'=>"البريد الإلكتروني",
        'password'=>"كلمة المرور",
        "forget-password-link"=>"هل نسيت كلمة المرور؟",
        "register-link"=>"إنشاء حساب",
        "no-user-err"=>"لم يتم العثور على مستخدمين مطابقين مع البريد الإلكتروني وكلمة المرور المقدمة",
        "too-many-attempts"=>"تم حظر محاولة تسجيل الدخول مؤقتًا بسبب تكرار المحاولات الفاشلة. يرجى المحاولة مرة أخرى في غضون بضع دقائق"
    ],
    "register"=>[
        "first-f"=>[
            "instruction"=>"يجب أن يكون بريدك الإلكتروني صالحًا ، سيتم إرسال رمز التحقق إليك",
            "login-link"=>"لدي حساب بالفعل",
            "l-name"=>"اللقب",
            "f-name"=>"الاسم",
            "b-date"=>"تاريخ الميلاد",
            'email'=>"البريد الإلكتروني",
            'tel'=>"رقم الهاتف",
            'password'=>"كلمة المرور",
            "success-txt"=>"تم إرسال رمز التحقق إلى عنوان بريدك الإلكتروني"
        ],
        "second-f"=>[
            "instruction"=>"أدخل رمز التحقق الذي تم إرساله إليك",
            "new-code-btn"=>"الحصول على رمز تحقق جديد",
            'email'=>"البريد الإلكتروني",
            "code"=>"رمز التحقق",
            'code-err'=>"رمز التحقق غير صالح"
        ]

    ]
    ,
    "forget-pwd"=>[
        "first-f"=>[
            "instruction"=>"يجب أن يكون بريدك الإلكتروني صالحًا ، سيتم إرسال رمز التحقق إليك",
            "email"=>"البريد الإلكتروني",
            "success-txt"=>"تم إرسال رمز التحقق إلى عنوان بريدك الإلكتروني"
        ],
        "second-f"=>[
            "instruction"=>"أدخل رمز التحقق الذي تم إرساله إليك",
            'email'=>"البريد الإلكتروني",
            "code"=>"رمز التحقق",
            "password"=>"كلمة المرور الجديدة",
            "no-user"=>"لم يتم العثور على مستخدمين مطابقين باستخدام البريد الإلكتروني المقدم",
            "code-err"=>"رمز التحقق غير صالح"
        ]
        ],
        "change-email" => [
            "instruction" => "يجب أن يكون البريد الإلكتروني الجديد صالحًا",
            'old-email' => "البريد الإلكتروني القديم",
            "new-email" => "البريد الإلكتروني الجديد",
            "pwd" => "كلمة المرور",
            "no-user" => "تحقق من بريدك الإلكتروني القديم أو كلمة المرور الخاصة بك",
            "success-txt" => "لقد تم تغيير بريدك الإلكتروني. سيتم الآن تسجيل خروجك."
        ],
        "change-pwd" => [
            "instruction" => "يرجى تقديم المعلومات التالية:",
            "pwd" => "كلمة المرور القديمة",
            "new-pwd" => "كلمة المرور الجديدة",
            "pwd-err" => "تحقق من كلمة المرور القديمة الخاصة بك",
            "success-txt" => "تم تغيير كلمة المرور الخاصة بك. سيتم تسجيل خروجك الآن."
        ],
        "site-params"=>[
            "first-f"=>[
                "instruction"=>"يرجى تقديم المعلومات التالية:",
                "email"=>"البريد الإلكتروني",
                "password"=>"كلمة المرور",
                "no-user"=>"لم يتم العثور على مستخدمين مطابقين مع البريد الإلكتروني وكلمة المرور المقدمة",
                "no-access"=>"ليس لديك حق الوصول إلى الخطوة التالية",
                "success-txt"=>"كن حذرًا عند تغيير الحالة العامة للمنصة"
            ],
            "second-f"=>[
                "instruction"=>"إدارة حالة صيانة المنصة:",
                "disable"=>"تعطيل",
                "enable"=>"تمكين",
                "db-download-btn"=>"تحميل قاعدة البيانات",
                "no-db"=>"لا توجد نسخ احتياطية لقاعدة البيانات متاحة.",
                "state"=>"حالة صيانة المنصة",
                "success-txt"=>"لقد قمت بتغيير حالة الصيانة بنجاح"
            ]
            ],
     "user" => [
        "tel-match-err" => "يجب أن يبدأ رقم الهاتف بإحدى الأرقام 05، 06، أو 07، تليها تسلسل دقيق من 8 أرقام.",
        "add" => [
                    "success-txt" => "تم إنشاء المستخدم بنجاح",
                ],
       "update" => [
                    "success-txt" => "تم تحديث المستخدم بنجاح",
                ]
                ],
    "patient" => [
    'tel-match-err' => "يجب أن يبدأ رقم الهاتف بـ 05، 06، أو 07، تليها تسلسل دقيق من 8 أرقام.",
         'no-doctor-err' => "لا يمكنك إضافة مرضى الآن، يجب إضافة الأطباء أولاً.",
                    "add" => [
                        "success-txt" => "تم إنشاء المريض بنجاح",
             ],
                    "update" => [
                        "success-txt" => "تم تحديث بيانات المريض بنجاح",
                    ]
        ],
        'medical-stay' => [
            'add' => [
                'success-txt' => 'تم إضافة الإقامة الطبية بنجاح',
            ],
            'update' => [
                'success-txt' => 'تم تحديث الإقامة الطبية بنجاح',
            ],
        ],
        'examen-radio' => [
            'add' => [
                'success-txt' => 'تم إضافة الفحص الإشعاعي بنجاح.',
            ],
            'update' => [
                'success-txt' => 'تم تحديث الفحص الإشعاعي بنجاح.',
            ],
        ],
];
