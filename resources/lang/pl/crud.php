<?php

/*
Tłumaczenie elementów związanych z produktami
*/

return [
    'logreg' => [
        'register' => 'Rejestracja',
        'registered' => 'Zarejestruj się',
        'name' => 'Nazwa użytkownika',
        'email' => 'Adres email',
        'password' => 'Hasło',
        'confirm' => 'Potwierdź hasło',
        'login' => 'Logowanie',
        'logged' => 'Zaloguj się',
        'remember' => 'Pamiętaj mnie',
        'forgot' => 'Nie pamiętam hasła',
        'reset' => 'Zresetuj hasło',
        'send' => 'Wyślij wiadomość o zmianę hasła',
    ],
    'message' => [
        'confirm' => [
            'users' => 'Czy na pewno chcesz trwale usunąć wybranego użytkownika?',
            'cars' => 'Czy na pewno chcesz trwale usunąć wybrany pojazd?',
        ],
        'users' => [
            'success_user_add' => 'Pomyślnie dodano użytkownika',
            'success_user_updated' => 'Pomyślnie edytowano użytkownika',
            'success_user_deleted' => 'Pomyślnie usunięto użytkownika!',
        ],
        'cars' => [
            'success_car_stored' => 'Pojazd dodany!',
            'success_car_updated' => 'Pojazd zaktualizowany!',
            'success_car_borrowed' => 'Pojazd wypożyczony',
            'success_car_deleted' => 'Pojazd usunięty!',
        ],
    ],
    'enums' => [
        'fuel' => [
            'Electric' => 'Elektryczny',
            'Hybrid' => 'Hybrydowy',
            'Petrol' => 'Benzyna',
            'Oil' => 'Ropa',
        ],
        'transmission' => [
            'Automatic' => 'Automatyczna',
            'Manual' => 'Ręczna',
        ],
        'status' => [
            'Fabric' => 'Fabryczny',
            'Modified' => 'Modyfikowany',
        ],
        'role' => [
            'admin' => 'administrator',
            'user' => 'użytkownik',
        ],
    ],
    'button' => [
        'save' => 'Zapisz',
        'add' => 'Dodaj',
        'display' => 'Podgląd',
        'edit' => 'Edytuj',
        'modify' => 'Modyfikuj',
        'borrowed' => 'Wypożycz',
        'remove' => 'Usuń',
    ],
    'layout' => [
        'name' => 'ProjektCRUD',
        'users' => 'Użytkownicy',
        'cars' => 'Pojazdy',
        'logout' => 'Wyloguj się',
        'login' => 'Logowanie',
        'register' => 'Rejestracja',
    ],
    'welcome' => [
        'sortbyprice' => 'Sortuj według ceny',
        'ascending' => 'Rosnąco',
        'descending' => 'Malejąco',
        'perday' => 'zł dziennie',
        'accessible' => 'Dostępne',
        'unaccessible' => 'Niedostępne',
        'borrow' => 'Wypożycz',
        'backtotop' => 'Powróć na początek',
        'accessiblecarsnumber' => 'Liczba dostępnych pojazdów',
        'price' => 'cena',
        'search' => 'Wyszukaj',
        'borrowed' => 'Wypożyczany pojazd:  :make :model'
    ],
    'users' => [
        'main' =>[
            'userslist' => 'Lista użytkowników',
            'id' => 'Id',
            'email' => 'Email',
            'name' => 'Nazwa użytkownika',
            'role' => 'Rola',
            'action' => 'Akcje',
        ],
        'create' =>[
            'usercreate' => 'Tworzenie użytkownkia',
            'usercreated' => 'Utwórz użytkownika',
        ],
        'edit' =>[
            'useredit' => 'Edycja użytkownika :name',
        ],
    ],
    'cars' => [
        'main' => [
            'carslist' => 'Lista pojazdów',
            'id' => 'Id',
            'make' => 'Marka',
            'model' => 'Model',
            'bodyshape' => 'Typ nadwozia',
            'fuel' => 'Typ paliwa',
            'transmission' => 'Skrzynia biegów',
            'engine' => 'Silnik',
            'enginecapacity' => 'Pojemność silnika',
            'carstatus' => 'Stan',
            'dayrepayment' => 'Dzienny koszt',
            'allcost' => 'Całkowity koszt',
            'rentaldate' => 'Data wypożyczenia',
            'returndate' => 'Data zwrotu',
            'image' => 'Zdjęcie',
            'action' => 'Akcje',
        ],
        'create' => [
            'addcar' => 'Dodawanie pojazdu',
        ],
        'show' => [
            'viewcar' => 'Podgląd pojazdu :make :model'
        ],
        'edit' => [
            'editcar' => 'Edycja pojazdu :make :model'
        ],
        'modify' => [
            'modifycar' => 'Modyfikacja pojazdu :make :model'
        ],
    ],
];