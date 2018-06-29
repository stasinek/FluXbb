<?php

// Language definitions used in admin_options.php
$lang_admin_options = array(

'Bad HTTP Referer message'			=>	'Zły HTTP_REFERER. Jeśli przeniosłeś forum do innej lokalizacji, bądź zmieniłeś domenę, musisz zaktualizować pole "Adres URL" ręcznie w bazie danych (wiersz o_base_url w tabeli \'config\') i wyczyścić cache poprzez usunięcie wszystkich plików *.php w katalogu /cache.',
'Must enter title message'			=>	'Należy wprowadzić tytuł forum.',
'Invalid e-mail message'			=>	'Wprowadzony adres e-mail administratora jest nieprawidłowy.',
'Invalid webmaster e-mail message'	=>	'Wprowadzony adres e-mail webmastera jest nieprawidłowy.',
'SMTP passwords did not match'      =>  'Należy wprowadzić poprawne hasło SMTP dwukrotnie, aby je zmienić.',
'Enter announcement here'			=>	'Wprowadź tekst ogłoszenia w tym miejscu.',
'Enter rules here'					=>	'Wprowadź zasady korzystania z forum w tym miesjcu.',
'Default maintenance message'		=>	'Forum jest tymczasowo niedostępne z powodu konserwacji. Spróbuj ponownie za kilka minut.',
'Timeout error message'				=>	'Wartość w polu "Okres bezczynności" musi być mniejsza niż wartość w polu "Aktualizacja ostatniej wizyty".',
'Options updated redirect'			=>	'Opcje zostały zaktualizowane. Przekierowywanie…',
'Options head'						=>	'Opcje forum',

// Essentials section
'Essentials subhead'				=>	'Ustawienia główne',
'Board title label'					=>	'Tytuł forum',
'Board title help'					=>	'Tytuł forum (wyświetlany w nagłówku strony). To pole <strong>nie może</strong> zawierać kodu HTML.',
'Board desc label'					=>	'Opis forum',
'Board desc help'					=>	'Krótki opis forum (wyświetlany w nagłówku strony). To pole może zawierać kod HTML.',
'Base URL label'					=>	'Adres URL',
'Base URL help'						=>	'Pełny adres URL forum bez pomijania ukośników (np. http://www.mydomain.com/forum). To pole <strong>musi</strong> być poprawne, aby administratorzy i moderatorzy mogli korzystać z Panelu Administracyjnego. Jeżeli otrzymujesz komunikat "Zły HTTP_REFERER", prawdopodobnie wprowadzony adres jest błędny.',
'Base URL problem'                  =>  'Twój serwer nie obsługuje automatycznej konwersji nazw domen zawierających znaki specjalne (ogonki, akcenty, itp.). Jeśli adres URL forum zawiera takie znaki, <strong>musisz</strong> skorzystać z konwertera online, aby zabezpieczyć się przed błędami "Zły HTTP_REFERER".',
'Timezone label'					=>	'Domyślna strefa czasowa',
'Timezone help'						=>	'Domyślna strefa czasowa dla gości i użytkowników rejestrujących się na forum.',
'DST label'							=>	'Dostosowanie czasu letniego',
'DST help'							=>	'Włącz opcję, jeżeli aktualnie panuje czas letni (przesunięcie o 1 godzinę do przodu).',
'Language label'					=>	'Domyślny język',
'Language help'						=>	'Domyślny język forum dla gości i użytkowników, którzy nie dokonali zmiany w swoim profilu. Jeżeli folder z językiem zostanie usunięty, to pole musi zostać zaktualizowane.',
'Default style label'				=>	'Domyślny styl',
'Default style help'				=>	'Domyślny styl forum dla gości i użytkowników, którzy nie dokonali zmiany w swoim profilu.',

// Essentials section timezone options
'UTC-12:00'					        =>	'(UTC -12:00) Międzynarodowa Linia Zmiany Daty',
'UTC-11:00'					        =>	'(UTC -11:00) Niue, Samoa, Samoa Amerykańskie',
'UTC-10:00'					        =>	'(UTC -10:00) Hawaje, Aleuty, Wyspy Cooka',
'UTC-09:30'					        =>	'(UTC -09:30) Markizy',
'UTC-09:00'					        =>	'(UTC -09:00) Alaska, Wyspy Gambiera',
'UTC-08:30'					        =>	'(UTC -08:30) Wyspy Pitcairn',
'UTC-08:00'					        =>	'(UTC -08:00) Ocean Spokojny, USA (zachodnie wybrzeże)',
'UTC-07:00'					        =>	'(UTC -07:00) Meksyk (Sonora), USA (Arizona)',
'UTC-06:00'					        =>	'(UTC -06:00) Honduras, Kostaryka, USA (środkowy wschód)',
'UTC-05:00'					        =>	'(UTC -05:00) Ekwador, Haiti, Kuba, Peru, USA (wschód)',
'UTC-04:00'					        =>	'(UTC -04:00) Brazylia, Chile, Dominikana, Paragwaj, Portoryko',
'UTC-03:30'					        =>	'(UTC -03:30) Nowa Fundlandia',
'UTC-03:00'					        =>	'(UTC -03:00) Argentyna, Brazylia (wschód), Grenlandia, Urugwaj',
'UTC-02:00'					        =>	'(UTC -02:00) Brazylia (wyspy atlantyckie), Georgia Południowa',
'UTC-01:00'					        =>	'(UTC -01:00) Azory, Grenlandia (wschód), Republika Zielonego Przylądka',
'UTC'						        =>	'(UTC) Europa Zachodnia, Greenwich',
'UTC+01:00'					        =>	'(UTC +01:00) Europa Centralna (Polska), Afryka Wschodnia',
'UTC+02:00'					        =>	'(UTC +02:00) Europa Wschodnia, Afryka Centralna',
'UTC+03:00'					        =>	'(UTC +03:00) Afryka Wschodnia',
'UTC+03:30'					        =>	'(UTC +03:30) Iran',
'UTC+04:00'					        =>	'(UTC +04:00) Rosja (Moskwa), Armenia, Gruzja, Seszele',
'UTC+04:30'					        =>	'(UTC +04:30) Afganistan',
'UTC+05:00'					        =>	'(UTC +05:00) Pakistan, Uzbekistan',
'UTC+05:30'					        =>	'(UTC +05:30) Indie, Sri Lanka',
'UTC+05:45'					        =>	'(UTC +05:45) Nepal',
'UTC+06:00'				        	=>	'(UTC +06:00) Bangladesz, Bhutan, Rosja (Jekaterynburg)',
'UTC+06:30'					        =>	'(UTC +06:30) Birma, Wyspy Kokosowe',
'UTC+07:00'				        	=>	'(UTC +07:00) Indonezja (zachód), Rosja (Nowosybirsk), Tajlandia, Wietnam',
'UTC+08:00'			        		=>	'(UTC +08:00) Chiny, Australia Zachodnia, Rosja (Krasnojarsk)',
'UTC+08:45'				        	=>	'(UTC +08:45) Australia Zachodnia (część wschodnia)',
'UTC+09:00'				        	=>	'(UTC +09:00) Japonia, Korea, Palau, Rosja (Irkuck)',
'UTC+09:30'				        	=>	'(UTC +09:30) Austalia Centralna',
'UTC+10:00'				        	=>	'(UTC +10:00) Australia Wschodnia',
'UTC+10:30'				        	=>	'(UTC +10:30) Lord Howe',
'UTC+11:00'			        		=>	'(UTC +11:00) Mikronezja (wchód), Wyspy Salomona, Rosja (Władywostok)',
'UTC+11:30'				        	=>	'(UTC +11:30) Norfolk',
'UTC+12:00'			        		=>	'(UTC +12:00) Nowa Zelandia, Fidżi, Rosja (Magadan)',
'UTC+12:45'			        		=>	'(UTC +12:45) Wyspy Chatham',
'UTC+13:00'			        		=>	'(UTC +13:00) Tonga, Wyspy Feniks, Rosja (Kamczatka)',
'UTC+14:00'			        		=>	'(UTC +14:00) Kiribati (Line Islands)',

// Timeout Section
'Timeouts subhead'					=>	'Ustawienia czasu i daty',
'Time format label'					=>	'Format czasu',
'PHP manual'						=>	'PHP Manual',
'Time format help'					=>	'[Obecny format: %s]. Sprawdź %s po więcej formatów.',
'Date format label'					=>	'Format daty',
'Date format help'					=>	'[Obecny format: %s]. Sprawdź %s po więcej formatów.',
'Visit timeout label'				=>	'Aktualizacja "ostatniej wizyty" (timeout visit)',
'Visit timeout help'				=>	'Liczba sekund bezczynności użytkownika, aby data jego ostatniej wizyty została zaktualizowana (dotyczy głównie informacji o nowych postach).',
'Online timeout label'				=>	'Okres bezczynności (timeout online)',
'Online timeout help'				=>	'Liczba sekund bezczynności użytkownika, aby został usunięty z listy użytkowników online.',
'Redirect time label'				=>	'Czas przekierowywania',
'Redirect time help'				=>	'Liczba sekund czekania przy przekierowywaniu. Jeżeli ustawiona jest wartość 0, strona zostaje ładowana bezpośrednio, bez przekierowania.',

// Display Section
'Display subhead'					=>	'Ustawienia wyświetlania',
'Version number label'				=>	'Numer wersji',
'Version number help'				=>	'Pokaż wersję skryptu FluxBB w stopce.',
'Info in posts label'				=>	'Informacje użytkownika w postach',
'Info in posts help'				=>	'Pokaż dodatkowe informacje o autorze posta pod nazwą użytkownika w widoku wątku (lokalizacja, data rejestracji, liczba postów i kontakt).',
'Post count label'					=>	'Liczba postów użytkownika',
'Post count help'					=>	'Pokaż licznik postów użytkownika (w wątku, profilu i liście użytkowników).',
'Smilies label'						=>	'Emotikony w postach',
'Smilies help'						=>	'Konwertuj tekstowe emotikony na ikonki graficzne.',
'Smilies sigs label'				=>	'Emotikony w podpisach',
'Smilies sigs help'					=>	'Konwertuj tekstowe emotikony na ikonki graficzne w podpisach użytkowników.',
'Clickable links label'				=>	'Wykrywanie linków w postach',
'Clickable links help'				=>	'Kiedy funkcja jest włączona, FluxBB automatycznie wykryje w postach adresy URL i zamieni je w hiperłącza.',
'Topic review label'				=>	'Podgląd wątku',
'Topic review help'					=>	'Maksymalna liczba postów w podglądzie wątku (najnowsze pierwsze). Ustaw 0, aby wyłączyć.',
'Topics per page label'				=>	'Liczba tematów na stronę',
'Topics per page help'				=>	'Domyślna liczba tematów wyświetlanych na stronę forum. Użytkownicy mogą spersonalizować to ustawienie.',
'Posts per page label'				=>	'Liczba postów na stronę',
'Posts per page help'				=>	'Domyślna liczba postów wyświetlanych na stronę wątku. Użytkownicy mogą spersonalizować to ustawienie.',
'Indent label'						=>	'Wcięcia',
'Indent help'						=>	'Jeśli wartość ustawiona jest na 8, szerokość wcięć w tagu [code] będzie miała wartość domyślną (tabulator). W przeciwnym wypadku szerokość wcięcia będzie ustawiona na podną ilość spacji.',
'Quote depth label'					=>	'Maksymalna głębokość [quote]',
'Quote depth help'					=>	'Maksymalna ilość tagów [quote] znajdujących się wewnątrz innych tagów [quote], wszytkie tagi znajdujące się głębiej będą odrzucane.',

// Features section
'Features subhead'					=>	'Ustawienia funkcji',
'Quick post label'					=>	'Szybka odpowiedź',
'Quick post help'					=>	'Kiedy funkcja jest włączona, FluxBB doda pole szybkiej odpowiedzi w dolnej części wątku. Tym sposobem użytkownicy mogą bezpośrednio odpowiadać w widoku wątku.',
'Users online label'				=>	'Użytkownicy online',
'Users online help'					=>	'Wyświetl informację na stronie głównej o gościach i użytkownikach aktualnie przeglądających forum.',
'Censor words label'				=>	'Cenzurowanie słów',
'Censor words help'					=>	'Włącz tę funkcję, aby cenzurować wybrane słowa na forum. Przejdź do %s po więcej informacji.',
'Signatures label'					=>	'Podpisy',
'Signatures help'					=>	'Zezwalaj użytkownikom na dołączenie podpisu do swoich postów.',
'User has posted label'				=>	'Użytkownik wypowiadał się już w wątku',
'User has posted help'				=>	'Wyświetl kropkę na początku tematu wątku w przypadku, gdy aktualnie zalogowany użytkownik wypowiadał się już w danym wątku. Wyłącz funkcję, jeśli serwer jest obciążony.',
'Topic views label'					=>	'Wyświetlenia tematów',
'Topic views help'					=>	'Pokaż informację o liczbie wyświetleń danego wątku. Wyłącz funkcję, jeśli serwer jest obciążony.',
'Quick jump label'					=>	'"Skocz do"',
'Quick jump help'					=>	'Włącz w stopce listę for "Skocz do", aby szybko przenosić się między forami.',
'GZip label'						=>	'Kompresja GZip',
'GZip help'							=>	'Jeśli funkcja jest włączona, FluxBB skompresuje stronę wynikową wysyłaną do przeglądarki. Dzięki temu można zmniejszyć zużycie transferu, ale zwiększy się użycie procesora. Do prawidłowego działania funkcji wymagany jest serwer PHP skonfigurowany za pomocą funkcji zlib (--with-zlib). Informacja: Jeżeli używane są moduły Apache\'a do kompresji skryptów PHP (mod_gzip, mod_deflate), funkcja na forum powinna być włączona.',
'Search all label'					=>	'Przeszukaj wszystkie fora',
'Search all help'					=>	'Kiedy funkcja jest wyłączona, w jednej chwili może być przeszukiwane tylko jedno forum. Wyłącz funkcję, jeśli serwer jest obciążony.',
'Menu items label'					=>	'Dodatkowe pozycje menu',
'Menu items help'					=>	'Dodatkowe odnośniki, które będą wyświetlane w menu forum. Format wprowadzania linków: X = &lt;a href="URL"&gt;LINK&lt;/a&gt;, gdzie X oznacza pozycję odnośnika na liście menu (np. 0 = na początku menu, 2 = po "Liście użytkowników"). Każdy odnośnik wpisuj w nowym wierszu.',

// Feeds section
'Feed subhead'                      =>  'Syndykacja',
'Default feed label'				=>	'Domyślny typ kanału',
'Default feed help'					=>	'Wybierz typ kanału do wyświetlania. Informacja: Wybranie "Brak" nie oznacza wyłączenia kanałów, a jedynie ukrycie odnośników do nich.',
'None'								=>	'Brak',
'RSS'								=>	'RSS',
'Atom'								=>	'Atom',
'Feed TTL label'                    =>  'Czas przechowywania',
'Feed TTL help'                     =>  'Wybierz czas przez jaki kanały mają być przechowywane w pamięci podręcznej, w celu zmniejszenia użycia zasobów.',
'No cache'                          =>  'Nie przechowuj',
'Minutes'                           =>  '%d minut',

// Reports section
'Reports subhead'					=>	'Ustawienia raportowania',
'Reporting method label'			=>	'Metoda raportowania',
'Internal'							=>	'Wewnętrzna',
'By e-mail'							=>	'E-mail',
'Both'								=>	'Obie metody',
'Reporting method help'				=>	'Wbierz sposób, w jaki będą raportowane tematy/posty. Możesz wybrać raportowanie tematów/postów za pomocą wewnętrznego systemu raportowania, poprzez wiadomości e-mail wysyłane na adresy podane poniżej, bądź za pomocą obu metod.',
'Mailing list label'				=>	'Lista adresów e-mail',
'Mailing list help'					=>	'Lista adresów e-mail osób, do których mają trafiać informację o raportach. Każdy e-mail oddzielaj za pomocą znaku przecinaka.',

// Avatars section
'Avatars subhead'					=>	'Ustawienia avatarów',
'Use avatars label'					=>	'Używaj avatarów',
'Use avatars help'					=>	'Kiedy funkcja jest włączona, użytkownicy mogą wgrywać swoje avatary, które będą wyświetlane pod tytułem/statusem.',
'Upload directory label'			=>	'Katalog avatarów',
'Upload directory help'				=>	'Katalog, do którego wgrywane zostaną avatary. PHP musi mieć prawa do zapisu danych w tym katalogu.',
'Max width label'					=>	'Maksymalna szerokość',
'Max width help'					=>	'Maksymalna szerokość avatara w pikselach (60px zalecane).',
'Max height label'					=>	'Maksymalna wysokość',
'Max height help'					=>	'Maksymalna wysokość avatara w pikselach (60px zalecane).',
'Max size label'					=>	'Maksymalny rozmiar',
'Max size help'						=>	'Maksymalny dozwolony rozmiar avatara w bajtach (10240 bajtów zalecane).',

// E-mail section
'E-mail subhead'					=>	'Ustawienia e-mail',
'Admin e-mail label'				=>	'E-mail administratora',
'Admin e-mail help'					=>	'Adres e-mail do administratora forum.',
'Webmaster e-mail label'			=>	'E-mail webmastera',
'Webmaster e-mail help'				=>	'Adres e-mail, którym adresowane są wszystkie maile wysyłane za pomocą formularzy na forum.',
'Forum subscriptions label'			=>	'Subskrypcje for',
'Forum subscriptions help'			=>	'Kiedy funkcja jest włączona, użytkownicy mogą subskybować wybrane fora (odbieranie wiadomości e-mail, gdy ktoś utworzy nowy temat).',
'Topic subscriptions label'         =>  'Subskrypcje tematów',
'Topic subscriptions help'          =>  'Kiedy funkcja jest włączona, użytkownicy mogą subskybować wybrane tematy (odbieranie wiadomości e-mail, gdy ktoś odpowie w wątku).',
'SMTP address label'				=>	'Adres serwera SMTP',
'SMTP address help'					=>	'Adres zewnętrznego serwera SMTP, do obsługi wysyłania wiadommości e-mail. Można określić niestandardowy numer portu, jeżeli serwer SMTP nie działa prawidłowo na domyślnym porcie 25 (np. mail.myhost.com:3580). Pozostaw to pole puste, jeżeli używasz lokalnego programu do obsługi wiadomości e-mail.',
'SMTP username label'				=>	'Nazwa użytkownika SMTP',
'SMTP username help'				=>	'Nazwa użytkownika dla serwera SMTP. Wpisz jedynie, gdy nazwa użytkownika jest wymagana przez serwer SMTP. (większość serwerów <strong>nie wymaga</strong> autoryzacji).',
'SMTP password label'				=>	'Hasło SMTP',
'SMTP change password help'         =>  'Zaznacz to pole, jeśli chcesz zmienić, bądź usunąć aktualnie zapisane hasło.',
'SMTP password help'				=>	'Hasło dla serwera SMTP. Wpisz jedynie, gdy hasło jest wymagane przez serwer SMTP (większość serwerów <strong>nie wymaga</strong> autoryzacji). W celu zatwierdzenia wprowadź hasło dwukrotnie.',
'SMTP SSL label'					=>	'Szyfrowanie SMTP za pomocą SSL',
'SMTP SSL help'						=>	'Szyfruj połączenie z serwerem SMTP za pomocą SSL. Funkcja ta powinna być używana jeśli serwer SMTP wymaga szyfrowania oraz jeśli używana wersja PHP obsługuje protokół SSL.',

// Registration Section
'Registration subhead'				=>	'Ustawienia rejestracji',
'Allow new label'					=>	'Rejestracja nowych użytkowników',
'Allow new help'					=>	'Zezwalaj na rejestrację nowych użytkowników na forum. Wyłącz funckję jedynie w szczególnych okolicznościach.',
'Verify label'						=>	'Weryfikacja rejestracji',
'Verify help'						=>	'Kiedy funkcja jest włączona, po rejestracji użytkownika, zostanie wysłana do niego wiadomość z losowo wygenerowanym hasłem logowania. Po zalogowaniu użytkownik może zmienić to hasło na swoje własne. Ta funkcja wymagana jest również przy weryfikacji adresów e-mail, przy ich zmianie. Pozwala to na uniknięcie multi-rejestracji oraz upewnia, że użytkownik wprowadził poprawny adres e-mail.',
'Report new label'					=>	'Raportuj nowe rejestracje',
'Report new help'					=>	'Kiedy funkcja jest włączona, FluxBB wyśle wiadomość e-mail do osób z listy mailingowej (patrz wyżej) z informacją o rejestracji nowego użytkownika na forum.',
'Use rules label'					=>	'Potwierdzenie zasad',
'Use rules help'					=>	'Kiedy funkcja jest włączona, użytkownik musi zaakceptować zasady korzystania z forum przed rejestracją. Odnośnik do zasad jest zawsze wyświetlany w menu forum.',
'Rules label'						=>	'Zasady korzystania z forum',
'Rules help'						=>	'W tym miejscu możesz wprowadzić zasady korzystania z forum, ktore użytkownik musi przeczytać i zaakceptować przed rejestracją. Jeśli nic nie zostanie wprowadzone w tym polu, funkcja będzie wyłączona. Ten tekst nie będzie przetwarzany jak posty, zatem może zawierać kod HTML.',
'E-mail default label'				=>	'Domyślne ustawienia e-mail',
'E-mail default help'				=>	'Wybierz domyślne ustawienia prywatności adresu e-mail dla nowo zarejestrowanych użytkowników.',
'Display e-mail label'				=>	'Wyświetlaj adres e-mail.',
'Hide allow form label'				=>	'Ukryj adres e-mail, ale zezwalaj na wysyłanie wiadomości e-mail.',
'Hide both label'					=>	'Ukryj adres e-mail i nie zezwalaj na wysyłanie wiadomości e-mail.',

// Announcement Section
'Announcement subhead'				=>	'Ustawienia ogłoszeń',
'Display announcement label'		=>	'Wyświetlanie ogłoszenia',
'Display announcement help'			=>	'Włącz funkcję, jeśli chcesz wyświetlać wiadomość widoczną dla każdego, w nagłówku strony.',
'Announcement message label'		=>	'Treść ogłoszenia',
'Announcement message help'			=>	'Ten tekst nie będzie przetwarzany jak posty, zatem może zawierać kod HTML.',

// Maintenance Section
'Maintenance subhead'				=>	'Ustawienia trybu konserwacji',
'Maintenance mode label'			=>	'Tryb konserwacji',
'Maintenance mode help'				=>	'Kiedy funkcja jest włączona, forum dostępne jest jedynie dla administratorów. Funckja ta powinna być używana, kiedy forum musi być zamknięte na czas konserwacji. <strong>OSTRZEŻENIE! Nie wylogowuj się z forum, kiedy tryb konserwacji zostanie włączony, gdyż ponowne zalogowanie nie będzie możliwe.</strong>',
'Maintenance message label'			=>	'Wiadomość o konserwacji',
'Maintenance message help'			=>	'Informacja wyświetlana dla użytkowników, kiedy na forum zostanie włączony tryb konserwacji. Jeśli pole będzie puste, zostanie wyświetlona domyślna informacja. Teskt ten nie będzie przetwarzany jak posty, zatem może zawierać kod HTML.',

);
