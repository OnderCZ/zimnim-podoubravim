<?php
declare(strict_types=1);
$data = require __DIR__ . '/config.php';
function h($value): string { return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function icsEscape(string $s): string { return str_replace(["\\", ";", ",", "\r\n", "\n"], ["\\\\", "\\;", "\\,", "\\n", "\\n"], $s); }

if (isset($_GET['download']) && $_GET['download'] === 'kalendar') {
    $day = str_replace('-', '', (string)$data['date_iso']);
    $localZone = new DateTimeZone('Europe/Prague');
    $utcZone = new DateTimeZone('UTC');
    $startUtc = (new DateTimeImmutable($data['date_iso'] . ' ' . $data['start_time'], $localZone))->setTimezone($utcZone)->format('Ymd\THis\Z');
    $endUtc = (new DateTimeImmutable($data['date_iso'] . ' ' . $data['end_time'], $localZone))->setTimezone($utcZone)->format('Ymd\THis\Z');
    $uid = 'zimnim-podoubravim-' . $day . '@obecsobinov.cz';
    $lines = [
        'BEGIN:VCALENDAR', 'VERSION:2.0', 'PRODID:-//Zimnim Podoubravim//CS', 'CALSCALE:GREGORIAN',
        'BEGIN:VEVENT', 'UID:' . $uid, 'DTSTAMP:' . gmdate('Ymd\THis\Z'),
        'DTSTART:' . $startUtc,
        'DTEND:' . $endUtc,
        'SUMMARY:' . icsEscape($data['title'] . ' – ' . $data['edition']),
        'DESCRIPTION:' . icsEscape($data['memorial'] . '. ' . $data['category'] . '. Více: ' . $data['website']),
        'LOCATION:' . icsEscape($data['location']),
        'URL:' . $data['website'], 'END:VEVENT', 'END:VCALENDAR'
    ];
    header('Content-Type: text/calendar; charset=utf-8');
    header('Content-Disposition: attachment; filename="zimnim-podoubravim-' . (int) $data['year'] . '.ics"');
    echo implode("\r\n", $lines) . "\r\n";
    exit;
}
$routes = $data['routes'];
?><!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#176BB1">
  <meta name="description" content="<?= h($data['title'] . ' – ' . $data['edition'] . '. ' . $data['date_text'] . ', ' . $data['location'] . '. Trasy 15 a 20 km, mapa, propozice a praktické informace.') ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= h($data['title'] . ' ' . $data['year']) ?>">
  <meta property="og:description" content="<?= h($data['date_text'] . ' · ' . $data['memorial'] . ' · Trasy 15 a 20 km') ?>">
  <?php if (!empty($data['site_url'])): ?>
  <meta property="og:image" content="<?= h(rtrim($data['site_url'], '/') . '/assets/img/og-nahled.png') ?>">
  <meta property="og:url" content="<?= h($data['site_url']) ?>">
  <?php endif; ?>
  <title><?= h($data['title'] . ' ' . $data['year']) ?> | <?= h($data['edition']) ?></title>
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/main.js" defer></script>
</head>
<body>
<a class="skip-link" href="#obsah">Přejít na obsah</a>
<div class="top-line"></div>
<header class="site-header" id="nahoru">
  <div class="container header-inner">
    <a class="brand" href="#nahoru" aria-label="Zimním Podoubravím – úvod">
      <span class="brand-sign" aria-hidden="true"><img src="assets/img/symbol-memorialu.png" width="46" height="46" alt=""></span>
      <span class="brand-words"><strong>ZIMNÍM<br>PODOUBRAVÍM</strong><small><?= h($data['edition']) ?> · <?= h($data['year']) ?></small></span>
    </a>
    <button class="menu-toggle" type="button" aria-controls="main-nav" aria-expanded="false"><span></span><span></span><span class="sr-only">Otevřít navigaci</span></button>
    <nav class="main-nav" id="main-nav" aria-label="Hlavní navigace">
      <a href="#trasy">Trasy</a>
      <a href="#mapa">Mapa a ke stažení</a>
      <a href="#informace">Informace</a>
      <a href="#kontakty">Kontakty</a>
      <a class="nav-action" href="#trasy">Vybrat trasu <span aria-hidden="true">↗</span></a>
    </nav>
  </div>
</header>
<main id="obsah">
  <section class="hero" aria-labelledby="hero-title">
    <div class="container hero-grid">
      <div class="hero-copy">
        <p class="organizers-label"><span class="organizer-rule" aria-hidden="true"></span><?= h($data['organizers']) ?> <span class="organizers-word">POŘÁDAJÍ</span></p>
        <p class="eyebrow"><span class="line"></span><?= h($data['category']) ?></p>
        <h1 id="hero-title">ZIMNÍM<br><span>PODOUBRAVÍM</span></h1>
        <p class="hero-memorial"><?= h($data['memorial']) ?></p>
        <div class="event-date"><span class="edition-tag"><?= h($data['edition']) ?></span><span class="date-card"><small><?= h($data['date_day']) ?></small><strong><?= h($data['date_display']) ?></strong></span></div>
        <p class="hero-intro"><?= h($data['intro']) ?></p>
        <div class="hero-buttons"><a class="button button-primary" href="#trasy">Vybrat trasu <span aria-hidden="true">↗</span></a><a class="button button-secondary" href="#mapa">Prohlédnout mapu <span aria-hidden="true">→</span></a></div>
      </div>
      <div class="hero-art" aria-hidden="true"><div class="hero-crests"><img src="assets/img/symbol-memorialu.png" alt=""><img src="assets/img/znak-sobinov.svg" alt=""></div><img class="hero-landscape" src="assets/img/krajina.svg" alt="" fetchpriority="high"><div class="art-label"><span class="art-label-icon">↗</span><span>DVA OKRUHY<br>JEDEN SPOLEČNÝ CÍL.</span></div></div>
    </div>
    <div class="container"><div class="hero-bottom"><span><span class="dot"></span> SOBÍŇOV · VYSOČINA</span><span><?= h($data['date_text']) ?></span></div></div>
  </section>

  <section class="facts" aria-label="Základní informace">
    <div class="container facts-grid">
      <div class="fact"><span class="fact-icon" aria-hidden="true">01 /</span><div><small>KDY A KDE</small><strong><?= h($data['date_text']) ?></strong><span><?= h($data['location']) ?></span></div></div>
      <div class="fact"><span class="fact-icon" aria-hidden="true">02 /</span><div><small>START / CÍL</small><strong>Od <?= h($data['start_time']) ?> <em>—</em> do <?= h($data['end_time']) ?></strong><span>Start i cíl: <?= h($data['location']) ?></span></div></div>
      <div class="fact"><span class="fact-icon" aria-hidden="true">03 /</span><div><small>STARTOVNÉ</small><strong><?= h($data['entry_adults']) ?></strong><span><?= h($data['entry_children']) ?></span></div></div>
    </div>
  </section>

  <section class="section routes-section" id="trasy" aria-labelledby="routes-heading">
    <div class="container">
      <div class="section-heading"><div><p class="section-kicker">01 / VYBER SI SVOU CESTU</p><h2 id="routes-heading">Dva okruhy.<br><span>Jeden společný cíl.</span></h2></div><p>Vyberte si vzdálenost, otevřete si trasu v Mapy.com nebo si stáhněte GPX do své navigace.</p></div>
      <div class="routes-grid">
        <?php foreach ($routes as $route): ?>
        <article class="route-card route-<?= h($route['color']) ?>">
          <div class="route-card-top"><span class="route-index">TRASA / <?= h($route['distance']) ?></span><span class="route-card-arrow" aria-hidden="true">↗</span></div>
          <div class="route-card-main"><div class="route-info"><div class="distance"><strong><?= h($route['distance']) ?></strong><span>KM</span></div><p class="route-name"><?= h($route['name']) ?></p><p class="route-places"><?= h(implode(' → ', $route['places'])) ?></p></div><a class="qr-link" href="<?= h($route['url']) ?>" target="_blank" rel="noopener noreferrer" aria-label="Otevřít trasu <?= h($route['distance']) ?> km"><img src="<?= h($route['qr']) ?>" alt="QR kód trasy <?= h($route['distance']) ?> km" width="114" height="114" loading="lazy"><small>NAČÍST TRASU</small></a></div>
          <div class="route-actions"><a class="route-link" href="<?= h($route['url']) ?>" target="_blank" rel="noopener noreferrer">Otevřít v Mapy.com <span aria-hidden="true">↗</span></a><a class="route-secondary-link" href="<?= h($route['gpx']) ?>" download>Stáhnout GPX ↓</a></div>
        </article>
        <?php endforeach; ?>
      </div>
      <div class="own-route"><div class="own-route-symbol" aria-hidden="true">✳</div><p><strong>Dáváte přednost vlastní cestě?</strong> <?= h($data['custom_route']) ?></p></div>
    </div>
  </section>

  <section class="section map-section" id="mapa" aria-labelledby="map-heading">
    <div class="container map-layout"><div class="map-copy"><p class="section-kicker">02 / PŘIPRAV SE NA CESTU</p><h2 id="map-heading">Mapa, kterou<br><span>máš po ruce.</span></h2><p>Oba okruhy na jedné turistické mapě. Stáhněte si mapu A5 pro tisk nebo si otevřete trasu v telefonu.</p>
      <div class="map-legend"><span><i class="legend-stripe legend-red"></i> 15 km</span><span><i class="legend-stripe legend-blue"></i> 20 km</span></div>
      <div class="download-list">
        <a href="<?= h($data['files']['map']) ?>" download><span class="download-icon">PDF</span><span><strong>Mapa obou tras</strong><small>A5 · připraveno k tisku</small></span><span class="download-arrow">↓</span></a>
        <a href="<?= h($data['files']['description']) ?>" download><span class="download-icon">PDF</span><span><strong>Popis tras</strong><small>A5 · druhá strana mapy</small></span><span class="download-arrow">↓</span></a>
        <a href="<?= h($data['files']['combined']) ?>" download><span class="download-icon">PDF</span><span><strong>Mapa + popis oboustranně</strong><small>A5 · obě strany v jednom PDF</small></span><span class="download-arrow">↓</span></a>
        <a href="<?= h($data['files']['poster']) ?>" download><span class="download-icon">PDF</span><span><strong>Plakát akce</strong><small>A4 · <?= h($data['year']) ?> · pro sdílení a tisk</small></span><span class="download-arrow">↓</span></a>
        <a href="<?= h($data['files']['social']) ?>" download><span class="download-icon">PNG</span><span><strong>Poutač pro sociální sítě</strong><small>1080 × 1350 px · <?= h($data['year']) ?></small></span><span class="download-arrow">↓</span></a>
      </div>
      <p class="map-credit">Turistický podklad: Mapy.com / Seznam.cz. Při navigaci doporučujeme řídit se především odkazem do Mapy.com nebo GPX. Před tiskem ověřte použití mapového podkladu.</p>
      <?php if (!empty($data['mapy_embed_url'])): ?>
        <a class="text-link" href="#interaktivni-mapa">Přejít na interaktivní mapu ↗</a>
      <?php endif; ?>
    </div>
    <a class="map-image-wrap" href="assets/img/mapa-a5.png" target="_blank" rel="noopener noreferrer" aria-label="Zvětšit mapu obou tras"><div class="map-image-label">TURISTICKÁ MAPA · A5 <span aria-hidden="true">↗</span></div><img src="assets/img/mapa-a5.webp" alt="Mapa okruhů 15 a 20 km v okolí Sobíňova" loading="lazy" width="1200" height="1703"><span class="map-image-bottom">Klepnutím zvětšíte mapu</span></a>
    </div>
    <?php if (!empty($data['mapy_embed_url'])): ?><div class="container iframe-area" id="interaktivni-mapa"><h3>Interaktivní mapa</h3><iframe loading="lazy" referrerpolicy="strict-origin-when-cross-origin" title="Interaktivní mapa trasy" src="<?= h($data['mapy_embed_url']) ?>"></iframe></div><?php endif; ?>
  </section>

  <section class="section details-section" id="informace" aria-labelledby="details-heading">
    <div class="container"><div class="section-heading compact"><div><p class="section-kicker">03 / DOBRÉ VĚDĚT</p><h2 id="details-heading">Všechno důležité.<br><span>Na jednom místě.</span></h2></div></div>
      <div class="details-layout"><div class="accordions"><details><summary><span>Společný úsek obou tras</span><i aria-hidden="true">+</i></summary><p><?= h($data['shared_route']) ?></p></details>
      <?php foreach ($routes as $route): ?><details><summary><span>Pokračování – <?= h($route['distance']) ?> km</span><i aria-hidden="true">+</i></summary><p><?= h($route['details']) ?></p></details><?php endforeach; ?></div>
      <div class="important-card"><span class="card-small-label">PŘED STARTEM</span><h3>Co je dobré vědět?</h3><ul><?php foreach ($data['important'] as $item): ?><li><?= h($item) ?></li><?php endforeach; ?></ul><a class="calendar-link" href="?download=kalendar">Přidat akci do kalendáře <span aria-hidden="true">↗</span></a></div>
      </div>
    </div>
  </section>

  <section class="contact-section" id="kontakty" aria-labelledby="contacts-heading">
    <div class="container"><div class="contact-head"><div><p class="section-kicker">04 / OZVI SE NÁM</p><h2 id="contacts-heading">Máš dotaz?<br><span>Rádi poradíme.</span></h2></div><div class="partner-marks"><img class="crest-mark" src="assets/img/znak-sobinov.svg" alt="Znak obce Sobíňov" width="60" height="69" loading="lazy"><img class="memorial-mark" src="assets/img/logo-memorialu-moderni.png" alt="Modernizované logo Memoriálu Ladislava Dymáčka" width="280" height="74" loading="lazy"></div></div>
      <div class="contact-grid"><?php foreach ($data['contacts'] as $contact): ?><div class="contact-card"><strong><?= h($contact['name']) ?></strong><span><?= h($contact['subtitle']) ?></span><a href="tel:<?= h($contact['phone_href']) ?>"><?= h($contact['phone_label']) ?> <span aria-hidden="true">↗</span></a><?php if ($contact['email'] !== ''): ?><a class="email-link" href="mailto:<?= h($contact['email']) ?>"><?= h($contact['email']) ?></a><?php endif; ?><?php if (!empty($contact['website'])): ?><a class="website-link" href="<?= h($contact['website']) ?>" target="_blank" rel="noopener noreferrer">obecsobinov.cz ↗</a><?php endif; ?></div><?php endforeach; ?></div>
    </div>
  </section>
</main>
<footer class="site-footer"><div class="container footer-inner"><p><strong><?= h($data['title'] . ' ' . $data['year']) ?></strong><br><?= h($data['organizers']) ?></p><div><a href="<?= h($data['website']) ?>" target="_blank" rel="noopener noreferrer">obecsobinov.cz ↗</a><span>© <?= h($data['year']) ?> · Informace pro účastníky</span></div><a class="back-top" href="#nahoru" aria-label="Zpět nahoru">↑</a></div></footer>
</body>
</html>
