<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_rej.css">
    <link rel="shortcut icon" href="https://store.steampowered.com/favicon.ico"/>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <title>Utwórz swoje konto</title>
</head>
<body>
    <header>
        <img src="https://store.fastly.steamstatic.com/public/shared/images/header/logo_steam.svg?t=962016" height="100px" width="200px">
            <a href="sklep.php">SKLEP</a>
            <a href="https://steamcommunity.com/">SPOŁECZNOŚĆ</a>
            <a href="https://store.steampowered.com/about/">INFORMACJE</a>
            <a href="https://help.steampowered.com/pl/">POMOC TECHNICZNA</a>
            <div id="headerlog">
                <a href="logowanie.php">zaloguj się</a>
                <a href="logout.php">wyloguj się</a>
            </div>
    </header>
<p id="utworz">UTWORZ SWOJE KONTO</p>
<div id="rejestracja">
<form action="rejestacja.php" method="get">
    <label for="emailInput">Adres e-mail</label><br>
    <input type="email" name="email" id="emailInput"><br><br>
    <label for="passwordInput">Hasło</label><br>
    <input type="password" name="password" id="passwordInput"><br><br>
    <label for="passwordReapeatInput">Wpisz ponownie hasło</label><br>
    <input type="password" name="passwordReapeat" id="passwordReapeatInput"><br><br> 
