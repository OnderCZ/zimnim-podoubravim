# Zimním Podoubravím 2027 — WEB STUDIO / sjednocená verze

Tato sada vychází z původního webu STUDIO a navazuje na schválený plakát a tiskové materiály `STUDIO_ZAROVNANO` (9. 10. 2026). Zachovává jednoduchý **PHP + HTML + CSS + JavaScript**, bez databáze, WordPressu, externích JS/CSS knihoven a cookies pro analytiku.

## Nasazení na hosting

1. Rozbalte archiv. Nahrajte **obsah složky `Zimnim_Podoubravim_2027_WEB_STUDIO_SJEDNOCENO`** na PHP hosting (například do `public_html/podoubravim/`).
2. Je potřeba PHP **7.4 nebo novější**. Hlavní stránka se spouští ze souboru `index.php`.
3. Před zveřejněním upravte v `config.php` položku **`site_url`** na skutečnou úplnou veřejnou adresu webu, například `https://vase-domena.cz/podoubravim/`. Tato adresa slouží pro správný náhled odkazu na sociálních sítích. Dokud není vyplněná, OG obrázek v metadatech úmyslně neuvádíme.
4. Zkontrolujte údaje, odkazy na Mapy.com a podmínky použití mapového podkladu. Web nebyl z tohoto balíčku publikován na živou doménu.

### Náhled bez hostingu

Soubor `nahled.html` je statický náhled připravený přímo ze stejného PHP souboru. Otevřete jej v prohlížeči; všechny místní obrázky a styly jsou přiloženy. **Pouze odkaz „Přidat akci do kalendáře“ vyžaduje PHP**, protože soubor ICS vzniká dynamicky. Pro věrné ověření webu otevřete stránku přes PHP, například v adresáři projektu příkazem `php -S localhost:8000`.

## Kde co změnit

| Část webu | Soubor |
| --- | --- |
| Datum, ročník, kontakty, informace, Mapy.com, popisy tras a soubory ke stažení | `config.php` |
| HTML a rozložení částí stránky | `index.php` |
| Barvy, velikosti a responzivní vzhled | `assets/css/style.css` (poslední sekce STUDIO 2027 obsahuje finální doladění) |
| Mobilní navigace | `assets/js/main.js` |
| Zimní ilustrace z plakátu | `assets/img/krajina.svg` |
| Oficiální znak obce v SVG | `assets/img/znak-sobinov.svg` |
| Modernizovaný motiv memoriálu | `assets/img/symbol-memorialu.png` |
| Modernizované vodorovné logo memoriálu | `assets/img/logo-memorialu-moderni.png` |
| Mapa pro webové zobrazení | `assets/img/mapa-a5.webp` a `mapa-a5.png` |
| Dvě QR grafiky | `assets/img/qr-15.png` a `qr-20.png` |
| Široký obrázek pro sdílení odkazu na web | `assets/img/og-nahled.png` |
| Původní svislý poutač | `downloads/poutac-1080x1350.png` |
| Schválené tiskové materiály | `downloads/` |

Při aktualizaci data měňte `date_text`, `date_day`, `date_display`, `date_iso`, `year` a případně `edition` v `config.php`. Nezapomeňte zároveň vyměnit PDF plakátu a poutač. Mapa a popis tras A5 jsou **bez data a čísla ročníku** a mohou se používat v dalších letech, pokud zůstanou trasy stejné.

Barvy tras jsou konzistentně **15 km = cihlově červená `#B84C3E`; 20 km = modrá `#176BB1`**. Pokud měníte QR odkaz nebo GPS průběh trasy, nestačí upravit jen PHP konfiguraci: je nutné nahradit i QR obrázek, GPX a mapové tiskové podklady.

## Co je zahrnuto

- Úvodní část podle posledního plakátu: mírné kopce, smrky, řeka, běžkař a turista, aktualizované logo memoriálu a originální znak Sobíňova bez vnější bílé plochy.
- Přehledné informace o datu, startu, cíli a startovném.
- Karty 15 a 20 km s odkazy na Mapy.com, QR a GPX.
- Přesná turistická mapa dodaná zadavatelem, ke zvětšení a ke stažení.
- Tisková PDF: plakát A4, mapa A5, popis tras A5, oboustranná A5 mapa + popis.
- Poutač 1080 × 1350 px a nový široký náhled odkazu 1200 × 630 px.
- Popisy tras beze změny znění; důležitá informace o ohleduplnosti k přírodě.
- Kontakty, e-mail, web obce, přidání akce do kalendáře ve formátu `.ics`.
- Responzivní verze pro počítač, tablet a mobil; bez externích fontových souborů.

## Poznámky před zveřejněním

- **Mapy.com:** Mapový obrázek pochází z podkladů poskytnutých zadavatelem. Před veřejným nasazením ověřte licenční oprávnění a zachovejte uvedení zdroje Mapy.com / Seznam.cz. Viz https://licence.mapy.com/.
- **Čas a údaje:** Zkontrolujte konečné organizační údaje, čas, kontakty a platnost Mapy.com odkazů.
- **Případná interaktivní mapa:** `mapy_embed_url` v `config.php` přijímá výhradně skutečnou adresu iframe získanou na Mapy.com. Krátké odkazy `mapy.cz/s/...` zde nefungují. Není-li uvedeno, zobrazí se pouze stažitelná mapa.
- Web vyžaduje běžný PHP hosting; žádná platební brána, registrace či analytika není součástí balíčku.

## Původní podklady

Materiály `Zimnim_Podoubravim_2027_WEB_STUDIO.zip` (web) a schválená grafická sada `Zimnim_Podoubravim_2027_STUDIO_ZAROVNANO_komplet.zip` (plakáty, mapa, trasy, loga, sociální grafika). Originální znak obce je vložen z poskytnutého SVG.
