# WinoPortal

1. Cel biznesowy:

WinoPortal ma za zadanie kojarzyć producentów wina w Polsce z klientami.
Mali producenci wina mają porblem z dotarciem do klientów, na tym portalu będa mogli pochwalić się swoimi produktami i je sprzedawać.
Z kolei pasjonaci wina będą mogli zapoznać się z ofertą poszczególnych producentów, dokonać zakupu oraz wyrazić swoją opinię.
Aplikacja napisana przy użyciu Symfony 2.8. W celu instalacji nakleży wykonaćnastępujące kroki:
- sklonować repozytorium,
- zainstalować niezbędne komponenty (composer instal) i  uzupełnić parametry bazy danych,
- dokonać migracji danych z pliku winoPortal.sql

2. Model danych:

Użytkownik (stworzony przy użyciu FOSUserBundle):
- nazwa,
- adres/lokalizacja,
- email,
- opis,
- wina (relacja w winem),

Wino:
- nazwa,
- kolor (białe, różowe, czerwone),
- smak (wytrawne, półwytrawne, półsłodkie, słodkie),
- rocznik,
- wyprodukowana ilość (produkcja w litrach),
- stan (liczba dostępnych butelek),
- cena,
- opinie (relacja z opinią) 

Opinie:
- treść,
- ocena,
- autor (relacja z użytkownikiem).

Wiadomości:
- tytuł,
- treść,
- nadawca (relacja z użytkownikiem),
- odbiorca (relacja z użytkownikiem).

3. Widoki:

- strona rejestracji,

- strona główna,
- strona rejestracji,
- strona logowania,
- strona edycji danych, 
- strona z listą win + wyszukiwanie wina po nazwie),
- strona wina (informacje + opinie + formularz dodania opini)
- strona z listą producentów + wyszukiwanie po nazwie
- strona producenta (informacje o producencie + lista wyprodukowanych win),
- strona wysyłania wiadomości,
- skrzynka odbiorcza,
- skrzynka nadawcza.

4. Procesy:

- dodawanie wina,
- dodawanie opini o winie,
- wysyłanie wiadomości.

5. Zrzuty ekranu:
Strona główna:
![zrzut ekranu z 2017-06-11 20-57-33](https://user-images.githubusercontent.com/22776880/27013708-a7b698c4-4ee9-11e7-95fe-9ed2f1670094.png)

Strona z listą wszystkich win:
![zrzut ekranu z 2017-06-11 21-13-46](https://user-images.githubusercontent.com/22776880/27013776-09527890-4eeb-11e7-802e-e2cd62d84fae.png)

Strona wyświetlająca użytkownika i jego wina
![zrzut ekranu z 2017-06-11 21-14-28](https://user-images.githubusercontent.com/22776880/27013779-0dcc114c-4eeb-11e7-90b0-66700ecffcec.png)

Strona o winie oraz opinie o nim
![zrzut ekranu z 2017-06-11 21-14-35](https://user-images.githubusercontent.com/22776880/27013785-10c673ec-4eeb-11e7-9cef-ef9b95a22b4a.png)

Strona z wiadomościami
![zrzut ekranu z 2017-06-11 21-14-43](https://user-images.githubusercontent.com/22776880/27013788-1362d4d8-4eeb-11e7-811a-0b8f54979f66.png)