</div>
<div class="g-recaptcha" data-sitekey="6LflKp4qAAAAAEfeJB10rwn2Ge9M4bxMSu5rd0gd"></div>
<?php
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "register") {
    $db = new mysqli("localhost", "root", "", "steam");
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $passwordReapeat = $_REQUEST['passwordReapeat'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if($password == $passwordReapeat) {
    $q = $db->prepare("INSERT INTO userlogowanie VALUES (NULL, ?, ?)");
    $passwordHash = password_hash($password, PASSWORD_ARGON2I);
    $q->bind_param("ss", $email, $passwordHash);
    $result = $q->execute();
    if($result) {
        echo "Prawidłowo zarejestrowano konto";
    } else {
        echo "Wystąpił błąd";
    }
}
}
?>
<div id="zaloguj">
<input type="hidden" name="action" value="register">
<input type="submit" value="Zarejestruj">
</div>
</form>
<div id="umowa">
<h3>
UMOWA UŻYTKOWNIKA STEAM®
</h3>
<p>
SPIS TREŚCI:
</p>
<ol>
    <li><a href="rejestracja.php#1" style="text-decoration: none">Rejestracja użytkownika; obowiązywanie postanowień umowy w stosunku do użytkownika; konto użytkownika; zgoda na zawarcie umów</li></a>
    <li><a href="rejestracja.php#2" style="text-decoration: none">Licencje</li></a>
    <li><a href="3" style="text-decoration: none">Rozliczenia, płatności i inne subskrypcje</li></a>
    <li><a href="4" style="text-decoration: none">Zasady postępowania w sieci, oszukiwanie i manipulowanie procesami</li></a>
    <li><a href="5" style="text-decoration: none">Treści osób trzecich</li></a>
    <li><a href="6" style="text-decoration: none">Treści tworzone przez użytkowników</li></a>
    <li><a href="7" style="text-decoration: none">Wyłączenia odpowiedzialności; ograniczenie odpowiedzialności; brak gwarancji; ograniczona gwarancja i umowa
    Zmiany niniejszej umowy</li></a>
    <li><a href="8" style="text-decoration: none">Okres obowiązywania i rozwiązanie umowy</li></a>
    <li><a href="9" style="text-decoration: none">Prawo właściwe/koszty reprezentacji prawnej</li></a>
    <li><a href="10" style="text-decoration: none">Postanowienia różne</li></a>
</ol>
<p>
Niniejsza Umowa Użytkownika Steam („Umowa”) jest dokumentem prawnym, który określa prawa i obowiązki użytkownika serwisu Steam prowadzonego przez Valve Corporation, spółkę prawa stanu Waszyngton z siedzibą pod adresem 10400 NE 4th St., Bellevue, WA 98004, Stany Zjednoczone, zarejestrowaną u Sekretarza Stanu Waszyngton pod numerem 60 22 90 773, numer identyfikacyjny VAT EU 8260 00671 („Valve”). Prosimy o uważne zapoznanie się z jej treścią.
</p>
<p>
1. REJESTRACJA UŻYTKOWNIKA; OBOWIĄZYWANIE POSTANOWIEŃ UMOWY W STOSUNKU DO UŻYTKOWNIKA; KONTO UŻYTKOWNIKA; ZGODA NA ZAWARCIE UMÓW
<a id="1">
</a>
</p>
Steam to serwis internetowy oferowany przez Valve.

Status użytkownika Steam („Użytkownik”) uzyskuje się poprzez dokonanie rejestracji konta użytkownika Steam. Niniejsza Umowa wchodzi w życie z chwilą wyrażenia przez Użytkownika zgody na niniejsze postanowienia. Użytkownikiem nie może zostać osoba w wieku poniżej 13 lat. Serwis Steam nie jest przeznaczony dla dzieci w wieku poniżej 13 lat, a Valve nie będzie świadomie gromadzić danych osobowych takich dzieci. W kraju Użytkownika mogą obowiązywać dodatkowe ograniczenia wiekowe.

A. Strona Zawierająca Umowę

W przypadku wszelkich interakcji ze Steam stosunek umowny istnieje pomiędzy Użytkownikiem i Valve. O ile w niniejszej umowie lub w momencie dokonania transakcji (np. w przypadku zakupu od innego Użytkownika na Rynku Subskrypcji) nie wskazano inaczej, wszelkie transakcje dotyczące Subskrypcji (zdefiniowanych poniżej) dokonywane przez Użytkownika w Steam dotyczą zakupów dokonywanych od Valve.

B. Sprzęt, Subskrypcje; Treści i Usługi

Użytkownik może uzyskać dostęp do określonych usług, oprogramowania i treści dostępnych dla Użytkowników lub zakupić określony Sprzęt (zdefiniowany poniżej) w Steam. Oprogramowanie klienta Steam oraz wszelkie inne oprogramowanie, treści i aktualizacje, które Użytkownik pobiera lub do których uzyskuje dostęp za pośrednictwem Steam, w tym w szczególności, choć niewyłącznie gry wideo oraz zawarte w grach treści Valve lub osób trzecich, związane ze Sprzętem oprogramowanie oraz wszelkie wirtualne przedmioty, którymi Użytkownik handluje, które sprzedaje lub nabywa na Rynku Subskrypcji Steam, są określane w niniejszej Umowie jako „Treści i Usługi”; prawa do uzyskania dostępu do wszelkich Treści i Usług dostępnych za pośrednictwem Steam lub do korzystania z nich są określane w niniejszej Umowie jako „Subskrypcje”.

Każda z Subskrypcji umożliwia dostęp do określonych Treści i Usług. Dla niektórych Subskrypcji zastosowanie mają dodatkowe warunki specyficzne dla danej Subskrypcji („Warunki Subskrypcji”) (na przykład umowa licencyjną użytkownika końcowego dla konkretnej gry lub warunki użytkowania dla konkretnego produktu lub funkcji Steam). Ponadto dodatkowe warunki (na przykład procedury dotyczące płatności i rozliczeń) mogą zostać opublikowane na stronie http://www.steampowered.com lub w ramach serwisu Steam („Zasady Korzystania”). Zasady Korzystania obejmują Zasady Steam Zachowania w Sieci dostępne pod adresem http://steampowered.com/index.php?area=online_conduct i Politykę Zwrotów Steam dostępną pod adresem http://store.steampowered.com/steam_refunds. Warunki Subskrypcji, Zasady Korzystania i Polityka Prywatności Valve (którą można znaleźć pod adresem http://www.valvesoftware.com/privacy.htm) stają się wiążące dla Użytkownika po wyrażeniu przez niego zgody na obowiązywanie ich lub niniejszej Umowy lub w inny sposób stają się dla niego wiążące, zgodnie z opisem w sekcji 8 (Zmiany niniejszej Umowy).

C. Konto Użytkownika

Po zakończeniu procesu rejestracji w Steam Użytkownik tworzy swoje konto Steam („Konto”). Konto Użytkownika może również zawierać informacje rozliczeniowe przekazane przez Użytkownika Valve w przypadku transakcji dotyczących Subskrypcji, Treści i Usług oraz zakupu jakichkolwiek towarów fizycznych za pośrednictwem Steam („Sprzętu”). Użytkownik nie może ujawniać, udostępniać ani w inny sposób zezwalać innym osobom na korzystanie ze swojego hasła lub Konta, chyba że Valve wyraźnie wyrazi na to zgodę. Użytkownik jest odpowiedzialny za zachowanie poufności swojego loginu i hasła oraz za bezpieczeństwo swojego systemu komputerowego. Valve nie ponosi odpowiedzialności za użycie hasła i Konta Użytkownika ani za jakąkolwiek komunikację i aktywność w serwisie Steam, która wynika z użycia loginu i hasła Użytkownika przez Użytkownika lub jakąkolwiek inną osobę, której Użytkownik mógł umyślnie albo w wyniku niedbalstwa ujawnić swój login lub hasło z naruszeniem niniejszego postanowienia o zachowaniu poufności. O ile nie wynika to z niedbalstwa albo winy Valve, Valve nie ponosi odpowiedzialności za korzystanie z Konta Użytkownika przez osobę, która oszukańczo użyła loginu i hasła Użytkownika bez jego zgody. Jeśli Użytkownik uznaje, że mogło dojść do naruszenia poufności jego loginu lub hasła, musi niezwłocznie powiadomić o tym Valve za pośrednictwem formularza obsługi (https://support.steampowered.com/newticket.php).

Konto Użytkownika, w tym wszelkie informacje z nim związane (np. dane kontaktowe, informacje rozliczeniowe, historia Konta i Subskrypcje itp.), mają charakter ściśle osobisty. Użytkownik nie może zatem sprzedawać ani pobierać od innych osób opłat z tytułu prawa do korzystania ze swojego Konta ani w inny sposób przenosić Konta, ani sprzedawać lub pobierać od innych osób opłat z tytułu prawa do korzystania z jakichkolwiek Subskrypcji bądź ich przenosić, chyba że zostało to wyraźnie dopuszczone w niniejszej Umowie (w tym wszelkich Warunkach Subskrypcji lub Zasadach Korzystania) bądź w inny sposób wyraźnie dozwolone przez Valve.

D. Wyrażenie Zgody na Zawarcie Umów

Zamówienie złożone przez Użytkownika za pośrednictwem serwisu Steam stanowi skierowaną do Valve ofertę zawarcia umowy na dostawę zamówionych Subskrypcji, Treści i Usług lub Sprzętu („Produktu” lub „Produktów”) w zamian za zapłatę wskazanej ceny.

W momencie złożenia przez Użytkownika zamówienia w serwisie Steam, wyślemy mu wiadomość potwierdzającą otrzymanie zamówienia i zawierającą szczegółowe informacje dotyczące zamówienia („Potwierdzenie Zamówienia”). Potwierdzenie Zamówienia stanowi potwierdzenie otrzymania zamówienia Użytkownika, natomiast nie stanowi potwierdzenia przyjęcia jego oferty zawarcia umowy.

W przypadku Treści i Usług, przyjmujemy ofertę złożoną przez Użytkownika i zawieramy z nim umowę potwierdzając transakcję i udostępniając mu Treści i Usługi, a w przypadku zamówień przedpremierowych – jedynie potwierdzając transakcję i pobierając odpowiednią cenę za pomocą metody płatności Użytkownika.

W przypadku Sprzętu, przyjmiemy ofertę złożoną przez Użytkownika i dokonamy transakcji w zakresie zamówionego przez niego przedmiotu dopiero wtedy, gdy dokonamy wysyłki Sprzętu do Użytkownika i wyślemy do niego wiadomość e-mail potwierdzającą wysłanie Sprzętu („Potwierdzenie Wysyłki”). Jeśli zamówienie Użytkownika jest wysyłane w kilku paczkach, Użytkownik może otrzymać oddzielne Potwierdzenie Wysyłki dla każdej paczki, a każde Potwierdzenie Wysyłki i odpowiednia wysyłka skutkują zawarciem między Użytkownikiem i Valve oddzielnej umowy sprzedaży Sprzętu wskazanego w danym Potwierdzeniu Wysyłki. Wszelki Sprzęt dostarczony Użytkownikowi pozostaje własnością Valve do momentu dokonania płatności w pełnej wysokości.

Użytkownik wyraża zgodę na otrzymywanie faktur sprzedaży drogą elektroniczną.

E. Przetwarzanie płatności

Przetwarzanie płatności związanych z Treściami i Usługami lub Sprzętem zakupionym w serwisie Steam dokonywane jest bezpośrednio przez Valve Corporation albo przez należącą w całości do Valve jej spółkę zależną Valve GmbH w imieniu Valve Corporation, w zależności od zastosowanej metody płatności. Jeśli karta Użytkownika została wydana poza Stanami Zjednoczonymi, płatność Użytkownika może zostać przetworzona przez Valve GmbH w imieniu Valve Corporation za pośrednictwem europejskiego agenta rozliczeniowego. W przypadku innych rodzajów zakupów płatność będzie pobierana bezpośrednio przez Valve Corporation. W każdym przypadku dostawa Treści i Usług oraz Sprzętu jest realizowana przez Valve Corporation.
<p>
2. LICENCJE
<a id="2">
</a>
</p>
A. Ogólna Licencja na Treści i Usługi

Steam i Subskrypcja (Subskrypcje) wymagają pobrania i zainstalowania Treści i Usług na komputerze Użytkownika. Valve niniejszym udziela, a Użytkownik przyjmuje niewyłączną licencję i prawo do korzystania z Treści i Usług do osobistego, niekomercyjnego użytku (z wyjątkiem przypadków, w których użycie komercyjne jest wyraźnie dozwolone w niniejszej Umowie lub w Warunkach Subskrypcji mających zastosowanie). Niniejsza licencja wygasa z chwilą (a) rozwiązania niniejszej Umowy lub (b) zakończenia Subskrypcji obejmującej tę licencję. Treści i Usługi stanowią przedmiot licencji, a nie sprzedaży. Licencja Użytkownika nie przyznaje Użytkownikowi tytułu ani prawa własności do Treści i Usług. Aby korzystać z Treści i Usług, Użytkownik musi posiadać Konto Steam i może być zobowiązany do uruchomienia klienta Steam i utrzymywania połączenia z Internetem.

Z powodów obejmujących w szczególności choć niewyłącznie bezpieczeństwo systemu, stabilność i interoperacyjności w trybie gry wieloosobowej, Valve może potrzebować dokonać automatycznej aktualizacji, wstępnego pobierania, tworzenia nowych wersji Treści i Usług lub udoskonalenia ich w inny sposób, w związku z czym wymagania systemowe do korzystania z Treści i Usług mogą z czasem ulec zmianie.

Użytkownik wyraża zgodę na takie automatyczne aktualizacje. Użytkownik przyjmuje do wiadomości, że niniejsza Umowa (w tym obowiązujące Warunki Subskrypcji) nie uprawnia go do przyszłych aktualizacji (chyba że w zakresie wymaganym przepisami obowiązującego prawa), nowych wersji lub innych ulepszeń Treści i Usług związanych z daną Subskrypcją, chociaż Valve może zdecydować się na dostarczanie takich aktualizacji itp. wedle własnego uznania.

B. Licencja na Oprogramowanie w Wersji Beta

Valve może w dowolnym momencie udostępniać oprogramowanie za pośrednictwem serwisu Steam przed publiczną premierą komercyjną takiego oprogramowania („Oprogramowanie w Wersji Beta”). Użytkownik nie jest zobowiązany do korzystania z Oprogramowania w Wersji Beta, ale jeśli Valve je oferuje, może zdecydować się na korzystanie z niego na poniższych warunkach. Oprogramowanie w Wersji Beta uznaje się za składające się z Treści i Usług, a każdy element dostarczonego Oprogramowania w Wersji Beta będzie uważany za Subskrypcję takiego Oprogramowania w Wersji Beta, z następującymi postanowieniami szczególnymi dla Oprogramowania w wersji beta:

    Przysługujące Użytkownikowi prawo do korzystania z Oprogramowania w Wersji Beta może być ograniczone w czasie i może podlegać dodatkowym Warunkom Subskrypcji;
    Valve lub jakikolwiek podmiot powiązany z Valve może zwrócić się o lub nakazać Użytkownikowi przedstawienie sugestii, opinii lub danych dotyczących korzystania przez Użytkownika z Oprogramowania w Wersji Beta, które będą uznawane za Treści Tworzone przez Użytkownika zgodnie z postanowieniami sekcji 6 (Treści Tworzone przez Użytkownika) poniżej; oraz
    W uzupełnieniu oświadczeń o zrzeczeniu się odpowiedzialności i postanowień dotyczących ograniczenia odpowiedzialności za wszelkie Oprogramowanie, o których mowa w sekcji 7 poniżej (Wyłączenia Odpowiedzialności; Ograniczenie Odpowiedzialności; Brak Gwarancji; Ograniczona Gwarancja i Umowa) obowiązujących w stosownych przypadkach, Użytkownik wyraźnie przyjmuje do wiadomości, że Oprogramowanie w Wersji Beta jest wydawane wyłącznie w celu testowania i udoskonalania, w szczególności w celu przekazania Valve informacji zwrotnej na temat jakości i użyteczności Oprogramowania w Wersji Beta, a co się z tym wiąże, zawiera błędy i nie jest wersją ostateczną. Jeśli Użytkownik zdecyduje się zainstalować lub używać Oprogramowania w Wersji Beta, będzie zobowiązany używać go wyłącznie zgodnie z jego przeznaczeniem, tj. do testowania i ulepszania, zgodnie z wymaganiami systemowymi ustanowionymi dla danego Oprogramowania w Wersji Beta oraz, w żadnym wypadku Użytkownik nie będzie używać Oprogramowania w Wersji Beta w systemie albo z przeznaczeniem, w którym nieprawidłowe działanie Oprogramowania w Wersji Beta może spowodować jakąkolwiek szkodę. W szczególności Użytkownik powinien posiadać pełne kopie zapasowe dowolnego systemu, na którym zdecyduje się zainstalować Oprogramowanie w Wersji Beta.

C. Licencja na Korzystanie z Narzędzi Deweloperskich Valve

Subskrypcja (Subskrypcje) Użytkownika mogą obejmować dostęp do różnorodnych narzędzi Valve, których można używać do tworzenia treści („Narzędzia Deweloperskie”). Narzędzia Deweloperskie Valve obejmują np. zestaw narzędzi programistycznych Valve („SDK”) dla wersji silnika gry komputerowej znanej jako „Source” („Silnik Source”) i powiązany edytor Valve Hammer, oprogramowanie The Source® Filmmaker lub narzędzia w grze, za pomocą których można edytować lub tworzyć utwory zależne na podstawie gry Valve. Poszczególne Narzędzia Deweloperskie (na przykład oprogramowanie The Source® Filmmaker) mogą być dystrybuowane na podstawie odrębnych Warunków Subskrypcji, które różnią się od zasad określonych w niniejszej sekcji. Z wyjątkiem przypadków określonych w odrębnych Warunkach Subskrypcji mających zastosowanie do korzystania z określonego Narzędzia Deweloperskiego, Użytkownik może korzystać z Narzędzi Deweloperskich i może korzystać z, zwielokrotniać, publikować, wykonywać, wyświetlać i wprowadzać do obrotu wszelkie treści tworzone za pomocą Narzędzi Deweloperskich, w dowolny sposób, ale wyłącznie w celach niekomercyjnych.

W przypadku chęci skorzystania przez Użytkownika z Source Engine SDK lub innych Narzędzi Deweloperskich Valve do celów komercyjnych, prosimy o kontakt z Valve pod adresem sourceengine@valvesoftware.com.

D. Licencja na Korzystanie z Zawartości Gier Valve w Fan Artach

Valve docenia społeczność Użytkowników, którzy tworzą utwory plastyczne, literackie i audiowizualne nawiązujące do gier Valve („Fan Arty”). Użytkownik może umieszczać zawartość gier Valve w swoich Fan Artach. O ile w niniejszej sekcji lub w którymkolwiek z Warunków Subskrypcji nie określono inaczej, Użytkownik może korzystać z, zwielokrotniać, publikować, wykonywać, wyświetlać i wprowadzać do obrotu Fan Arty, które zawierają elementy gier Valve w dowolny sposób, ale wyłącznie w celach niekomercyjnych.

W przypadku umieszczenia przez Użytkownika w Fan Arcie jakichkolwiek treści osób trzecich, Użytkownik oświadcza, że uzyskał od wszystkie niezbędne prawa od podmiotu, któremu przysługują.

Komercyjne wykorzystanie niektórych elementów gier Valve jest dozwolone za pośrednictwem funkcji, takich jak Warsztat Steam (Steam Workshop) lub Rynek Subskrypcji Steam (Steam Subscription Marketplace). Warunki mające zastosowanie w przypadku takiego wykorzystywania są określone w sekcjach 3.D. i 6.B. poniżej oraz we wszelkich Warunkach Subskrypcji przewidzianych dla tych funkcji.

Aby zapoznać się z polityką wideo Valve zawierającą dodatkowe warunki dotyczące korzystania z utworów audiowizualnych zawierających własność intelektualną Valve lub utworzonych za pomocą oprogramowania The Source® Filmmaker, proszę odwiedzić stronę http://www.valvesoftware.com/videopolicy.html.

E. Licencja na Korzystanie z Oprogramowania Serwera Dedykowanego Valve

Subskrypcja (Subskrypcje) Użytkownika może (mogą) obejmować dostęp do Oprogramowania Serwera Dedykowanego Valve. W takim przypadku, Użytkownik może korzystać z Oprogramowania Serwera Dedykowanego Valve na nieograniczonej liczbie komputerów w celu hostowania online gier wieloosobowych będących produktami Valve. Użytkownik, który chce korzystać z Oprogramowania Serwera Dedykowanego Valve, ponosi wyłączną odpowiedzialność za zapewnienie dostępu do Internetu, przepustowości łącza internetowego lub sprzętu używanego do takich działań i ponosi wszelkie koszty z tym związane.

F. Własność Treści i Usług

Wszelki tytuł prawny, a także wszelkie prawa właścicielskie i prawa własności intelektualnej dotyczące Treści i Usług oraz wszelkich ich kopii należą do Valve lub licencjodawców Valve albo licencjodawców podmiotów powiązanych Valve. Wszelkie prawa są zastrzeżone, z wyjątkiem przypadków wyraźnie określonych w niniejszej Umowie. Treści i Usługi są chronione prawem autorskim, umowami i konwencjami międzynarodowymi dotyczącymi praw autorskich oraz innymi przepisami. Treści i Usługi zawierają określone materiały stanowiące przedmiot udzielonych licencji, a licencjodawcy Valve i jej podmiotów powiązanych mogą chronić przysługujące im prawa w przypadku naruszenia niniejszej Umowy.

G. Ograniczenia Dotyczące Korzystania z Treści i Usług

Użytkownik nie może korzystać z Treści i Usług w żadnym celu innym niż uzyskanie dozwolonego dostępu do Steam i Subskrypcji Użytkownika oraz osobiste i niekomercyjne korzystanie z Subskrypcji Użytkownika, chyba że niniejsza Umowa lub Warunki Subskrypcji mające zastosowanie stanowią inaczej. Z wyjątkiem przypadków dozwolonych na mocy niniejszej Umowy (w tym wszelkich Warunków Subskrypcji lub Zasad Korzystania) lub na mocy przepisów obowiązującego prawa uchylających obowiązywanie niniejszych ograniczeń, bez uzyskania uprzedniej pisemnej zgody Valve Użytkownik nie może, w całości lub w części, kopiować, wykonywać fotokopii, zwielokrotniać, rozpowszechniać, wprowadzać do obrotu, tłumaczyć, dokonywać inżynierii wstecznej, pozyskiwać kodu źródłowego, modyfikować, demontować, dekompilować Treści i Usług, tworzyć utworów zależnych na ich podstawie lub usuwać z Treści i Usług lub jakiegokolwiek oprogramowania udostępnianego za pośrednictwem Steam informacji bądź oznaczeń dotyczących ich własności.

Użytkownik jest uprawniony do korzystania z Treści i Usług na własny użytek osobisty, natomiast nie jest uprawniony do: (i) sprzedaży, ustanawiania zabezpieczeń lub przekazywania kopii Treści i Usług innym osobom w jakikolwiek sposób, jak również do wypożyczania, wynajmowania lub udzielania licencji na Treści i Usługi innym osobom bez uprzedniej pisemnej zgody Valve, z wyjątkiem zakresu wyraźnie dozwolonego na mocy innych postanowień niniejszej Umowy (w tym Warunków Subskrypcji lub Zasad Korzystania); (ii) hostowania lub świadczenia usług dobierania Treści i Usług albo emulowania bądź przekierowywania protokołów komunikacyjnych używanych przez Valve w ramach dowolnej funkcji sieciowej Treści i Usług, poprzez emulację protokołów, tunelowanie, modyfikowanie lub dodawanie komponentów do Treści i Usług, korzystanie z programu narzędziowego lub innych technik znanych obecnie lub opracowanych w przyszłości, w dowolnym celu, w tym do internetowych rozgrywek sieciowych, gier sieciowych z wykorzystaniem komercyjnych lub niekomercyjnych sieci gier lub w ramach części sieci agregacji treści, stron lub serwisów internetowych, bez uprzedniej pisemnej zgody Valve; lub (iii) wykorzystywania Treści i Usług lub jakiejkolwiek ich części do dowolnych celów komercyjnych, z wyjątkiem przypadków wyraźnie dozwolonych na mocy innych postanowień niniejszej Umowy (w tym wszelkich Warunków Subskrypcji lub Zasad Korzystania).

3. ROZLICZENIA, PŁATNOŚCI I INNE SUBSKRYPCJE ⏶

Wszystkie opłaty ponoszone w serwisie Steam i wszystkie zakupy dokonane za pomocą Portfela Steam są płatne z góry i ostateczne, z wyjątkiem przypadków opisanych w sekcjach 3.I i 7 poniżej.

A. Autoryzacja Płatności

Przekazując Valve lub jednemu z podmiotów przetwarzających płatności informacje dotyczące płatności, Użytkownik oświadcza Valve, że jest autoryzowanym użytkownikiem karty, kodu PIN, klucza lub konta powiązanego z tą płatnością i upoważnia Valve do obciążenia karty kredytowej lub przetworzenia płatności przez wybrany zewnętrzny podmiot przetwarzający płatności w odniesieniu do Subskrypcji, środków z Portfela Steam, Sprzętu lub innych opłat poniesionych przez Użytkownika.

W przypadku subskrypcji zamawianych na uzgodniony okres użytkowania, za które dokonywane są płatności cykliczne z tytułu możliwości dalszego korzystania („Subskrypcje z Płatnościami Cyklicznymi”), kontynuując korzystanie z Subskrypcji z Płatnościami Cyklicznymi, Użytkownik wyraża zgodę i potwierdza, że Valve jest upoważniona do obciążenia jego karty kredytowej (lub Portfela Steam, jeśli został zasilony) lub do przetworzenia płatności za pomocą dowolnego innego zewnętrznego podmiotu przetwarzającego płatności, w odniesieniu do wszelkich stosownych kwot płatności cyklicznych. W przypadku zamówienia Subskrypcji z Płatnościami Cyklicznymi, Użytkownik wyraża zgodę na niezwłoczne powiadomienie Valve o wszelkich zmianach numeru rachunku karty kredytowej, daty jej ważności lub adresu rozliczeniowego, konta PayPal bądź numeru innego konta płatniczego. Użytkownik ponadto wyraża zgodę na niezwłoczne powiadomienie Valve o wygaśnięciu lub anulowaniu karty kredytowej, konta PayPal lub innego rachunku płatniczego bez względu na przyczynę takiego wygaśnięcia czy anulowania.

Jeśli korzystanie z serwisu Steam lub zakup Sprzętu w serwisie Steam podlega jakiemukolwiek podatkowi od użytkowania lub sprzedaży, Valve może obciążyć Użytkownika również takimi podatkami pobierając je dodatkowo w stosunku do Subskrypcji lub innych opłat, o których mowa w Zasadach Korzystania. Wszystkie opłaty w serwisie Steam w Unii Europejskiej i Zjednoczonym Królestwie obejmują podatek VAT („VAT”) obowiązujący w UE lub Zjednoczonym Królestwie. Kwoty podatku VAT pobierane przez Valve odzwierciedlają podatek VAT należny od wartości Treści i Usług, Sprzętu lub Subskrypcji.

Użytkownik zobowiązuje się do niekorzystania z serwerów proxy dla maskowania adresu IP lub innych metod w celu ukrycia miejsca zamieszkania, czy to w celu obejścia ograniczeń geograficznych dotyczących zawartości gier, składania zamówień lub dokonywania zakupów po cenach innych niż obowiązujące w regionie geograficznym Użytkownika, czy też w jakimkolwiek innym celu. W takim przypadku Valve może zablokować Użytkownikowi dostęp do Konta.

B. Odpowiedzialność za opłaty związane z kontem Użytkownika

Użytkownik jako posiadacz Konta ponosi odpowiedzialność za wszelkie naliczone opłaty, w tym za obowiązujące podatki, oraz za wszystkie zamówienia lub zakupy dokonane przez siebie lub dowolną osobę korzystającą z jego Konta, w tym członków rodziny lub znajomych. W przypadku anulowania Konta Użytkownika, Valve zastrzega sobie prawo do naliczenia opłat, opłat dodatkowych lub kosztów poniesionych przed anulowaniem. Wszelkie zaległe lub nieopłacone Konta muszą zostać rozliczone zanim Valve zezwoli na ponowną rejestrację Użytkownika.

C. Portfel Steam

Steam może udostępnić saldo konta powiązane z Kontem Użytkownika („Portfel Steam”). Portfel Steam nie jest rachunkiem bankowym ani jakimkolwiek instrumentem płatniczym. Działa jako przedpłacone saldo przeznaczone do zamawiania Treści i Usług. Użytkownik może zasilić swój Portfel Steam, do maksymalnej kwoty określonej przez Valve, środkami z karty kredytowej, przepłaconej karty płatniczej, przy pomocy kodu promocyjnego lub innej metody płatności akceptowanej przez Steam. W ciągu dwudziestu czterech (24) godzin całkowita kwota przechowywana w Portfelu Steam, powiększona o całkowitą kwotę wydaną przy pomocy Portfela Steam, nie może łącznie przekroczyć kwoty 2000 USD lub równowartości tej kwoty w obowiązującej lokalnej walucie – próby wpłat do Portfela Steam, które skutkowałyby przekroczeniem tego limitu, nie zostaną zaksięgowane w Portfelu Steam, dopóki aktywność Użytkownika nie spowoduje obniżenia wartości salda poniżej tego limitu. Valve może w razie potrzeby zmieniać lub ustanawiać odmienne wartości salda Portfela Steam i limity jego wykorzystania.

O każdej zmianie salda Portfela Steam i limitów wykorzystania Użytkownik zostanie powiadomiony pocztą elektroniczną w terminie sześćdziesięciu (60) dni kalendarzowych przed wejściem zmiany w życie. Dalsze korzystanie z Konta Steam przez ponad trzydzieści (30) dni kalendarzowych po wejściu zmian w życie będzie oznaczać ich akceptację. Jeśli Użytkownik nie wyraża zgody na zmiany, jedynym przysługującym mu środkiem jest zamknięcie swojego Konta Steam lub zaprzestanie korzystania z Portfela Steam. W takim przypadku Valve nie ma obowiązku zwrotu jakichkolwiek środków pozostałych w Portfelu Steam Użytkownika.

Użytkownik może wykorzystać środki z Portfela Steam do zamówienia Subskrypcji, w tym składając zamówienia w grze, gdy włączone są transakcje wykonywane przy pomocy Portfela Steam, i kupując Sprzęt. Z zastrzeżeniem postanowień sekcji 3.I, środki dodane do Portfela Steam nie podlegają zwrotowi ani przeniesieniu. Środki z Portfela Steam nie stanowią przedmiotu prawa własności osobistej, nie mają wartości poza serwisem Steam i mogą być wykorzystywane wyłącznie do zamawiania Subskrypcji i powiązanych treści za pośrednictwem serwisu Steam (w tym między innymi gier i innych aplikacji oferowanych za pośrednictwem Sklepu Steam lub na Rynku Subskrypcji Steam) i Sprzętu. Środki z Portfela Steam nie mają wartości pieniężnej i nie można ich wymienić na gotówkę. Środki z Portfela Steam, które są uważane za mienie porzucone, mogą zostać przekazane właściwemu organowi.

D. Handel Subskrypcjami i Transakcje Dotyczące Subskrypcji Pomiędzy Użytkownikami

Serwis Steam może zawierać jedną lub kilka funkcji lub witryn, które umożliwiają Użytkownikom handel określonymi rodzajami Subskrypcji (na przykład prawami licencyjnymi do przedmiotów wirtualnych) pomiędzy Użytkownikami, oferowanie ich innym Użytkownikom bądź ich zamawianie u innych Użytkowników („Rynki Subskrypcji”). Przykładem Rynku Subskrypcji jest Rynek Społeczności Steam (Steam Community Market). Korzystając z Rynków Subskrypcji lub w nich uczestnicząc, Użytkownik upoważnia Valve, w imieniu własnym lub jako agent lub licencjobiorca jakiegokolwiek zewnętrznego twórcy lub wydawcy odpowiednich Subskrypcji znajdujących się na Koncie Użytkownika, do przeniesienia tych Subskrypcji ze swojego Konta w celu realizacji wszelkich transakcji lub sprzedaży, których dokonuje.

Z tytułu transakcji lub sprzedaży dokonywanych na Rynku Subskrypcji Valve może pobierać opłaty. Wszelkie opłaty zostaną przedstawione Użytkownikowi przed dokonaniem transakcji lub sprzedaży.

Jeśli Użytkownik dokona transakcji, sprzedaży lub złoży zamówienie na Rynku Subskrypcji, przyjmuje do wiadomości i potwierdza, że ponosi odpowiedzialność za zapłatę wszelkich podatków, które mogą być należne w związku z jego transakcjami, w tym podatków od sprzedaży lub użytkowania, oraz za przestrzeganie obowiązujących przepisów podatkowych. Przychody ze sprzedaży dokonanej na Rynku Subskrypcji mogą być uznawane za dochód dla celów podatku dochodowego. Aby określić zobowiązania podatkowe Użytkownika z tytułu działalności na dowolnym Rynku subskrypcji Użytkownik powinien skonsultować się ze specjalistą w dziedzinie podatków.

Użytkownik rozumie i przyjmuje do wiadomości, że Valve nie ma obowiązku udostępniania bądź utrzymywania jakiegokolwiek Rynku Subskrypcji. Valve może podjąć decyzję o zaprzestaniu działania dowolnego Rynku Subskrypcji, zmianie pobieranych opłat lub zmianie warunków lub funkcji Rynku Subskrypcji Steam. Użytkownik zostanie powiadomiony o każdej istotnej zmianie warunków lub dostępności Rynku Subskrypcji w odpowiednim terminie przed wejściem takiej zmiany w życie, chyba że okaże się to niemożliwe na skutek wystąpienia siły wyższej, z winy Użytkownika lub zdarzenia związanego z osobą trzecią, które pozostaje poza kontrolą Valve.

Użytkownik rozumie również i przyjmuje do wiadomości, że Subskrypcje stanowiące przedmiot wymiany, sprzedaży bądź zamówienia na jakimkolwiek Rynku Subskrypcji stanowią prawa licencyjne, oraz że nie posiada uprawnień związanych z własnością takich Subskrypcji, a także że Valve nie uznaje przenoszenia Subskrypcji (w tym wynikającego z mocy prawa), które są dokonywane poza serwisem Steam.

E. Zakupy Detaliczne

Valve może oferować Subskrypcję lub wymagać jej od nabywców wersji produktów w opakowaniu detalicznym lub wersji OEM produktów Valve. Towarzyszący takim wersjom „Klucz CD” (CD-Key) lub „Klucz Produktu” (Product Key) służą do aktywacji Subskrypcji Użytkownika. Dalsze instrukcje zostaną dostarczone wraz z odpowiednim produktem.

F. Autoryzowani Odsprzedawcy Steam

Subskrypcję można zamówić za pośrednictwem autoryzowanego odsprzedawcy Valve. Towarzyszący takiemu zamówieniu „Klucz Produktu” zostanie wykorzystany do aktywacji Subskrypcji Użytkownika. Dalsze instrukcje zostaną dostarczone wraz z odpowiednim produktem. W przypadku zamówienia Subskrypcji u autoryzowanego odsprzedawcy Valve, Użytkownik zobowiązuje się kierować wszelkie pytania dotyczące Klucza Produktu do tego Sprzedawcy.

G. Darmowe Subskrypcje

W niektórych przypadkach Valve może oferować bezpłatną Subskrypcję niektórych Treści i Usług. Podobnie jak w przypadku wszystkich Subskrypcji, Użytkownik zawsze ponosi odpowiedzialność za opłaty naliczane przez dostawców usług internetowych, operatorów telefonicznych oraz za inne opłaty za połączenie, które może ponieść podczas korzystania ze Steam, również w przypadku, gdy Valve oferuje bezpłatną Subskrypcję.

H. Witryny Osób Trzecich

W serwisie Steam mogą być udostępniane łącza (linki) do innych witryn osób trzecich. Niektóre z tych witryn mogą pobierać oddzielne opłaty, które nie są uwzględnione w Subskrypcji lub innych opłatach, które użytkownik może uiścić na rzecz Valve, i które stanowią dodatek do Subskrypcji i takich opłat. Steam może również zapewniać dostęp do dostawców zewnętrznych, którzy dostarczają treści, towary lub usługi za pośrednictwem serwisu Steam lub Internetu. Użytkownik ponosi pełną odpowiedzialność za wszelkie odrębne opłaty, za uiszczenie których odpowiada oraz za zobowiązania, które Użytkownik zaciąga w relacjach z takimi osobami trzecimi. Valve nie udziela jakichkolwiek zapewnień ani gwarancji, wyraźnych bądź dorozumianych, dotyczących jakiejkolwiek witryny osoby trzeciej. W szczególności Valve nie udziela jakichkolwiek zapewnień ani gwarancji, że jakakolwiek usługa lub subskrypcja oferowana za pośrednictwem dostawców zewnętrznych nie ulegnie zmianie, nie zostanie zawieszona lub zakończona.

I. Zwroty i Prawo do Odstąpienia od Umowy

Bez uszczerbku dla jakichkolwiek praw ustawowych, które mogą przysługiwać Użytkownikowi, Użytkownik może wystąpić o zwrot pieniędzy za zamówienie lub zakupy w Steam zgodnie z warunkami Polityki Zwrotów Valve dostępnej pod adresem http://store.steampowered.com/steam_refunds/.

Informacja dla konsumentów z Unii Europejskiej i Zjednoczonego Królestwa:

Prawo UE i Zjednoczonego Królestwa przewiduje ustawowe prawo odstąpienia od niektórych umów dotyczących towarów fizycznych i zamówień treści cyfrowych. Więcej informacji na temat zakresu ustawowego prawa odstąpienia od umowy i sposobów korzystania z tego prawa można znaleźć pod adresem https://support.steampowered.com/kb_article.php?ref=8620-QYAL-4516.

4. ZASADY POSTĘPOWANIA W SIECI, OSZUKIWANIE I MANIPULOWANIE PROCESAMI ⏶

Postępowanie Użytkownika w sieci i interakcje z innymi Użytkownikami muszą być zgodne z Zasadami Steam Dotyczącymi Zachowania w Sieci, które można znaleźć pod adresem http://steampowered.com/index.php?area=online_conduct. Wymagania dodatkowe wynikające z warunków użytkowania ustanowionych przez osoby trzecie, które hostują określone gry lub inne usługi, mogą być również wskazane w Warunkach Subskrypcji mających zastosowanie do danej Subskrypcji.

Steam oraz Treści i Usługi mogą obejmować funkcjonalność zaprojektowaną w celu identyfikacji procesów lub funkcjonalności oprogramowania lub sprzętu, dzięki którym gracze mogą uzyskać nieuczciwą przewagę konkurencyjną podczas grania w wersje Treści i Usług przeznaczone do rozgrywek wieloosobowych lub możliwość modyfikacji Treści i Usług (tzw. „Cheat’y”). Użytkownik zobowiązuje się nie tworzyć Cheat’ów oraz nie wspomagać w jakikolwiek sposób osób trzecich przy tworzeniu lub korzystaniu z Cheat’ów. Użytkownik zobowiązuje się, że nie będzie bezpośrednio lub pośrednio wyłączać, obchodzić lub w inny sposób zakłócać działania oprogramowania zaprojektowanego w celu zapobiegania lub zgłaszania korzystania z Cheat’ów.

Użytkownik zobowiązuje się, że nie będzie manipulował procesami uruchamiania i działania Steam lub Treści i Usług, chyba że Valve wyrazi na to zgodę. Użytkownik przyjmuje do wiadomości i wyraża zgodę na to, że Valve lub jakikolwiek podmiot hostujący grę wieloosobową online rozpowszechnianą za pośrednictwem serwisu Steam („Host Zewnętrzny”) może nie dopuścić Użytkownika do uczestniczenia w niektórych grach wieloosobowych online, jeśli Użytkownik korzysta z Cheat’ów bądź manipuluje procesami uruchamiania lub działania Steam bądź Treści i Usług.

Ponadto Użytkownik przyjmuje do wiadomości i potwierdza, że Hości Zewnętrzni mogą zgłaszać Valve korzystanie z Cheat’ów lub nieautoryzowane manipulowanie procesem, a Valve może przekazywać historię korzystania z Cheat’ów Hostom Zewnętrznym w zakresie określonym w Polityce Prywatności Steam.

Valve może ograniczyć lub zamknąć Konto Użytkownika bądź zakończyć daną Subskrypcję z powodu jakiegokolwiek zachowania lub działania, które jest niezgodne z prawem, stanowi Cheat lub narusza Zasady Steam Dotyczące Zachowania w Sieci. Użytkownik przyjmuje do wiadomości, że Valve nie jest zobowiązana do powiadomienia Użytkownika przed zakończeniem Subskrypcji lub zamknięciem Konta.

Użytkownik nie może korzystać z Cheat’ów, oprogramowania automatyzującego (botów), modów, hacków ani innego nieautoryzowanego oprogramowania osób trzecich służącego do wchodzenia w interakcje lub kontrolowania jakiegokolwiek procesu Rynku Subskrypcji, procesu tworzenia konta Steam bądź w inny sposób wykorzystywanego w interakcji z procesami lub interfejsem użytkownika serwisu Steam bądź do kontroli takich procesów lub interfejsu, chyba że następuje to w zakresie wyraźnie dozwolonym.

5. TREŚCI OSÓB TRZECICH ⏶

W odniesieniu do wszystkich Subskrypcji, Treści i Usług, które nie zostały utworzone przez Valve, Valve nie monitoruje takich treści osób trzecich dostępnych w serwisie Steam lub z innych źródeł. Valve nie ponosi odpowiedzialności za takie treści osób trzecich, chyba że w zakresie przewidzianym przepisami obowiązującego prawa. Chociaż niektóre aplikacje osób trzecich mogą być używane przez przedsiębiorstwa na potrzeby prowadzonej działalności gospodarczej, jednakże Użytkownik może nabywać takie oprogramowanie za pośrednictwem Steam wyłącznie do prywatnego użytku osobistego.

6. TREŚCI TWORZONE PRZEZ UŻYTKOWNIKÓW ⏶

A. Postanowienia Ogólne

Steam zapewnia Użytkownikowi interfejsy i narzędzia umożliwiające tworzenie treści i udostępnianie ich innym użytkownikom lub Valve, według uznania Użytkownika. Określenie „Treści Tworzone Przez Użytkownika” oznacza wszelkie treści udostępniane innym użytkownikom za pośrednictwem funkcji serwisu Steam dla wielu użytkowników bądź na rzecz Valve lub jej podmiotów powiązanych poprzez Treści i Usługi Użytkownika lub w inny sposób.

Przesyłając swoje treści do Steam w celu udostępnienia ich innym użytkownikom lub Valve, Użytkownik przekazuje Valve i podmiotom z nią powiązanym, bez ograniczeń terytorialnych, niewyłączne prawa do korzystania, rozpowszechniania, modyfikowania, tworzenia utworów zależnych, rozpowszechniania, przesyłania, konwersji, tłumaczenia, nadawania i udostępniania w inny sposób oraz publicznego wyświetlania i publicznego wykonania Treści Tworzonych Przez Użytkownika i opracowanych na ich podstawie utworów zależnych w celu działania, dystrybucji, włączania do i promowania serwisu Steam, gier Steam lub innych ofert Steam, w tym Subskrypcji. Niniejsza licencja jest przyznawana Valve z chwilą przesłania treści do serwisu Steam, na cały czas trwania praw własności intelektualnej. Może ona zostać rozwiązana, jeśli Valve naruszy warunki licencji i nie usunie takiego naruszenia w terminie czternastu (14) dni od otrzymania od Użytkownika zawiadomienia wysłanego do Działu Prawnego Valve na odpowiedni adres Valve podany na tej stronie Privacy Policy. Rozwiązanie wspomnianej licencji nie wpływa na prawa sublicencjobiorców wynikające z jakiejkolwiek sublicencji udzielonej przez Valve przed cofnięciem licencji. Valve jest jedynym właścicielem utworów zależnych wytworzonych przez Valve w oparciu o Treści Tworzonych Przez Użytkownika, a zatem Valve jest uprawniona do udzielania licencji na takie utwory zależne. Jeśli Użytkownik korzysta z usługi przechowywania danych w chmurze Valve, udziela Valve licencji na przechowywanie swoich danych w ramach tej usługi. Valve może ustanawiać ograniczenia dotyczące używanej przez Użytkownika przestrzeni dyskowej.

Jeśli Użytkownik przekaże Valve jakiekolwiek informacje zwrotne lub sugestie dotyczące serwisu Steam, Treści i Usług lub jakichkolwiek produktów, Sprzętu lub usług Valve, Valve może korzystać z tych informacji zwrotnych lub sugestii w dowolny sposób, bez obowiązku uzgadniania sposobu korzystania z Użytkownikiem.

Użytkownik wyraża zgodę na to, że Treści Tworzone Przez Użytkownika, które przesyła do serwisu Steam za pośrednictwem interfejsów i narzędzi dostarczonych przez Valve, będą w znacznym stopniu eksponowane. Użytkownik potwierdza, że udostępnia je dla własnej satysfakcji i w celu zdobycia uznania innych Użytkowników. W związku z powyższym, Użytkownik udziela nieodpłatnie niniejszej licencji Valve i podmiotom z nią powiązanym, niezależnie od wszelkich innych odmiennych postanowień określonych w Warunkach Korzystania z Konkretnej Aplikacji, zgodnie z definicją zawartą w sekcji 6.B poniżej.

B. Treści Przesyłane do Warsztatu Steam

Niektóre gry lub aplikacje dostępne w serwisie Steam („Aplikacje z Obsługą Warsztatu”) umożliwiają Użytkownikowi tworzenie Treści Tworzonych przez Użytkownika na podstawie lub przy użyciu Aplikacji z Obsługą Warsztatu oraz przesyłanie takich Treści Tworzonych przez Użytkownika („Treści Przesyłane do Warsztatu”) na jedną lub więcej stron internetowych Warsztatu Steam. Treści Przesyłane do Warsztatu są widoczne dla społeczności Steam, a w przypadku ich niektórych kategorii użytkownicy mogą mieć możliwość wchodzenia z nimi w interakcje, pobierania ich bądź ich zakupu. W niektórych przypadkach Valve albo producent zewnętrzny może rozważyć włączenie Treści Przesyłanych do Warsztatu do gry lub wprowadzenie ich na Rynek Subskrypcji.

Użytkownik przyjmuje do wiadomości i potwierdza, że Valve nie jest zobowiązana do używania, rozpowszechnienia lub dalszego rozpowszechniania kopii jakichkolwiek Treści Przesyłanych do Warsztatu i zastrzega sobie prawo, ale nie obowiązek, do ograniczenia lub usunięcia Treści Przesyłanych do Warsztatu z dowolnej przyczyny.

Konkretne Aplikacje z Obsługą Warsztatu albo strony internetowe Warsztatu mogą zawierać warunki szczególne („Warunki Korzystania z Konkretnej Aplikacji”), które uzupełniają lub zmieniają warunki określone w niniejszej sekcji w celu odzwierciedlenia indywidualnych wymagań danej Aplikacji z Obsługą Warsztatu.

Zgodnie z postanowieniami sekcji 6.A Treści Przesyłane do Warsztatu są co do zasady udostępniane Użytkownikom bezpłatnie. W drodze wyjątku mogą być udostępniane Użytkownikom za opłatą. W takim przypadku sposób podziału uzyskanych przychodów, a w szczególności wynagrodzenie, które Użytkownik może otrzymać z tytułu takiego udostępnienia, są określone w Warunkach Korzystania z Konkretnej Aplikacji, a nie w niniejszej Umowie. O ile w Warunkach Korzystania z Konkretnej Aplikacji (o ile takie istnieją) nie określono odmiennie, Treści Przesyłane do Warsztatu podlegają następującym zasadom ogólnym:

    Treści Przesyłane do Warsztatu stanowią Subskrypcje, a zatem Użytkownik wyraża zgodę i oświadcza, że każdemu Użytkownikowi, który otrzyma Treści Przesyłane do Warsztatu, będą przysługiwały takie same prawa do korzystania z Treści Przesyłanych do Warsztatu (i będzie podlegał takim samym ograniczeniom), jakie są określone w niniejszej Umowie dla wszelkich innych Subskrypcji.
    Niezależnie od licencji opisanej w sekcji 6.A, Valve będzie miała prawo do modyfikacji, w tym do tworzenia utworów zależnych bazujących na Treściach Przesyłanych do Warsztatu przez Użytkownika, w następujących przypadkach: (a) Valve może wprowadzać modyfikacje niezbędne do zapewnienia kompatybilności Treści Przesłanych przez Użytkownika ze Steam i funkcjonalnościami Warsztatu lub interfejsem użytkownika, oraz (b) Valve lub odpowiedni deweloper może wprowadzać modyfikacje Treści Przesyłanych do Warsztatu, które zostały przyjęte do rozpowszechniania w Aplikacji, jeśli uzna to za konieczne lub pożądane w celu ulepszenia rozgrywki lub zapewnienia jej zgodności z Aplikacją z Obsługą Warsztatu. Zgodnie z postanowieniami sekcji 6.A Użytkownik nieodpłatnie przyznaje Valve i podmiotom z nią powiązanym prawo do modyfikowania, w tym do tworzenia utworów zależnych na podstawie jego Treści Przesyłanych do Warsztatu. W związku z powyższym Użytkownikowi nie przysługuje od Valve jakiekolwiek wynagrodzenie z tytułu modyfikowania przez Valve jego Treści Przesyłanych do Warsztatu.
    Użytkownik może, według własnego uznania, usunąć Treści Przesyłane do Warsztatu z odpowiednich stron Warsztatu. W takim przypadku Valve nie będzie już przysługiwać prawo do korzystania, rozpowszechniania, przesyłania, udostępniania, publicznego wyświetlania lub publicznego wykonania Treści Przesyłanych do Warsztatu, z zastrzeżeniem jednak, że (a) Valve może nadal korzystać z tych praw w odniesieniu do wszelkich Treści Przesyłanych do Warsztatu, które są przyjęte do rozpowszechniania w grze lub rozpowszechnione w sposób umożliwiający ich wykorzystanie w grze, oraz (b) usunięcie dokonane przez Użytkownika nie wpłynie na prawa tych Użytkowników, którzy już uzyskali dostęp do kopii Treści Przesyłanych do Warsztatu.

C. Promocje i Wsparcie

Jeśli Użytkownik korzysta z usług Steam (np. Listy Kuratorów Steam lub usługi Steam Broadcasting) w celu promowania lub wspierania produktu, usługi lub wydarzenia w zamian za jakiekolwiek wynagrodzenie uzyskiwane od osoby trzeciej (w tym w zamian za nagrody niepieniężne, takie jak darmowe gry), musi wyraźnie wskazać źródło takiego wynagrodzenia swoim odbiorcom.

D. Zapewnienia i Gwarancje

Użytkownik zapewnia i gwarantuje Valve, że posiada prawa do wszystkich Treści Tworzonych przez Użytkownika, które wystarczają, by przyznać Valve i innym zainteresowanym podmiotom licencje opisane w punktach A. i B. powyżej lub w jakichkolwiek szczególnych postanowieniach licencyjnych dla odpowiedniej Aplikacji z Obsługą Warsztatu bądź strony Warsztatu. Obejmuje to, bez ograniczeń, wszelkiego rodzaju prawa własności intelektualnej lub inne prawa własności lub dobra osobiste, na które mają wpływ Treści Tworzone Przez Użytkownika lub które są w nich zawarte. W szczególności, w odniesieniu do Treści Przesyłanych do Warsztatu, Użytkownik zapewnia i gwarantuje, że Treści Przesyłane do Warsztatu zostały pierwotnie stworzone przez niego (lub, w odniesieniu do Treści Przesyłanych do Warsztatu, do stworzenia których przyczyniły się oprócz Użytkownika inne osoby, przez Użytkownika i innych twórców – w takim przypadku, Użytkownik zapewnia i gwarantuje, że przysługuje mu prawo do przekazania takich Treści Przesyłanych do Warsztatu również w imieniu pozostałych twórców).

Ponadto, Użytkownik zapewnia i gwarantuje, że Treści Tworzone Przez Użytkownika, przesłanie takich Treści oraz przyznawanie przez Użytkownika praw do tych Treści nie narusza jakiejkolwiek obowiązującej umowy, przepisów prawa ani innego rodzaju regulacji.

7. WYŁĄCZENIA ODPOWIEDZIALNOŚCI; OGRANICZENIE ODPOWIEDZIALNOŚCI; BRAK GWARANCJI; OGRANICZONA GWARANCJA I UMOWA ⏶

NINIEJSZA SEKCJA 7 NIE MA ZASTOSOWANIA DO UŻYTKOWNIKÓW Z UE LUB ZJEDNOCZONEGO KRÓLESTWA.

    W PRZYPADKU UŻYTKOWNIKÓW Z AUSTRALII NINIEJSZA SEKCJA 7 NIE WYKLUCZA, NIE OGRANICZA ANI NIE MODYFIKUJE STOSOWANIA JAKIEJKOLWIEK GWARANCJI, PRAWA LUB ŚRODKA PRAWNEGO, KTÓREGO NIE MOŻNA WYKLUCZYĆ, OGRANICZYĆ LUB ZMODYFIKOWAĆ, W TYM PRZYZNANYCH PRZEZ AUSTRALIJSKĄ USTAWĘ O PRAWACH KONSUMENTA (ACL). ZGODNIE Z ACL TOWARY SĄ OBJĘTE GWARANCJĄ, W TYM GWARANCJĄ AKCEPTOWALNEJ JAKOŚCI. W PRZYPADKU NIEDOTRZYMANIA TEJ GWARANCJI, UŻYTKOWNIKOWI PRZYSŁUGUJE PRAWO DO ŚRODKA PRAWNEGO (CO MOŻE OBEJMOWAĆ NAPRAWĘ, WYMIANĘ TOWARU ALBO ZWROT PIENIĘDZY). JEŚLI NIE MOŻNA ZAPEWNIĆ NAPRAWY LUB WYMIANY, ALBO WYSTĄPI POWAŻNA AWARIA, UŻYTKOWNIKOWI PRZYSŁUGUJE PRAWO DO ZWROTU PIENIĘDZY.
    W PRZYPADKU UŻYTKOWNIKÓW Z NOWEJ ZELANDII NINIEJSZA SEKCJA 7 NIE WYKLUCZA, NIE OGRANICZA ANI NIE MODYFIKUJE STOSOWANIA JAKIEGOKOLWIEK PRAWA LUB ŚRODKA PRAWNEGO, KTÓREGO NIE MOŻNA WYKLUCZYĆ, OGRANICZYĆ LUB ZMODYFIKOWAĆ, W TYM PRZYZNANYCH PRZEZ NOWOZELANDZKĄ USTAWĘ O GWARANCJACH KONSUMENCKICH Z 1993 R. USTAWA TA USTANOWIA SZEREG GWARANCJI, M.IN. GWARANCJĘ AKCEPTOWALNEJ JAKOŚĆ TOWARÓW I USŁUG. W PRZYPADKU NIEDOTRZYMANIA TEJ GWARANCJI PRZYSŁUGUJĄ UPRAWNIENIA DO USUNIĘCIA WADY OPROGRAMOWANIA (CO MOŻE OBEJMOWAĆ NAPRAWĘ, WYMIANĘ LUB ZWROT PIENIĘDZY). JEŚLI NIE MOŻNA USUNĄĆ WADY ALBO NIESPRAWNOŚĆ MA ISTOTNY CHARAKTER, USTAWA TA PRZEWIDUJE ZWROT PIENIĘDZY.

Przed nabyciem Subskrypcji należy zapoznać się z informacjami o produkcie udostępnionymi w serwisie Steam, w tym z opisem Subskrypcji, minimalnymi wymaganiami technicznymi i opiniami użytkowników.

A. WYŁĄCZENIA ODPOWIEDZIALNOŚCI

W MAKSYMALNYM ZAKRESIE DOZWOLONYM PRZEZ OBOWIĄZUJĄCE PRAWO, VALVE ORAZ JEJ PODMIOTY POWIĄZANE I USŁUGODAWCY WYRAŹNIE WYŁĄCZAJĄ SWOJĄ ODPOWIEDZIALNOŚĆ Z TYTUŁU (I) WSZELKICH GWARANCJI DOTYCZĄCYCH SERWISU STEAM, TREŚCI I USŁUGI ORAZ SUBSKRYPCJI, ORAZ (II) WSZELKICH OBOWIĄZKÓW WYNIKAJĄCYCH Z NORM COMMON LAW W ODNIESIENIU DO STEAM, TREŚCI I USŁUG ORAZ SUBSKRYPCJI, W TYM OBOWIĄZKU ZAPOBIEGANIA NIEDBALSTWU I NIEDOSTATECZNEJ FACHOWOŚCI. STEAM, TREŚCI I USŁUGI, SUBSKRYPCJE I WSZELKIE INFORMACJE DOSTĘPNE W ZWIĄZKU Z NIMI SĄ DOSTARCZANE W BIEŻĄCEJ POSTACI („AS IS”) I „W MIARĘ DOSTĘPNOŚCI” (AS AVAILABLE), „ZE WSZYSTKIMI WADAMI” (WITH ALL FAULTS) I BEZ JAKIEJKOLWIEK GWARANCJI, WYRAŹNEJ LUB DOROZUMIANEJ, W TYM, BEZ OGRANICZENIA, DOROZUMIANYCH GWARANCJI PRZYDATNOŚCI HANDLOWEJ, PRZYDATNOŚCI DO OKREŚLONEGO CELU LUB NIENARUSZALNOŚCI PRAW. WYRAŹNIE WYŁĄCZA SIĘ WSZELKIE GWARANCJE NIENARUSZALNOŚCI, O KTÓRYCH MOWA W SEKCJI 2-312 AMERYKAŃSKIEGO FEDERALNEGO JEDNOLITEGO KODEKSU HANDLOWEGO LUB W JAKIEJKOWLIEK INNEJ PORÓWNYWALNEJ USTAWIE STANOWEJ. NIE UDZIELA SIĘ RÓWNIEŻ GWARANCJI BRAKU WAD PRAWNYCH, BRAKU INGERENCJI W KORZYSTANIE UŻYTKOWNIKA LUB UPRAWNIEŃ UŻYTKOWNIKA W ZWIĄZKU Z SERWISEM STEAM, TREŚCIAMI I USŁUGAMI, SUBSKRYPCJAMI LUB INFORMACJAMI DOSTĘPNYMI W ZWIĄZKU Z NIMI.

WYRAŹNIE WYŁĄCZA SIĘ WSZELKIE GWARANCJE NIENARUSZALNOŚCI PRAW, O KTÓRYCH MOWA W SEKCJI 2-312 AMERYKAŃSKIEGO FEDERALNEGO JEDNOLITEGO KODEKSU HANDLOWEGO.

B. OGRANICZENIE ODPOWIEDZIALNOŚCI

W MAKSYMALNYM ZAKRESIE DOZWOLONYM PRZEZ OBOWIĄZUJĄCE PRAWO, VALVE, JEJ LICENCJODAWCY, ICH PODMIOTY POWIĄZANE ORAZ ŻADEN Z DOSTAWCÓW USŁUG VALVE, NIE PONOSI ODPOWIEDZIALNOŚCI ZA JAKIEKOLWIEK STRATY LUB SZKODY WYNIKAJĄCE Z KORZYSTANIA LUB BRAKU MOŻLIWOŚCI KORZYSTANIA Z SERWISU STEAM, KONTA UŻYTKOWNIKA, SUBSKRYPCJI UŻYTKOWNIKA ORAZ TREŚCI I USŁUG, W TYM UTRATY WARTOŚCI FIRMY, PRZERW W DZIAŁALNOŚCI, AWARII LUB NIEPRAWIDŁOWEGO DZIAŁANIA KOMPUTERA LUB JAKICHKOLWIEK INNYCH SZKÓD LUB STRAT HANDLOWYCH. NIEZALEŻNIE OD PRZYPADKU, VALVE NIE PONOSI ODPOWIEDZIALNOŚCI ZA ODSZKODOWANIE ZA JAKIEKOLWIEK SZKODY POŚREDNIE, WTÓRNE, NASTĘPCZE, SZCZEGÓLNE, ODSZKODOWANIE RETORSYJNE LUB PREWENCYJNE, ANI ZA JAKIEKOLWIEK INNE SZKODY WYNIKAJĄCE Z LUB W JAKIKOLWIEK SPOSÓB ZWIĄZANE ZE STEAM, Z TREŚCIĄ I USŁUGAMI, SUBSKRYPCJAMI I WSZELKIMI DOSTĘPNYMI W ZWIĄZKU Z NIMI INFORMACJAMI, ANI ZA OPÓŹNIENIE LUB NIEMOŻNOŚĆ KORZYSTANIA Z TREŚCI I USŁUG, SUBSKRYPCJI LUB JAKICHKOLWIEK INFORMACJI, NAWET W PRZYPADKU WYSTĄPIENIA WINY STEAM LUB JEGO PODMIOTÓW POWIĄZANYCH, CZYNU NIEDOZWOLONEGO (W TYM NIEDBALSTWA), ODPOWIEDZIALNOŚCI NA ZASADZIE RYZYKA LUB NIEDOTRZYMANIA GWARANCJI STEAM, NAWET JEŚLI ZOSTAŁA POINFORMOWANA O MOŻLIWOŚCI WYSTĄPIENIA TAKICH SZKÓD LUB ODSZKODOWAŃ. NINIEJSZE OGRANICZENIA I WYŁĄCZENIA ODPOWIEDZIALNOŚCI MAJĄ ZASTOSOWANIE, NAWET JEŚLI JAKIKOLWIEK ŚRODEK PRAWNY NIE ZAPEWNIA ODPOWIEDNIEJ REKOMPENSATY.

PONIEWAŻ NIEKTÓRE STANY LUB JURYSDYKCJE NIE ZEZWALAJĄ NA WYŁĄCZENIE LUB OGRANICZENIE ODPOWIEDZIALNOŚCI ZA SZKODY NASTĘPCZE LUB WTÓRNE, W TAKICH STANACH LUB JURYSDYKCJACH ODPOWIEDZIALNOŚĆ VALVE, KAŻDEGO Z JEJ LICENCJODAWCÓW I PODMIOTÓW POWIĄZANYCH BĘDZIE OGRANICZONA W PEŁNYM ZAKRESIE DOZWOLONYM PRZEZ PRAWO.

C. BRAK GWARANCJI

W MAKSYMALNYM ZAKRESIE DOZWOLONYM PRZEZ OBOWIĄZUJĄCE PRAWO VALVE I JEJ PODMIOTY POWIĄZANE NIE UDZIELAJĄ GWARANCJI CIĄGŁEGO, WOLNEGO OD BŁĘDÓW I WIRUSÓW LUB BEZPIECZNEGO DZIAŁANIA SERWISU STEAM, TREŚCI I USŁUG, KONTA UŻYTKOWNIKA LUB SUBSKRYPCJI BADŹ JAKICHKOLWIEK INFORMACJI DOSTĘPNYCH W ZWIĄZKU Z NIMI ORAZ DOSTĘPU DO NICH.

D. OGRANICZONA GWARANCJA I UMOWA

OKREŚLONY SPRZĘT ZAKUPIONY OD VALVE JEST OBJĘTY OGRANICZONĄ GWARANCJĄ I UMOWĄ [BĄDŹ, W ZALEŻNOŚCI OD LOKALIZACJI UŻYTKOWNIKA, RĘKOJMIĄ], KTÓRA JEST SZCZEGÓŁOWO OPISANA TUTAJ.

8. ZMIANY NINIEJSZEJ UMOWY ⏶

UWAGA: w stosunku do użytkowników posiadających miejsce zamieszkania w Niemczech, zastosowanie ma inna wersja Sekcji 8, która jest dostępna tutaj.

A. Zmiana Za Porozumieniem Stron

Niniejsza Umowa może zostać w dowolnym momencie zmieniona za porozumieniem stron poprzez udzielenie przez Użytkownika wyraźnej zgody na zmiany zaproponowane przez Valve.

B. Zmiana Jednostronna

Ponadto Valve może jednostronnie zmienić niniejszą Umowę (w tym wszelkie Warunki Subskrypcji lub Zasady Korzystania) w dowolnym momencie według własnego uznania. W takim przypadku Użytkownik zostanie powiadomiony o każdej zmianie niniejszej Umowy dokonanej przez Valve pocztą elektroniczną, na co najmniej 30 dni przed datą wejścia w życie zmiany. Z treścią Umowy można zapoznać się w dowolnym momencie na stronie http://www.steampowered.com/. Nieusunięcie przez Użytkownika swojego Konta przed datą wejścia w życie zmiany będzie oznaczać akceptację zmienionych warunków. Jeśli Użytkownik nie wyraża zgody na zmianę bądź którekolwiek z postanowień niniejszej Umowy, jedynym przysługującym mu środkiem prawnym jest zamknięcie Konta Steam lub zaprzestanie korzystania z jednej albo większej liczby Subskrypcji, których to dotyczy. Valve nie ma obowiązku zwrotu jakichkolwiek opłat, które mogły zostać naliczone na Koncie Użytkownika przed usunięciem jego Konta lub przed zaprzestaniem korzystania z jakiejkolwiek Subskrypcji. Valve nie ma również obowiązku proporcjonalnego naliczania jakichkolwiek opłat w takich okolicznościach.

9. OKRES OBOWIĄZYWANIA I ROZWIĄZANIE UMOWY ⏶

A. Okres Obowiązywania Umowy

Okres obowiązywania niniejszej Umowy („Okres Obowiązywania”) rozpoczyna się w dniu, w którym Użytkownik po raz pierwszy wyrazi akceptację niniejszych postanowień i będzie trwał do momentu jego zakończenia w jakikolwiek sposób zgodny z postanowieniami niniejszej Umowy.

B. Rozwiązanie Umowy Przez Użytkownika

Użytkownik może usunąć swoje Konto w dowolnym momencie. Użytkownik może zaprzestać korzystania z Subskrypcji w dowolnym momencie albo, jeśli tak zdecyduje, może zwrócić się do Valve o zaprzestanie udostępniania mu Subskrypcji. Subskrypcji nie można jednak przenieść, a nawet w przypadku zaprzestania udostępniania Subskrypcji dla konkretnej gry lub aplikacji, oryginalny klucz aktywacyjny nie będzie mógł zostać zarejestrowany na innym koncie, nawet jeśli Subskrypcja została uzyskana w sprzedaży detalicznej. Nie można zaprzestać udostępniania Subskrypcji zamówionych w ramach pakietu lub zestawu oddzielnie, zaprzestanie udostępniania jednej z gier w zestawie będzie skutkować zaprzestaniem udostępniania wszystkich gier zamówionych w pakiecie. Usunięcie Konta lub zaprzestanie korzystania z jakiejkolwiek Subskrypcji lub żądanie anulowania dostępu do Subskrypcji nie uprawnia Użytkownika do zwrotu, w tym zwrotu jakichkolwiek opłat za Subskrypcję. Valve zastrzega sobie prawo do pobrania opłat, opłat dodatkowych lub kosztów poniesionych przed usunięciem Konta Użytkownika lub zaprzestaniem udostępniania określonej Subskrypcji. Ponadto Użytkownik ponosi odpowiedzialność za wszelkie opłaty naliczone przez dostawców zewnętrznych lub dostawców treści przed zaprzestaniem udostępniania.

C. Rozwiązanie Umowy Przez Valve

Valve może ograniczyć lub anulować Konto Użytkownika lub każdą konkretną Subskrypcję w dowolnym momencie w przypadku, (a) gdy Valve generalnie zaprzestanie udostępniać takie Subskrypcje Użytkownikom w podobnej sytuacji albo (b) gdy Użytkownik naruszy jakiekolwiek postanowienia niniejszej Umowy (w tym wszelkie Warunki Subskrypcji lub Zasady Korzystania). W przypadku ograniczenia, zamknięcia bądź anulowania Konta Użytkownika lub konkretnej Subskrypcji przez Valve z powodu naruszenia postanowień niniejszej Umowy lub niewłaściwych lub niezgodnych z prawem działań, nie przyznaje się zwrotu środków, w tym opłat za Subskrypcję lub niewykorzystanych środków w Portfelu Steam.

D. Dalsze Obowiązywanie Postanowień Umowy

Postanowienia Sekcji 2.C., 2.D., 2.F., 2.G., 3.A., 3.B., 3.D., 3.H. i 5–11 pozostaną w mocy po wygaśnięciu lub rozwiązaniu niniejszej Umowy.

10. PRAWO WŁAŚCIWE/ KOSZTY REPREZENTACJI PRAWNEJ ⏶

Większość wątpliwości użytkowników można wyjaśnić korzystając z naszej strony wsparcia Steam pod adresem https://support.steampowered.com/. Jeśli Valve nie jest w stanie wyjaśnić wątpliwości Użytkownika, a pomiędzy Użytkownikiem a Valve nadal istnieje spór, w niniejszej Sekcji wyjaśniono, w jaki sposób strony zgodziły się go rozwiązać.

Informacja Dla Wszystkich Użytkowników Spoza Unii Europejskiej i Zjednoczonego Królestwa:

Użytkownik i Valve uzgadniają, że niniejsza Umowa zostanie uznana za sporządzoną i zawartą w stanie Waszyngton w Stanach Zjednoczonych i prawo stanu Waszyngton, z wyłączeniem norm kolizyjnych oraz Konwencji o Umowach Międzynarodowej Sprzedaży Towarów, reguluje wszelkie spory i roszczenia wynikające lub związane z: (i) dowolnym aspektem relacji pomiędzy Użytkownikiem i Valve; (ii) niniejszą Umową; bądź (iii) korzystaniem przez Użytkownika z serwisu Steam, Konta Użytkownika lub Treści i Usług. Użytkownik i Valve uzgadniają, że wszelkie spory i roszczenia pomiędzy Użytkownikiem i Valve (w tym wszelkie spory i roszczenia, które powstały przed wejściem w życie niniejszej lub jakiejkolwiek wcześniejszej umowy) będą dochodzone wyłącznie w dowolnym, właściwym przedmiotowo sądzie stanowym lub federalnym zlokalizowanym w hrabstwie King w stanie Waszyngton. Użytkownik i Valve niniejszym wyrażają zgodę, że te sądy będą sądami wyłącznie właściwymi, i zrzekają się podnoszenia zarzutów dotyczących niewłaściwości osobowej lub miejscowej w takich sądach.

Jeśli w kraju zamieszkania Użytkownika obowiązują inne sposoby rozwiązywania sporów, Użytkownik może z nich skorzystać. Jeśli Użytkownik jest konsumentem mieszkającym w Rosji, w celu rozstrzygnięcia sporu może skorzystać z usług lokalnych rosyjskich sądów państwowych.

Informacja dla Użytkowników z UE i Zjednoczonego Królestwa:

Niniejsza Umowa podlega prawu kraju, w którym Użytkownik posiada miejsce zwykłego pobytu.

W przypadku wystąpienia sporu dotyczącego wykładni, wykonania lub ważności Umowy Użytkownika, przed podjęciem jakichkolwiek kroków prawnych można dążyć do polubownego rozwiązania sporu. Reklamację można złożyć na stronie http://help.steampowered.com. Komisja Europejska udostępnia konsumentom z UE platformę internetowego rozstrzygania sporów, która znajduje się pod adresem https://ec.europa.eu/consumers/odr. W tej platformie nie mogą uczestniczyć firmy amerykańskie, dlatego Valve nie jest tam zarejestrowana. Jednak w takim zakresie, w jakim skarga dotyczy postępowania przedstawiciela Valve ds. ochrony danych w firmie Valve GmbH, można złożyć tam skargę.

W przypadku, gdy procedura alternatywnego rozstrzygania sporów nie przyniesie rezultatu lub jeśli Valve lub Użytkownik postanowi nie skorzystać z alternatywnych metod rozstrzygania sporu, Użytkownik może wszcząć postępowanie przed sądem właściwym dla swojego miejsca zamieszkania.

11. POSTANOWIENIA RÓŻNE ⏶

W przypadku, gdy którekolwiek z postanowień niniejszej Umowy zostanie uznane przez sąd za niezgodne z prawem lub niewykonalne, takie postanowienie będzie egzekwowane w maksymalnym dopuszczalnym zakresie, a pozostałe postanowienia niniejszej Umowy pozostaną w mocy.

Niniejsza Umowa, w tym wszelkie Warunki Subskrypcji, Zasady Korzystania, Polityka Prywatności Valve i Polityka Ograniczonej gwarancji na Sprzęt Valve, stanowi i zawiera całość porozumienia między stronami w odniesieniu do przedmiotu niniejszej Umowy i zastępuje wszelkie wcześniejsze umowy zawarte w formie ustnej bądź pisemnej. Użytkownik wyraża zgodę na to, że niniejsza Umowa nie ma na celu przyznania i nie przyznaje jakichkolwiek praw ani środków prawnych jakiejkolwiek innej osobie niż strony niniejszej Umowy.

Obowiązki Valve podlegają obowiązującym przepisom i procedurom prawnym, a Valve może być zobowiązana do wykonywania poleceń organów ścigania lub wymogów regulacyjnych niezależnie od jakichkolwiek odmiennych postanowień Umowy.

Użytkownik zobowiązuje się przestrzegać wszystkich obowiązujących przepisów i regulacji dotyczących importu lub eksportu. Użytkownik zobowiązuje się nie eksportować Treści i Usług i Sprzętu ani nie zezwalać na korzystanie z Konta przez osoby pochodzące z krajów wspierających terroryzm, do których eksport produktów i usług obejmujących technologie szyfrowania jest w momencie ich wywozu ograniczony przez amerykańskie Federalne Biuro Administracji Eksportu. Użytkownik zapewnia i gwarantuje, że nie znajduje się na terenie takiego objętego restrykcjami kraju ani pod jego kontrolą oraz że nie jest obywatelem lub rezydentem takiego kraju.

Niniejsza Umowa została ostatnio zaktualizowana w dniu 26 września 2024 r. („Data Aktualizacji”). Jeśli Użytkownik posiadał status Użytkownika przed Datą Aktualizacji, niniejsza Umowa zastępuje i wypiera wcześniej przez niego zawartą umowę z Valve lub Valve SARL w dniu, w którym wchodzi ona w życie zgodnie z postanowieniami Sekcji 8 powyżej.
</p>
</div>
    </body>
</html>
