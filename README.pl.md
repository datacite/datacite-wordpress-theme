[![Generic badge](https://img.shields.io/badge/verison-2.0-green.svg)](https://shields.io/)
[![en](https://img.shields.io/badge/lang-en-red.svg)](https://github.com/datacite/datacite-wordpress-theme/blob/main/README.md)

### Wymagania

- **Docker** - https://docs.docker.com/get-started/#download-and-install-docker
- **Node** - https://nodejs.org/en/download/
- **Yarn** (opcjonalnie) - https://classic.yarnpkg.com/en/docs/install/#mac-stable

### 1. Stawianie środowiska lokalnie na dockerze

#### 1.1 Ustawienia dockera

W celu poprawnej synchronizacji plików pomeidzy konetnerem dockera oraz plikami templatki nalezy w Opcjach dockera ustawić
opcję **Use gRPC FUSE for file sharing** jako aktywną

#### 1.2 Ustawianie lokalnej domeny na przykładzie ```my-project.local```

Przejdź do pliku `etc/hosts` w systemie Mac/Linux

Na końcu pliku dopisz 2 line:

```
127.0.0.1 my-project.local
::1 my-project.local
```
dodanie tych dwóch lini do pliku hosts ma na celu kierować wybraną domenę ```my-project.local``` na lokalną maszynę, w tym przypadku kontener w dockerze

#### 1.3 Konfiguracja środowiska

W glównym folderze stworzenie nowego pliku `.env`, kopiując przykładowy ```.env.example```

```
cp .env.example .env
```

Przykładowa konfiguracja najistotniejszych zmiennych

```
COMPOSE_PROJECT_NAME=project_name
DOMAIN=my-project.local
...

WORDPRESS_TITLE="My project title"
WORDPRESS_THEME_NAME="my-project"
WORDPRESS_ADMIN_EMAIL="moj-email@mohi.to"
...

GULP_PROXY=http://my-project.local
```
pamiętaj aby wartości ```GULP_PROXY``` oraz ```DOMAIN``` zgadzały sie z wymyśloną nazwą domeny, w tym przykładzie jest to ```my-project.local```

#### 1.4 Instalacja

Ponizsza komenda poprzez 7 kroków, pobierze odpowiednie obrazy dockera, zainstaluje wordpressa według konfiguracji podanej w pliku ```.env```, zainstaluje wybrane pluginy oraz uruchomi podstawowy szablon
```
sh install
```

#### 1.5 Instalacja pakietów dla node

Przejdź do folderu plików żródłowych

```
cd src
```

Zainstaluj pakiety

```
npm install
// lub
yarn install
```

Uruchom gulpa

```
gulp watch
// lub
yarn start
```

### 2. Dostępne adresy, dane dostępowe

Na podstawie założonej z początku domeny ```my-project.local```, powstają nam poszczególne adresy na których możemy pracować

- Wordpress - **http://my-project.local**
- Wordpress - Admin - **http://my-project.local/wp-admin**
- Browsersync - **http://locahost:3000**
- Adminer - **http://my-project.local/_adminer**
- phpMyAdmin - **http://my-project.local/_pma**

Dostęp do bazy danych

- Serwer bazy danych: **database**
- Użytkownik bazy danych: **root**
- Hasło z bazy danych: **password**
- Nazwa bazy danych: **wordpress**

### 3. Przydatne komendy

Użycie WP-CLI do zmiany adresów w bazie danych

```
docker-compose run --rm wpcli search-replace 'some-old-domain.pl' 'some-new-domain.pl' --all-tables
```

### 4. Development

### 4.1 Instalacja pluginów

- pluginy premium w folderze `plugins` w archiwum `.zip`
- wszytstkie inne pluginy dostępne w repozytorium pluginów wordpress wylistowane w pliku `plugins.txt` lub dodane w pliku `composer.json` jako
  repozytorium **wpackagist** (https://wpackagist.org/)
    - przykładowo **W3 Total Cache** https://pl.wordpress.org/plugins/w3-total-cache/
        - plugins.txt:
        ```
        w3-total-cache
        ```
        - composer.json:
        ```
        {
        ...
            "require": {
                "php": "^7.1",
                ...
                "wpackagist-plugin/w3-total-cache":"2.1.1"
            }
        }
        ```

### 4.2 Struktura plików

- **docker**
    - **config** (pliki konfiguracyjne dla nginx oraz php)
    - **volumes** (pliki wordpressa wp-content + wp-config.php)
    - **logs** (logi apache oraz nginx)
- **plugins** (pluginy premium do wordpressa)
- **src** (pliki żródłowe)
    - **styles** (style SCSS)
    - **scripts** (skrypty JS)
- **theme** (katalog szablonu wordpress)
    - **controllers** (pliki szablonów stron)
    - **includes** (pliki zawierające dodatkowe funkcjonalności szablonu)
    - **styles** (zminifikowane pliki styli)
    - **scripts** (zminifikowane pliki skryptów JS)
    - **vendor** (dodatkowe biblioteki, instalacja z poziomu composera)
    - **views** (pliki widoków .twig)
