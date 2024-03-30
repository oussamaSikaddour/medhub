<?php
   return [
       "common"=>[
         "submit-btn"=>"Validate"
       ],
      "login"=>[
             "instruction"=>"Please provide the following information",
            'email'=>"Email",
            'password'=>"Password",
            "forget-password-link"=>"Forgot your password ?",
            "register-link"=>"Create an account",
            "no-user-err"=>"No matching users found with provided email and password",
            "too-many-attempts"=>"You have made too many attempts. Please try again in a few minutes."
          ],
     "register"=>[
        "first-f"=>[
            "instruction"=>"Your email must be valid, a verification code will be sent to you",
            "login-link"=>"I already have an account",
            "l-name"=>"Last Name",
            "f-name"=>"First Name",
            "b-date"=>"Birth Date",
            'email'=>"Email",
            'tel'=>"Phone Number",
            'password'=>"Password",
            "success-txt"=>"A verification code has been sent to your email address"
        ],
        "second-f"=>[
            "instruction"=>"Your email must be valid, a verification code will be sent to you",
            "new-code-btn"=>"Get a new verification code",
            'email'=>"Email",
            "code"=>"Verification code",
            'code-err'=>"Verification code is invalid"

        ]
        ],

        "forget-pwd"=>[
            "first-f"=>[
                "instruction"=>"Your email must be valid, a verification code will be sent to you",
                "email"=>"Email",
                "success-txt"=>"A verification code has been sent to your email address"
            ],
            "second-f"=>[
                "instruction"=>"Enter the verification code sent to you",
                'email'=>"Email",
                "code"=>"Verification code",
                "password"=>"The New Password",
                "no-user"=>"No matching users found with provided email",
                "code-err"=>"Verification code is invalid"
            ]
            ],

        "change-email"=>[
                "instruction"=>"Your new email must be a valid One",
                'old-email'=>"Old Email",
                "new-email"=>"New Email",
                "pwd"=>"Password",
                "no-user"=>"Check your old email or password",
                "success-txt"=>"your Email has been changed,You will now be logged out"

            ],
         "change-pwd"=>[
            "instruction"=>"Please provide the following information:",
           "pwd"=>"The Old Password",
           "new-pwd"=>"The New Password",
           "pwd-err"=>"check your old password",
           "success-txt"=>"your password has been changed. You will now be logged out"
         ],

        "site-params"=>[
            "first-f"=>[
                "instruction"=>"Please provide the following information:",
                "email"=>"Email",
                "password"=>"Password",
                "no-user"=>"No matching users found with provided email and password",
                "no-access"=>"You do not have the rights to access the next step",
                "success-txt"=>"Be careful when changing the global state of the platform"
            ],
            "second-f"=>[
                "instruction"=>"manage the maintenance state of the platform:",
                 "disable"=>"Disable",
                 "enable"=>"Enable",
                 "db-download-btn"=>"Download the database",
                 "no-db"=>"No database backups available.",
                 "state"=>"the maintenance state of the platform",
                 "success-txt"=>"You have successfully changed the maintenance state"
            ]

            ],

        "user"=>[
            'tel-match-err'=>"The phone number must commence with either 05, 06, or 07, followed by a precise sequence of 8 digits.",
            "add"=>[
             "success-txt"=>"User was created successfully",
            ],
            "update"=>[
             "success-txt"=>"User was successfully updated"
            ]
            ],
        "patient"=>[
            'tel-match-err'=>"The phone number must commence with either 05, 06, or 07, followed by a precise sequence of 8 digits.",
            'no-doctor-err'=>"you can't add patients rightnow ,doctors must be added before",
            "add"=>[
             "success-txt"=>"Patient was created successfully",
            ],
            "update"=>[
             "success-txt"=>"Patient was successfully updated"
            ]
            ],
        "medical-stay"=>[
            "add"=>[
             "success-txt"=>"Medical stay was added successfully",
            ],
            "update"=>[
             "success-txt"=>"Medical stay was successfully updated"
            ]
            ],
        "examen-radio"=>[
            "add"=>[
             "success-txt"=>" the radiological examination was added successfully",
            ],
            "update"=>[
             "success-txt"=>" the radiological examination was successfully updated"
            ]
            ],


          ]
     ;
