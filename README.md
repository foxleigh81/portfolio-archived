# Strapforge v0.1.0

This is a website skeleton I have built to help me quickly and easily set up new website projects.

## How do I use it?

The easiest way to use Strapforge is to install it with Yeoman. If you already have it installed simple create a directory for your project and type:

```bash
  yo strapforge
```

If you don't have Yeoman, simply download this git repo and copy all of the files and folders from the /generator-strapforge/app/templates folder to the root of your project folder and then run the following terminal commands:

```bash
  npm install
```

```bash
  bower install
```

## What is in it

- A starting HTML file
  It's written entirely in HTML5, there is no bootstrap nonsense or anything,
  there are a few global classes but nothing extranious.
- A starting set of SASS files
  Including a reset, some pre-defined global styles and reusable classes. These are spread across several
  stylesheets and are concatenated into one 'core.css' file.
- A starting set of JS files
  A prod.js file and a dev.js file. 'Prod' is largely empty apart from setting up the 'core' object.
  'dev' has some handy debug tools which should not be included on production.
  Both files concatenate into one 'core.js' file.
- Set up files for Bower and Node.js
- a '.gitignore' file designed for use with sublime projects.
- a pre-set directory structure which is detailed below.

## The directory structure

    .
    ├── public
    │   └── app
    │       ├── index.html
    │   ├── lib
    │   └── static
    │       ├── css
    │       ├── fonts
    │       ├── images
    │       └── scripts
    ├── src
    │   ├── js
    │       ├── prod.js
    │       └── dev.js
    │   └── sass
    │       ├── _variables.scss
    │       ├── classes.scss
    │       ├── custom.scss
    │       ├── js.scss
    │       ├── print.scss
    │       ├── reset.scss
    │       ├── responsive.scss
    │       └── strapforge.scss
    ├── .bowerrc
    ├── .gitignore
    ├── gulpfile.js
    ├── LICENSE
    ├── package.json
    ├── bower.json
    └── README.md

  Additional directories and files will be generated after running 'npm install' and 'bower install'.
