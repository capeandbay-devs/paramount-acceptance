<?php

return [
    'paramount_api_key' => env('PARAMOUNT_API_KEY', ''),
    'paramount_location_region' => '',
    'paramount_location_regions' => [],
    'urls' => [
        'api' => 'https://api.webfdm.com',
        'web-sales' => 'https://websales.webfdm.com',
        'training' => [
            'get' => [
                'fm_resources'      => 'https://pacapi.webfdm.com/API/appointments/FM/Resources',
                'appointment_types' => 'https://api.webfdm.com/legacy/PAC/API/GetAppointmentTypes/' . env('PARAMOUNT_API_KEY') . '/'
            ],
            'post' => [
                'available_appointments' => 'https://pacapi.webfdm.com/API/appointments/Available',
                'book_appointment'       => 'https://api.webfdm.com/legacy/PAC/API/SaveProspect/' . env('PARAMOUNT_API_KEY')
            ]
        ],
        'pulse' => [
            'post' => [
                'prospect' => 'https://api.webfdm.com/legacy/PAC/API/SaveProspect/' . env('PARAMOUNT_API_KEY')
            ]
        ]
    ],
];
