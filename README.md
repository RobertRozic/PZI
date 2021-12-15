# Programiranje za internet

Repozitorij materijala s vježbi kolegija programiranje za internet 2021./2022.

## Upute za izradu laravel aplikacije (lokalno)

#### 1. Pokrenuti laragon
#### 2. Kreirati laravel aplikaciju
Desnim klikom na laragon sučelje odabrati kreiranje nove Laravel aplikacije

ili 

Koristeći composer putem terminala  
`composer create-project --prefer-dist laravel/laravel pzi_projekt`

#### 3. Kreirati bazu podataka
Koristeći laragon heidi alat, kreirati novu bazu podataka.  
Ukoliko ste projekt izradili preko laragon sučelja, baza se automatski kreira.

#### 4. Postaviti okruženje (.env)
Unutar .env datoteke postaviti okruženje i podatke za pristup bazi podataka

DB_DATABASE=pzi_projekt // Ime vase baze  
DB_USERNAME=root  
DB_PASSWORD=  

#### Kreiranje laravel AUTH
composer require laravel/ui  
php artisan ui vue --auth  
php artisan migrate  

#### NPM
npm install  
npm run dev // Dev za debug nacin rada  
ili  
npm run watch // automatski osvjezava promjene css/js

**Aplikacija je lokalno dostupna na pzi_projekt.test**

## Upute za postavljanje projekta na studentski server


#### 1. Prijava na studentski poslužitelj

    Host: studenti.sum.ba

    Korisničko ime: pziXXYYYY

    Lozinka: csdigitalYYYY

**XX** broj grupe (01, 02, 03...)

**YYYY** akademska godina

**Napomena**: Studenti iz Orašja koriste korisničko ime **pzio**

<br>

#### 2. Unutar Vašeg foldera klonirati repozitorij s githuba
    git clone https://github.com/RobertRozic/PZI-2021-2022.git
<br>

#### 3. Napraviti simbolički link sa root/public/dist foldera projekta public folder na posluzitelju
     ln -s /home/pziXXYYYY/ime-projekta/dist/ /home/pziXXYYYY/public

* Ukoliko naredba javi da file vec postoji, odradite:
`rm -rf ~/public`
  
Folder koji linkate je folder u kojem se nalazi vaš index.html/index.php

##### Čisti PHP
Najčešće index.php stavljate u sami root (početni direktorij projekta)
Moguće je napraviti poseban direktorij npr. public u kojem se nalazi ono što će biti javno dostupno.


##### Vue.js i Angular
Ukoliko frontend radite u nekom od javascript frameworka poput Vue.js ili Angular.js potrebno je
buildati aplikaciju određenom naredbom (npm run build ili ng build).
Nakon izvršene naredbe, u direktoriju vašeg projekta će se pojaviti **dist** folder. On se inače ne postavlja na github, nego se dobije buildanjem projekta direktno na serveru. 
Zbog jednostavnosti ćemo ovaj direktorij postaviti na github i na njega postaviti simbolički link s public foldera na studentskom poslužitelju.
Po početnim postavkama vue.js i angular.js taj direktorij postavljaju u .gitignore file.
Sve što se nalazi zapisano u .gitignore file-u, git ignorira i ne postavlja na github repozitorij.
Kako bi ipak postavili dist na github, potreno je izbrisati red u kojima je zapisan dist direktorij.  


Stranice se nalaze u poddirektoriju (subfolder) web servera.
Kada se aplikacija builda, ona za dohvacanje potrebnih ovisnih fileova (dependency)
poput javascript skripta i css-a provjerava u root folderu stranice (studenti.sum.ba/)

Potrebno je podesiti da stranica ove datoteke traži u vašem podfolderu

###### Vue.js
U vue.config.js dodati sljedeći redak sa baseUrl
######
    module.exports = {
        baseUrl: "./projekti/pzi/YYYY/gX/"
    };

###### Angular.js
Prilikom pokretanja _ng build_ naredbe dodati --base-href parametar
#####
    ng build --base-href=/projekti/pzi/YYYY/gX/


##### Baza podataka
Na studentskom poslužitelju svaka grupa ima MySql bazu.  

Pristupni podaci su (.env laravel konfiguracija):  
DB_HOST=localhost (localhost na samom poslužitelju)  
DB_DATABASE=pziXXYYYY    
DB_USERNAME=pziXXYYYY  
DB_PASSWORD=csdigitalYYYY

Bazi podataka možete pristupiti putem phpmyadmin-a instaliranog na poslužitelju.  
Putem PhpMyAdmina možete raditi import podataka koje imate na lokalnoj bazi.

[PHPMyAdmin](https://studenti.sum.ba/phpmyadmin)


### Aplikacija je dostupna na linku
    https://studenti.sum.ba/projekti/pzi/YYYY/gX

### Ažuriranje projekta
Nakon pristupa folderu u kojem se nalazi vaš projekt, koristite naredbu
####
    git pull
Ova naredba povlači sve promjene koje ste postavili na javni github repozitorij


### [Video lekcija](https://www.youtube.com/watch?v=R4_Pqt3lhPk)


Ukoliko imate problema s postavljanjem, javite se na email `robert.rozic@fpmoz.sum.ba`


## Postavljanje laravel aplikacije na studentski poslužitelj
Prilikom postavljanja laravel aplikacije na studentski poslužitelj potrebno je:

#### 1. Spojiti se na studentski poslužitelj (upute iznad)

#### 2. Klonirati git repozitorij u svoj radni prostor
    git clone https://github.com/RobertRozic/PZI-2021-2022.git

#### 3. Napraviti simbolički link na **public** direktorij u laravel projektu

    ln -s /home/pziXXYYYY/ime-projekta/laravel/public/ /home/pziXXYYYY/public

#### 4. Instalirati composer dependency-je

    cd ~/ime-projekta/laravel
    composer install

#### 5. Podesiti .env na poslužitelju
Primjer kopiramo u .env file

    cp .env.example .env

Podesimo bazu

    DB_DATABASE=pziXXYYYY
    DB_USERNAME=pziXXYYYY
    DB_PASSWORD=csdigitalYYYY

Generiramo key aplikacije

    php artisan key:generate

#### 6. Podesiti permisije
    chgrp -R www-data storage bootstrap/cache
    chmod -R ug+rwx storage bootstrap/cache

#### 7. Unutar routes/web.php podesiti root link
    URL::forceRootUrl('https://studenti.sum.ba/projekti/fsre/YYYY/gX');

#### 8. U app/Providers/AppServiceProvider.php u boot funckiju dodati

    public function boot()
    {
         if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&  $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
              \URL::forceScheme('https');
         }
     }

## Osnovne naredbe u linuxu
* **cd** - Promjena direktorija (**c**hange **d**irectory)

`cd public`

Vraćanje u prethodni direktorij

`cd ..`

* **mkdir** - Kreiranje direktorija (**m**ake **d**irectory)

`mkdir test`

* **touch** - Kreiranje datoteke

`touch test.txt`

* **nano** - Ugrađeni tekstualni editor

`touch test.txt`

Za izlazak iz editora koristi se CTRL+X, zatim editor pita za spremanje datoteke.

Pritisnite y (za da) ili n (za ne).

* **ln -s** - Kreiranje simboličkog linka

`ln -s izvor odrediste`


