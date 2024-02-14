[![Generic badge](https://img.shields.io/badge/verison-2.0-green.svg)](https://shields.io/)

### Requirements

- **Docker** - https://docs.docker.com/get-started/#download-and-install-docker
- **Node** - https://nodejs.org/en/download/
- **Yarn** (optional) - https://classic.yarnpkg.com/en/docs/install/#mac-stable

### 1. Setting up the environment locally on Docker

#### 1.1 Docker settings

In order to properly synchronize files between the Docker connector and the template files, you must set the Docker Options
**Use gRPC FUSE for file sharing** option as active

#### 1.2 Setting the local domain using the example of ```my-project.local```

Navigate to the `etc/hosts` file on Mac/Linux

At the end of the file, add 2 lines:

```
127.0.0.1 my-project.local
::1 my-project.local
```
adding these two lines to the hosts file is to direct the selected domain ```my-project.local``` to the local machine, in this case a container in docker

#### 1.3 Environment configuration

In the main folder, create a new `.env` file by copying the example ```.env.example```

```
cp .env.example .env
```

Sample configuration of the most important variables

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
remember that the values ​​of ```GULP_PROXY``` and ```DOMAIN``` match the invented domain name, in this example it is ```my-project.local```

#### 1.4 Installation

The following command will, through 7 steps, download the appropriate Docker images, install WordPress according to the configuration given in the ```.env``` file, install selected plugins and run the basic template
```
sh install
```

#### 1.5 Installing packages for node

Go to the source files folder

```
cd src
```

Install packages

```
npm install
// the
yarn install
```

Run gulp

```
gulp watch
// the
yarn start
```

### 2. Available addresses, access data

Based on the domain ```my-project.local``` established at the beginning, we create individual addresses on which we can work

- Wordpress - **http://my-project.local**
- Wordpress - Admin - **http://my-project.local/wp-admin**
- Browsersync - **http://locahost:3000**
- Adminer - **http://my-project.local/_adminer**
- phpMyAdmin - **http://my-project.local/_pma**

Access to the database

- Database server: **database**
- Database user: **root**
- Database password: **password**
- Database name: **wordpress**

### 3. Useful commands

Using WP-CLI to change addresses in the database

```
docker-compose run --rm wpcli search-replace 'some-old-domain.pl' 'some-new-domain.pl' --all-tables
```

### 4. Development

### 4.1 Installing plugins

- premium plugins in the `plugins` folder in the `.zip` archive
- all other plugins available in the WordPress plugin repository listed in the `plugins.txt` file or added in the `composer.json` file as
  **wpackagist** repository (https://wpackagist.org/)
    - for example **W3 Total Cache** https://pl.wordpress.org/plugins/w3-total-cache/
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

### 4.2 File structure

- **docker**
    - **config** (configuration files for nginx and php)
    - **volumes** (Wordpress files wp-content + wp-config.php)
    - **logs** (apache and nginx logs)
- **plugins** (premium plugins for WordPress)
- **src** (source files)
    - **styles** (style SCSS)
    - **scripts** (JS scripts)
- **theme** (wordpress template directory)
    - **controllers** (page template files)
    - **includes** (files containing additional template functionalities)
    - **styles** (minified style files)
    - **scripts** (minified JS script files)
    - **vendor** (additional libraries, installation from composer)
    - **views** (.twig view files)
