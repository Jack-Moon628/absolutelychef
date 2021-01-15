<?php 
namespace App\helper;

use App\Enums\PackageTypeEnums;

class PackagesList {

    const WAITING = [
        [
            'name'  => 'Single Job Post',
            'label' => 'Single Job Post £29',
            'description'  => '',
            'type' => PackageTypeEnums::WAITING,
            'price' => 29,
            'job_number' => 1,
        ],
        [
            'name'  => 'Two Job Posts',
            'label' => 'Two Job Posts £25 each, Special Offer.',
            'description'  => '',
            'type' => PackageTypeEnums::WAITING,
            'price' => 25,
            'job_number' => 2,
        ],
        [
            'name'  => 'Three Job Posts',
            'label' => 'Three Job Posts £22 each, Discount Offer.',
            'description'  => '',
            'type' => PackageTypeEnums::WAITING,
            'price' => 22,
            'job_number' => 3,
        ],
        [
            'name'  => 'Popular 5-10 Job Posts',
            'label' => 'Popular 5-10 Job Posts £19 each, Bulk buying discount Offer.',
            'description'  => '',
            'type' => PackageTypeEnums::WAITING,
            'price' => 19,
            'job_number' => 10,
        ]

    ];

    const PROFESSIONAL = [
        [
            'name'  => 'Single Job Post',
            'label' => 'Single Job Post £20',
            'description'  => '',
            'type' => PackageTypeEnums::PROFESSIONAL,
            'price' => 20,
            'job_number' => 1,
        ],
        [
            'name'  => 'Two Job Posts',
            'label' => 'Two Job Posts £16 each, Special Offer.',
            'description'  => '',
            'type' => PackageTypeEnums::PROFESSIONAL,
            'price' => 16,
            'job_number' => 2,
        ],
        [
            'name'  => 'Three Job Posts',
            'label' => 'Three Job Posts £14 each, Discount Offer.',
            'description'  => '',
            'type' => PackageTypeEnums::PROFESSIONAL,
            'price' => 14,
            'job_number' => 3,
        ],
        [
            'name'  => 'Popular 5-10 Job Posts',
            'label' => 'Popular 5-10 Job Posts £10 each, Bulk buying discount Offer.',
            'description'  => '',
            'type' => PackageTypeEnums::PROFESSIONAL,
            'price' => 10,
            'job_number' => 10,
        ]
    ];


    const ENTERPRISE = [
        [
            'name'  => 'Single Job Post',
            'label' => 'Single Job Post £10',
            'description'  => '',
            'type' => PackageTypeEnums::ENTERPRISE,
            'price' => 10,
            'job_number' => 1,
        ],
        [
            'name'  => 'Two Job Posts',
            'label' => 'Two Job Posts £8 each, Special Offer.',
            'description'  => '',
            'type' => PackageTypeEnums::ENTERPRISE,
            'price' => 8,
            'job_number' => 2,
        ],
        [
            'name'  => 'Three Job Posts',
            'label' => 'Three Job Posts £6 each, Discount Offer.',
            'description'  => '',
            'type' => PackageTypeEnums::ENTERPRISE,
            'price' => 6,
            'job_number' => 3,
        ],
        [
            'name'  => 'Popular 5-10 Job Posts',
            'label' => 'Popular 5-10 Job Posts £5 each, Bulk buying discount Offer.',
            'description'  => '',
            'type' => PackageTypeEnums::ENTERPRISE,
            'price' => 5,
            'job_number' => 10,
        ]
    ];
}


?>