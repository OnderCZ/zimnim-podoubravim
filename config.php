<?php
/**
 * ZDE UPRAVUJTE OBSAH WEBU.
 * Design je v assets/css/style.css, chování v assets/js/main.js.
 * Pro změnu roku nebo termínu upravte i soubory ke stažení (PDF / GPX).
 */
return [
    'title' => 'Zimním Podoubravím',
    'site_url' => '', // Po zveřejnění vyplňte skutečnou adresu webu, např. https://vasedomena.cz/podoubravim
    'year' => '2027',
    'edition' => '33. ročník',
    'memorial' => 'Memoriál Ladislava Dymáčka',
    'category' => 'Lyžařský přejezd / turistický pochod',
    'date_text' => 'Sobota 6. února 2027',
    'date_day' => 'SOBOTA',
    'date_display' => '6. ÚNORA 2027',
    'date_iso' => '2027-02-06',
    'start_time' => '07:00',
    'end_time' => '16:00',
    'location' => 'Kulturní dům Sobíňov',
    'entry_adults' => '30 Kč',
    'entry_children' => 'Děti do 15 let zdarma',
    'intro' => 'Tradiční zimní pochod a lyžařský přejezd mírně zvlněnou krajinou Podoubraví. Vyberte si jednu ze dvou tras, nebo se vydejte vlastní cestou.',
    'organizers' => 'Obec Sobíňov × KČT Havlíčkův Brod',
    'website' => 'https://www.obecsobinov.cz/',
    'routes' => [
        [
            'distance' => '15',
            'color' => 'red',
            'name' => 'Kratší okruh',
            'places' => ['Sobíňov', 'Dolní Sokolovec', 'Podmoklany', 'Sobíňov'],
            'details' => 'Na silnici doprava a přes Bezděkov a Štěpánov do Podmoklan. U turistického rozcestníku doprava po modré turistické značce do cíle v kulturním domě v Sobíňově.',
            'url' => 'https://mapy.cz/s/basocofujo',
            'gpx' => 'downloads/trasa-15-km.gpx',
            'qr' => 'assets/img/qr-15.png',
        ],
        [
            'distance' => '20',
            'color' => 'blue',
            'name' => 'Delší okruh',
            'places' => ['Sobíňov', 'Bílek', 'Libice nad Doubravou', 'Nový Studenec', 'Sobíňov'],
            'details' => 'Na silnici doleva a po padesáti metrech doprava. Po místní asfaltové cestě dále kolem pily do Libice nad Doubravou. V Libici nad Doubravou dále po silnici přes Štěpánov a Podmoklany do Nového Studence. Za zámkem doprava polní cestou nad Sobíňov, pak již po modré turistické značce do cíle v kulturním domě.',
            'url' => 'https://mapy.cz/s/ceguzulumo',
            'gpx' => 'downloads/trasa-20-km.gpx',
            'qr' => 'assets/img/qr-20.png',
        ],
    ],
    'shared_route' => 'Od startu k autobusové zastávce a dále doleva do obce po modré turistické značce do Sopot. Od zastávky ČD doprava po červené turistické značce nebo po neznačené polní cestě pod tratí kolem hájenky na Bílek. Od zastávky ČD po zelené turistické značce k lesu. U okraje lesa doprava po neznačené asfaltové cestě lesem do Dolního Sokolovce.',
    'custom_route' => 'Můžete si zvolit vlastní trasu podle svých představ a fyzických schopností. Do cíle můžete přijít odkudkoliv.',
    'important' => [
        'Na startu obdrží každý účastník popis trasy a mapku.',
        'Pochod se koná za každého počasí a každý účastník jde na vlastní nebezpečí.',
        'Děti do 15 let se mohou zúčastnit v doprovodu osoby starší 18 let.',
        'V cíli obdrží každý účastník pamětní list a bude připraveno občerstvení.',
        'Prosíme účastníky, aby se během pochodu chovali ohleduplně k přírodě a respektovali své okolí.',
    ],
    'contacts' => [
        [
            'name' => 'Obecní úřad Sobíňov',
            'subtitle' => 'Pondělí–pátek · 7:00–15:00',
            'phone_label' => '569 694 534',
            'phone_href' => '+420569694534',
            'email' => '',
        ],
        [
            'name' => 'Miloš Starý',
            'subtitle' => 'Kontakt k pochodu',
            'phone_label' => '725 101 185',
            'phone_href' => '+420725101185',
            'email' => 'ou@obecsobinov.cz',
        'website' => 'https://www.obecsobinov.cz/',
        ],
    ],
    'files' => [
        'map' => 'downloads/mapa-a5.pdf',
        'description' => 'downloads/popis-tras-a5.pdf',
        'poster' => 'downloads/plakat-a4.pdf',
        'combined' => 'downloads/mapa-a-popis-oboustranne-a5.pdf',
        'social' => 'downloads/poutac-1080x1350.png',
    ],
    // Chcete-li později přidat živou Mapy.com mapu, vložte adresu iframe
    // získanou přes "Sdílet" -> "Vložit mapu do vlastních stránek".
    // Nepoužívejte běžný krátký odkaz mapy.cz/s/... jako adresu iframe.
    'mapy_embed_url' => '',
];
