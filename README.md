# Mirablog

[![License](https://img.shields.io/github/license/sixtusagbo/mirablog)](LICENSE)
![GitHub repo size in bytes](https://img.shields.io/github/repo-size/sixtusagbo/mirablog)

![Screenshot](https://raw.githubusercontent.com/sixtusagbo/mirablog/main/screenshot.png)

## About Mirablog

Mirablog is a blog app built with Laravel 9.0

## Installation

```bash
git clone https://github.com/sixtusagbo/mirablog
```

#### Install composer dependencies

```bash
composer install
```

#### Handle env file

```bash
cp .env.example .env

php artisan key:generate

# Modify database config in env file
```

#### Run the database migrations

```bash
php artisan migrate
```

#### Create symlink to storage

```bash
php artisan storage:link
```

#### Run the app

```bash
php arisan serve
```

## Styles

#### Install npm packages

```bash
npm install
```

#### Compile with mix

```bash
npm run dev
```

## Contributing

-   Fork the repo ( https://github.com/sixtusagbo/mirablog/fork )
-   Create a branch for your new feature ( `git checkout -b my-new-feature` )
-   Commit your changes (`git commit -am 'Added some feature'`)
-   Push to the branch (`git push origin my-new-feature`)
-   Create a new [Pull Request](https://github.com/sixtusagbo/mirablog/pulls)

## License

MIT

## About the Author

Built with 💖 by Sixtus Miracle Agbo
