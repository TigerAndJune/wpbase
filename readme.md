# Readme

This is our base install for WordPress development, based on Mark Jaquith's [WordPress Skeleton](https://github.com/markjaquith/WordPress-Skeleton).

## Basic files organization

- `/app/` will contain all the files needed for WP to work
- `/static/` will contain static html/css/js integration of the design mockups

## Download common dependencies

We use [Composer](https://getcomposer.org/) to manage third-party dependencies.

- Follow the official instructions to [install Composer](https://getcomposer.org/download/).
- Download the **wpbase** content to your local web server root folder (eg. htdocs or www).
- Open `/app/composer.json` in an editor and remove the unnecessary plugins.
- In a terminal window, navigate to the `/app` folder in the project (`cd My/Awesome/Project/app/`).
- Run `composer install` in the terminal. This will download all dependencies needed to run the project locally, including WordPress, a starter theme, and our base plugins.


## Install WordPress

WordPress will be installed in a subfolder `cms`. We use a separate configuration file per environment for database details and other overrides (these config files are ignored by Git).

- Start your MAMP/LAMP server and create a virtual host for the project with the format `projectname.test` or `projectname.demo`. Choose the `/public` folder as the Document Root.
- Create a database for the project.
- Duplicate `/app/public/config/sample-dev.json` or `/app/public/config/sample-prod.json` with an appropriate name for the desired environnment. These files are already in our `.gitignore` file so will never be versioned.
- Fill the new environnment file with your local database info and any other config overrides. 
- Open the virtual host in the browser to install WordPress. Use `admin` for local username and password.

## Set up a Git repository

Once the project is all set up, we can make our first commit! We use [Bitbucket](http://bitbucket.org) for all our private repositories, and [GitHub](http://github.com) for our open-source projects.

- Create a new local Git repository from your project folder (containing `/static` and `/app`).
- [Create a new remote repository](https://bitbucket.org/repo/create) on Bitbucket and copy the clone URL.
- Set the project remote to the clone URL (eg. `git remote add origin https://bitbucket.org/ownername/reponame`)
- Make your first commit and push to origin.

## Install third-party themes and plugins

You can install third-party themes and plugins however you like – but it's important to be able to track them in Git whenever possible.

To do this we need to add them to the `/app/composer.json` file. This file will be updated regularly and committed to the Git repository – the actual third-party files will never be committed, because they're automagically installed when we run `composer install`.

### Free themes and plugins from wordpress.org

Plugins and themes on the official WordPress.org directories are handled via [WordPress Packagist](http://wpackagist.org), so you can search for and install them via `composer search`. For example, `composer search wpackagist-theme/twenty` will list all themes on WordPress.org whose names start with `twenty` – you can then *require* one by typing `composer require nameofyourthing`. `composer.json` will be automatically updated to require this package, and you will need to commit it to Git so everyone else can easily install it too.

### Premium themes and plugins

Apparently some premium themes and plugins can be installed with composer too: we need to add extra repositories to the `composer.json` file for each theme or plugin we want to install, and add some extra information so Composer knows where to install the themes and plugins. See "Installing Premium Themes and Plugins" in [this article](https://deliciousbrains.com/using-composer-manage-wordpress-themes-plugins/) from Delicious Brains.
For everything else we'll just keep a list of them in a text file or something for other developers to install manually.

## Do cool work

### Static templates

The `/static` folder is where we work on the static html/css/js files that will be used to create a custom theme. We generally use either [Frontbase](https://github.com/TigerAndJune/frontbase) or [Cocktail Screwdriver](https://github.com/anthonygrignoux/cocktail-screwdriver) as our static boilerplate.
Having static template files outside of WordPress allows us to work quickly to resolve browser and device bugs, without the overhead of a full CMS.

### WordPress development

Given the structure of our project, we spend most of our WordPress development time in the `/app/public/content` folder. **Our plugins and themes should be prefixed `tnj_`** so they're easy to find and available to commit in Git. We generally use the static files and the [_s theme](http://underscores.me/) to create a custom theme.

### Deployment

As of december 2018 we use WPserveur for most of our WordPress projects.  
WPserveur does not provide any command line tools or git support, i.e. we cannot run composer online or use git to deploy our plugins (they are not versioned). So we will use FTP.

Currently, the whole `/app/public/`sub-folder can be deployed via FTP at the root of each of our online projects.

Once deployed, use the backend to install the plugins manually on the online environnment.



