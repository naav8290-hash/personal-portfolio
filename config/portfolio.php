<?php

return [
    'meta' => [
        'title' => 'Vina Nuraini — Pelajar RPL & Creative Enthusiast',
        'description' => 'Portofolio Vina Nuraini, pelajar Rekayasa Perangkat Lunak (RPL) di SMKN 3 Banjar yang sedang mempelajari pengembangan web, desain antarmuka, dan multimedia.',
        'og_description' => 'Portofolio pribadi Vina Nuraini: proses belajar, latihan, dan kemampuan yang sedang dikembangkan di bidang web, desain, dan multimedia.',
        'updated' => '2026-11-13',
    ],

    'schema' => [
        'name' => 'Vina Nuraini',
        'jobTitle' => 'Pelajar Rekayasa Perangkat Lunak',
        'knowsAbout' => ['Dasar Pemrograman', 'Pengembangan Web', 'Desain Antarmuka', 'Multimedia'],
    ],

    'nav' => [
        ['id' => 'home', 'label' => 'Beranda'],
        ['id' => 'about', 'label' => 'Tentang'],
        ['id' => 'journey', 'label' => 'Belajar'],
        ['id' => 'skills', 'label' => 'Keahlian'],
        ['id' => 'projects', 'label' => 'Proyek'],
        ['id' => 'contact', 'label' => 'Kontak'],
    ],

    'contact' => [
        'placeholder' => false,
        'note' => '',
        'phone' => '+6285871269141',
        'phone_display' => '0858-****-9141',
        'whatsapp' => 'https://wa.me/6285871269141',
        'instagram' => 'https://instagram.com/vin_vjr',
        'instagram_handle' => '@vin_vjr',
        'github' => 'https://github.com/naav8290-hash',
        'github_handle' => 'naav8290-hash',
    ],

    'skills' => [
        [
            'title' => 'Programming Languages',
            'items' => [
                ['name' => 'HTML', 'icon' => 'icon-html'],
                ['name' => 'CSS', 'icon' => 'icon-css'],
                ['name' => 'JavaScript', 'icon' => 'icon-js'],
                ['name' => 'PHP', 'icon' => 'icon-php'],
            ],
        ],
        [
            'title' => 'Framework & Tools',
            'items' => [
                ['name' => 'Laravel', 'icon' => 'icon-laravel'],
                ['name' => 'Visual Studio Code', 'icon' => 'icon-vscode'],
            ],
        ],
        [
            'title' => 'Database',
            'items' => [
                ['name' => 'MySQL', 'icon' => 'icon-mysql'],
                ['name' => 'Microsoft Access', 'icon' => 'icon-access'],
                ['name' => 'SQL Server', 'icon' => 'icon-sqlserver'],
            ],
        ],
        [
            'title' => 'Design & Multimedia',
            'items' => [
                ['name' => 'Figma', 'icon' => 'icon-figma'],
                ['name' => 'Canva', 'icon' => 'icon-canva'],
                ['name' => 'CapCut', 'icon' => 'icon-capcut'],
            ],
        ],
        [
            'title' => 'Version Control',
            'items' => [
                ['name' => 'Git', 'icon' => 'icon-git'],
                ['name' => 'GitHub', 'icon' => 'icon-github'],
            ],
        ],
    ],

    'journey' => [
        [
            'period' => 'Awal',
            'title' => 'Mengenal Dasar Pemrograman',
            'description' => 'Mempelajari dasar pemrograman dan bagaimana sebuah website dibentuk.',
        ],
        [
            'period' => 'Eksplorasi',
            'title' => 'Mencoba Teknologi Web',
            'description' => 'Menggunakan HTML, CSS, JavaScript, PHP, dan Laravel dalam latihan dan proyek kecil.',
        ],
        [
            'period' => 'Kreatif',
            'title' => 'Mempelajari Desain dan Multimedia',
            'description' => 'Menggunakan Figma dan Canva untuk merancang tampilan, serta CapCut untuk editing video.',
        ],
        [
            'period' => 'Sekarang',
            'title' => 'Terus Mengembangkan Kemampuan',
            'description' => 'Melanjutkan latihan, memperbaiki hasil kerja, dan mempelajari hal baru secara bertahap.',
        ],
    ],

    'journey_note' => '',

    'projects' => [
        [
            'id' => 'access-internship',
            'title' => 'Access Internship',
            'category' => 'Web Development',
            'summary' => 'Website Access Internship yang dikembangkan sebagai bagian dari kegiatan Praktik Kerja Lapangan (PKL). Saya terlibat dalam pengembangan website, termasuk pengerjaan fitur Project.',
            'description' => 'Access Internship adalah website yang dikembangkan dalam kegiatan Praktik Kerja Lapangan (PKL). Selama kegiatan berlangsung, saya terlibat dalam proses pengembangan website, salah satunya dengan mengerjakan bagian fitur Project menggunakan Laravel dan PHP.',
            'objective' => 'Membantu pengembangan website Access Internship sebagai bagian dari kegiatan PKL, dengan fokus pada pengerjaan fitur Project.',
            'features' => [
                'Terlibat dalam pengembangan website Access Internship',
                'Mengerjakan bagian fitur Project',
                'Menggunakan Laravel dan PHP',
            ],
            'tech' => ['Laravel', 'PHP'],
            'image' => 'assets/img/projects/access-internship.png',
            'imageAlt' => 'Tampilan halaman utama website Access Internship',
            'imageWidth' => 1920,
            'imageHeight' => 933,
            'repo' => '',
            'demo' => '',
            'placeholder' => false,
            'note' => '',
        ],
        [
            'id' => 'bookingaja',
            'title' => 'BookingAja',
            'category' => 'Personal Project',
            'summary' => 'Proyek website pribadi yang saya kembangkan secara mandiri sebagai bagian dari proses belajar dan eksplorasi pengembangan aplikasi web.',
            'description' => 'BookingAja adalah proyek website yang saya bangun sendiri untuk memperdalam pemahaman tentang pengembangan aplikasi web. Proyek ini saya jadikan sarana belajar Laravel dan PHP secara langsung, dari perencanaan fitur hingga implementasi.',
            'objective' => 'Mengembangkan website secara mandiri sebagai media belajar Laravel dan pengembangan aplikasi web.',
            'features' => [
                'Dikembangkan secara mandiri sebagai proyek pribadi',
                'Dibangun dengan Laravel dan PHP',
                'Dijadikan sarana belajar pengembangan aplikasi web',
            ],
            'tech' => ['Laravel', 'PHP'],
            'image' => 'assets/img/projects/bookingaja.png',
            'imageAlt' => 'Tampilan dashboard pengguna pada website BookingAja',
            'imageWidth' => 1600,
            'imageHeight' => 766,
            'repo' => '',
            'demo' => '',
            'placeholder' => false,
            'note' => '',
        ],
        [
            'id' => 'peterp-phi-docs',
            'title' => 'Dokumentasi Tutorial PetERP',
            'category' => 'Video Editing & Documentation',
            'summary' => 'Kontribusi pada dokumentasi video tutorial penggunaan PetERP. Fokus saya pada proses editing video tutorial dan penyusunan dokumentasi proyek.',
            'description' => 'Kegiatan dokumentasi berupa video tutorial penggunaan PetERP. Kontribusi saya berfokus pada proses editing video tutorial serta penyusunan dokumentasi proyek, sehingga panduan penggunaan dapat dipahami dengan lebih mudah.',
            'objective' => 'Menyunting video tutorial PetERP dan menyusun dokumentasi proyek yang mudah diikuti.',
            'features' => [
                'Editing video tutorial penggunaan PetERP',
                'Penyusunan dokumentasi proyek',
            ],
            'tech' => [],
            'image' => 'assets/img/projects/peterp-docs.png',
            'imageAlt' => 'Tampilan playlist video Tutorial Penggunaan PetERP di YouTube',
            'imageWidth' => 1600,
            'imageHeight' => 740,
            'repo' => '',
            'demo' => '',
            'placeholder' => false,
            'note' => '',
        ],
    ],
];
