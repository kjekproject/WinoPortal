# WinoPortal

1. Cel biznesowy:
WinoPortal ma za zadanie kojarzyć producentów wina w Polsce z klientami.
Mali producenci wina mają porblem z dotarciem do klientów, na tym portalu będa mogli pochwalić się swoimi produktami i je sprzedawać.
Z kolei pasjonaci wina będą mogli zapoznać się z ofertą poszczególnych producentów, dokonać zakupu oraz wyrazić swoją opinię.

2. Model danych:
Producenci:
- nazwa,
- adres (miejscowość, kod pocztowy, ulica, numer budynku, numer mieszkania),
- email,
- opis,
- produkty (wina - relacja z winami).

Klienci:
- nazwa (imię i nazwisko / nazwa firmy),
- adres (miejscowość, kod pocztowy, ulica, numer budynku, numer mieszkania),
- email.

Wina:
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
- wino (relacja z winami)

Transakcje:
- produkt (wino)
- ilość,
- kupujący (relacja z klientami),
- sprzedający (relacja z producentami),
- stan zapytania.

Wiadomości:
- treść,
- nadawca,
- odbiorca,
- status wiadomości.

3. Widoki:
- strona główna (lista win + formularz wyszukiwania wina),
- strona z producentami (lista producentów)
- strona producenta (informacje o producencie + lista wyprodukowanych win),
- strona wina (dane + opinie + formularz zamówienia + formularz dodania opini)
- strona obsługi zamówienia przez producenta (zapytanie + możliwość wysłania wiadomości).
- strona informacji zwrotnej odnośnie zamówienia od producenta dla klienta (info czy zostało przyjęte + możliwość wysłania wiadomości).
- strona z wiadomościami

4. Procesy:
- rejestracja użytkowsnika (wraz z wyborem roli czy producent czy klient),
- edycja profilu użytkownika,
- logowania,
- wylogowywanie,
- dodawanie wina (opcja dla producenta),
- dodawanie komentarzy do wina (klient)
- wysyłanie wiadomości.
