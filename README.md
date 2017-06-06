# WinoPortal

1. Cel biznesowy:

WinoPortal ma za zadanie kojarzyć producentów wina w Polsce z klientami.
Mali producenci wina mają porblem z dotarciem do klientów, na tym portalu będa mogli pochwalić się swoimi produktami i je sprzedawać.
Z kolei pasjonaci wina będą mogli zapoznać się z ofertą poszczególnych producentów, dokonać zakupu oraz wyrazić swoją opinię.

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
