# Skapar post_typen Kontakter + visa dessa kontakter på en sida

## Hur man använder Region Hallands plugin "region-halland-acf-page-contact-card"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-acf-page-contact-card".


## Användningsområde

Denna plugin skapar en posttyp med namn "Kontakter". Dessa kontakter kan man sedan välja att visa på en sida.


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-acf-page-contact-card.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-acf-page-contact-card.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-acf-page-contact-card": "1.0.0"
},
```


## Loopa ut kontakterna via "Blade"

```sh
@php($myData = get_region_halland_acf_main_post_page_contact_cards())
@if(isset($myData))
  @foreach ($myData as $data)
    <span><a href="{{ $data['contact_link_url'] }}">{{ $data['contact_link_title'] }}</a></span><br>
    <span>{!! $data['post_title'] !!}</span><br>
    <span>{!! $data['post_content'] !!}</span><br>
    <span>{!! $data['contact_name'] !!}</span><br>
    <span>{{ $data['contact_epost'] }}</span><br>
    @if($data['contact_has_image'])
      <img src="{{ $data['contact_image_url'] }}" width="{{ $data['contact_image_width'] }}" height="{{ $data['contact_image_height'] }}"><br>
    @endif
  @endforeach
@endif
```


## Exempel på hur arrayen kan se ut

```sh
array (size=2)
  0 => 
    array (size=13)
      'post_title' => string 'Min sida' (length=8)
      'post_content' => string 'Lorem ipsum' (length=11)
      'contact_name' => string 'Kalle Kula' (length=10)
      'contact_epost' => string 'Kalle.Kula@RegionHalland.se' (length=26)
      'contact_link_title' => string 'Fin bild framifrån' (length=18)
      'contact_link_url' => string 'http://exempel.se/?show_profile=kallekula' (length=41)
      'contact_link_target' => string '' (length=0)
      'contact_image_url' => string 'http://exempel.se/app/uploads/2019/06/kalle_kula.jpg' (length=52)
      'contact_image_width' => int 96
      'contact_image_height' => int 88
      'contact_has_image' => int 1
  1 => 
    array (size=13)
      'post_title' => string 'Min sida' (length=8)
      'post_content' => string 'Lorem ipsum' (length=11)
      'contact_name' => string 'Nisse Nilsson' (length=13)
      'contact_epost' => string 'Nisse.Nilsson@RegionHalland.se' (length=29)
      'contact_link_title' => string 'Fin bild' (length=8)
      'contact_link_url' => string 'http://exempel.se/?show_profile=nissenilsson' (length=44)
      'contact_link_target' => string '' (length=0)
      'contact_image_url' => string 'http://exempel.se/app/uploads/2019/06/nisse_nilsson.jpg' (length=55)
      'contact_image_width' => int 96
      'contact_image_height' => int 96
      'contact_has_image' => int 1
```

## Versionhistorik

### 1.0.0
- Första version