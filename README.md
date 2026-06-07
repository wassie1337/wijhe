# Wijhe Studio WordPress Theme

Wijhe Studio is een modern WordPress block theme voor Full Site Editing. Het thema gebruikt `theme.json` als centrale bron voor kleur, typografie, spacing, borders en shadows, zodat instellingen vanuit de Site Editor automatisch doorwerken in templates, patronen, knoppen, kaarten en het doelgroep-tabs blok.

## Inrichten

1. Plaats de map in `wp-content/themes/wijhe-studio` en activeer het thema.
2. Ga naar **Weergave → Editor → Stijlen** om kleuren, fonts en spacing aan te passen.
3. Kies eventueel een stijlvariatie zoals **Bosrijk** of **Civic blauw**.
4. Voeg het patroon **Moderne hero met doelgroep-tabs** toe of plaats zelf het blok **Doelgroep tabs**.

## Doelgroep-tabs

Het blok **Doelgroep tabs** is bedoeld als flexibele widget om meerdere doelgroepen op één plek aan te spreken. Per tab kun je instellen:

- label;
- kop;
- beschrijving;
- knoptekst;
- link.

De frontend gebruikt ARIA tabrollen, roving tabindex en toetsenbordnavigatie met pijltjestoetsen, Home en End. Zonder JavaScript blijft de eerste tab zichtbaar en blijft de inhoud server-rendered beschikbaar.

## Bestanden

- `theme.json`: globale design tokens en block styles.
- `templates/` en `parts/`: FSE templates en template parts.
- `patterns/hero.php`: startpatroon met hero en doelgroep-tabs.
- `blocks/audience-tabs/`: custom tabs blok.
