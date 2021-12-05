# Programiranje za internet

Repozitorij materijala s vje\bi kolegija programiranje za internet 2021./2022.

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

#### Čisti PHP
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
######Vue.js
U vue.config.js dodati sljedeći redak sa baseUrl
######
    module.exports = {
        baseUrl: "./projekti/pzi/YYYY/gX/"
    };

######Angular.js
Prilikom pokretanja _ng build_ naredbe dodati --base-href parametar
#####
    ng build --base-href=/projekti/pzi/YYYY/gX/
<br>

### Aplikacija je dostupna na linku
    https://studenti.sum.ba/projekti/pzi/YYYY/gX

Ukoliko imate problema s postavljanjem, javite se na email
`robert.rozic@fpmoz.sum.ba`


##Osnovne naredbe u linuxu
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


