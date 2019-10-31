## How to set up the project

After cloning this project, you need to create a database, a user, the privileges, and so on : this is outside the scope of this documentation.

Composer (https://getcomposer.org) is needed.

# Install dependencies with composer

```bash
composer install
```

# Configure the application to connect the database

Modify the file `app.php` in the config directory.

# Migrate the base, and seed it

```bash
bin/cake migrations migrate
bin/cake migrations seed --seed CustomersSeed
bin/cake migrations seed --seed InvoicesSeed
```

Now the project is ready; the default page displays the list of customers.