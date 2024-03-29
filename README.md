# Skapar post_typen Kontakter + visa dessa kontakter på en sida

## Hur man använder Region Hallands plugin "region-halland-acf-page-contact-card"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-acf-page-contact-card".


## Användningsområde

Denna plugin skapar en posttyp med namn "Kontakter". Dessa kontakter kan man sedan välja att visa på en sida.


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell via den medföljande filen:
```sh
LICENSE (https://github.com/RegionHalland/region-halland-acf-page-contact-card/blob/master/LICENSE)
```


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
    <span>{!! $data['contact_title'] !!}</span><br>
    <span>{{ $data['contact_epost'] }}</span><br>
    <span>{{ $data['contact_telefon'] }}</span><br>
    @if($data['contact_has_image'])
      <img src="{{ $data['contact_image_url'] }}" width="{{ $data['contact_image_width'] }}" height="{{ $data['contact_image_height'] }}" height="{{ $data['contact_image_alt'] }}"><br>
    @endif
  @endforeach
@endif
```


## Exempel på hur arrayen kan se ut

```sh
array (size=2)
  0 => 
    array (size=13)
      'post_id' => int 18
      'post_title' => string 'Min sida' (length=8)
      'post_content' => string 'Lorem ipsum' (length=11)
      'contact_name' => string 'Kalle Kula' (length=10)
      'contact_title' => string 'IT-ansvarig' (length=11)
      'contact_epost' => string 'Kalle.Kula@RegionHalland.se' (length=26)
      'contact_telefon' => string '555-5555555' (length=11)
      'contact_link_title' => string 'Fin bild framifrån' (length=18)
      'contact_link_url' => string 'http://exempel.se/?show_profile=kallekula' (length=41)
      'contact_link_target' => string '' (length=0)
      'contact_image_url' => string 'http://exempel.se/app/uploads/2019/06/kalle_kula.jpg' (length=52)
      'contact_image_alt' => string 'Kalle' (length=5)
      'contact_image_width' => int 96
      'contact_image_height' => int 88
      'contact_has_image' => int 1
  1 => 
    array (size=13)
      'post_id' => int 22
      'post_title' => string 'Min sida' (length=8)
      'post_content' => string 'Lorem ipsum' (length=11)
      'contact_name' => string 'Nisse Nilsson' (length=13)
      'contact_title' => string 'IT-ansvarig' (length=11)
      'contact_epost' => string 'Nisse.Nilsson@RegionHalland.se' (length=29)
      'contact_telefon' => string '555-5555555' (length=11)
      'contact_link_title' => string 'Fin bild' (length=8)
      'contact_link_url' => string 'http://exempel.se/?show_profile=nissenilsson' (length=44)
      'contact_link_target' => string '' (length=0)
      'contact_image_url' => string 'http://exempel.se/app/uploads/2019/06/nisse_nilsson.jpg' (length=55)
      'contact_image_alt' => string 'Nisse' (length=5)
      'contact_image_width' => int 96
      'contact_image_height' => int 96
      'contact_has_image' => int 1
```


## Lägg ut en enskild kontakt via "Blade"

OBS! Ändra variabeln $id till det variabelnamn som du använder

```sh
Namn: {{get_region_halland_acf_page_contact_card_name($id)}}<br>
Titel: {{get_region_halland_acf_page_contact_card_title($id)}}<br>
Epost: {{get_region_halland_acf_page_contact_card_epost($id)}}<br>
Telefon: {{get_region_halland_acf_page_contact_card_telefon($id)}}<br>
      
@php($myLink = get_region_halland_acf_page_contact_card_link($id))
@if($myLink['has-link'] == 1)
  <a href="{{$myLink['link-url']}}" target="{{$myLink['link-target']}}">{{$myLink['link-title']}}</a><br>
@endif

@php($myImage = get_region_halland_acf_page_contact_card_image($id))
@if($myImage['has-image'] == 1)
  <img src="{{$myImage['image-url']}}" width="{{$myImage['image-width']}}" height="{{$myImage['image-height']}}" alt="{{$myImage['image-alt']}}">
@endif
```


## Versionhistorik

### 1.6.0
- Alt-text för bild + uppdaterad readme

### 1.5.1
- Korrigerat länk till licens-fil

### 1.5.0
- Bifogat fil med licensmodell

### 1.4.0
- Uppdaterat med information om licensmodell

### 1.3.0
- Lagt till nytt fält, "telefon"

### 1.2.0
- Lagt till nytt fält, "titel"

### 1.1.0
- Lagt till funktionalitet för en enskild kontakt

### 1.0.2
- Lagt till title + content

### 1.0.1
- Justerat standard-thumbh

### 1.0.0
- Första version