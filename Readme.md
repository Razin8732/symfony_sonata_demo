# Project Setup 
### Clone Reposetory
- `git clone https://github.com/RazinTeqB/symfony_sonata_demo.git`
- `cd symfony_sonata_demo`
### Install composer package
- `Composer install`

### Update the database connection in .env file
- `Ex: DATABASE_URL="mysql://root:1234@127.0.0.1:3306/sym_sonata_demo?serverVersion=5.7&charset=utf8mb4"`

### Run the database migration
- `php bin/console doctrine:schema:update --force`

### Start symfony server
- `symfony server:start -d` or `php bin/console server:run`

### Install node packages
- `sudo yarn install`

### Build the frontend
- `sudo yarn dev`
