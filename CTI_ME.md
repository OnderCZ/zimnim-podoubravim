# ZIMNÍM PODOUBRAVÍM 2027 — web STUDIO edice

Moderní jednorázový web pro turistický pochod a lyžařský přejezd. Dodáno jako hotový projekt v HTML, PHP, CSS a malém množství JavaScriptu. Nepotřebuje WordPress, databázi, API klíče, externí knihovny ani registraci účastníků.

## Nasazení na hosting

1. Rozbalte ZIP. **Obsah adresáře `Zimnim_Podoubravim_2027_WEB`** nahrajte přes FTP/SFTP do cílového adresáře webu (například `public_html/podoubravim/`).
2. Hosting musí podporovat **PHP 7.4 nebo novější** (doporučené PHP 8.2+). Ve výchozím nastavení serveru se spouští soubor `index.php`.
3. Otevřete příslušnou adresu, např. `https://vase-domena.cz/podoubravim/`. Náhled webu lze po rozbalení otevřít také přes `nahled.html` bez PHP, ale odkaz *Přidat do kalendáře* funguje pouze přes `index.php`.
4. Do souboru `config.php` doplňte položku `site_url`, aby náhled na sociálních sítích používal správnou absolutní adresu obrázku.

### Jak spustit web na vlastním počítači

V adresáři projektu spusťte `php -S localhost:8000` a v prohlížeči otevřete `http://localhost:8000/`. Případně lze využít XAMPP, Laragon či jiný lokální PHP server. Soubor `index.php` samotný dvojklikem neotevírejte – potřebuje PHP.

## Co a kde upravovat

| Co chci změnit | Kde |
| --- | --- |
| Datum, texty, ročník, kontakt, startovné, trasy, jejich odkazy | `config.php` |
| Hlavní rozložení, sekce, HTML, vlastní texty navíc | `index.php` |
| Barvy, velikost nadpisů, mezery, responzivní vzhled | `assets/css/style.css` |
| Mobilní menu | `assets/js/main.js` |
| Ilustrace zimní krajiny (vektory) | `assets/img/krajina.svg` |
| QR kódy tras | `assets/img/qr-15.png`, `assets/img/qr-20.png` |
| Mapa a tiskový popis | `assets/img/mapa-a5.png` a `downloads/*.pdf` |
| Znaky pořadatelů | `assets/img/znak-sobinov.png`, `assets/img/memorial.png` |
| Obrázek pro sdílení | `assets/img/sdileni.png` |

Pro změnu hlavní modré či oranžové upravte hodnoty na začátku `assets/css/style.css` ve `:root` (například `--navy`, `--blue`, `--orange`). Písmo: Lato, se systémovým záložním písmem. Web neobsahuje ani nevyžaduje balíčky fontových souborů.

**Pozor při změně tras:** pokud v `config.php` změníte Mapy.com odkaz, je nutné také **vygenerovat a nahradit příslušný QR obrázek**. Pokud změníte GPS stopu, nahraďte rovněž odpovídající GPX a mapový PDF/PNG podklad. Pouhá úprava textu nemění stažené soubory ani QR kódy.

**Pozor při změně roku nebo data:** soubor `?download=kalendar` vzniká automaticky z PHP konfigurace, ale název stahovaného ICS v `index.php` a statické soubory PDF/PNG obsahují rok 2027, takže je nutné je při nové akci aktualizovat.

## Obsah webu

- Úvodní část podle STUDIO edice plakátu, s vlastním vektorovým zimním motivem
- Datum, start/cíl, startovné
- Karty okruhů 15/20 km s URL Mapy.com, QR a GPX
- Mapa A5 a tiskové materiály ke stažení
- Rozbalovací popis společného úseku a dvou větví trasy
- Informace pro účastníky, počasí, doprovod dětí a kontakty
- Soubor ICS pro přidání akce do kalendáře
- Responzivní mobilní navigace, přístupné ovládání, bez cookies a sledovacích skriptů

## Volitelná interaktivní mapa

V `config.php` je položka `mapy_embed_url`. Nechte ji prázdnou, nebo do ní vložte **skutečnou URL z iframe kódu** vytvořeného na Mapy.com přes *Sdílet → Vložit mapu do vlastních stránek*. Potom se interaktivní mapa zobrazí pod stažitelnou mapou. Krátký odkaz `mapy.cz/s/...` není iframe URL a pro tuto položku se nehodí. Úřední návod: https://help.mapy.com/cs/nastroje/vlozeni-mapy/

## Licence a mapové podklady

Podklad v náhledu mapy a v PDF vychází z mapového snímku poskytnutého zadavatelem. V návrhu je zachováno označení zdroje **Mapy.com / Seznam.cz**. Před zveřejněním ověřte, že konkrétní použití snímku splňuje licenční podmínky Mapy.com včetně požadovaného copyrightového textu. Více na https://licence.mapy.com/.

Originální obrázek turistické mapy a podklady mapových tras nejsou součástí autorské licence k HTML/CSS. V souboru `assets/img/mapa-a5.webp` je optimalizovaný náhled, `mapa-a5.png` je kvalitní verze ke zvětšení.

## Kontrola před zveřejněním

- [ ] Případné poslední změny informací v `config.php`
- [ ] Aktualizace PDF, GPX, QR a mapového náhledu, pokud se změní trasy
- [ ] Ověření telefonů a e-mailu
- [ ] Otevření Mapy.com a kontrola QR odkazů
- [ ] Vyplnění `site_url` a kontrola sdílecího obrázku
- [ ] Ověření použití podkladu Mapy.com na veřejném webu

Zpracování: moderní jednoduchý web v návaznosti na vizuální identitu akce Zimním Podoubravím 2027.
