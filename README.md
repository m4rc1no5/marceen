# marceen.pl
Website

Documentation
=============

Table of contents
-----------------

1. [Setting up permissions](#permission)

<a name="permission"></a>
Setting up permissions
----------------------

One common issue when installing Symfony is that the app/cache and app/logs directories must be writable both by the web server and the command line user. On a UNIX system, if your web server user is different from your command line user, you can try one of the following solutions.

### Use the same user for the CLI and the web server

In development environments, it is a common practice to use the same UNIX user for the CLI and the web server because it avoids any of these permissions issues when setting up new projects. This can be done by editing your web server configuration (e.g. commonly httpd.conf or apache2.conf for Apache) and setting its user to be the same as your CLI user (e.g. for Apache, update the User and Group values).

### Using ACL on a system that supports chmod +a

Many systems allow you to use the chmod +a command. Try this first, and if you get an error - try the next method. This uses a command to try to determine your web server user and set it as HTTPDUSER:

```bash
    rm -rf app/cache/*
    rm -rf app/logs/*

    HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
    sudo chmod +a "$HTTPDUSER allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
    sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
```

### Using ACL on a system that does not support chmod +a

Some systems don't support chmod +a, but do support another utility called setfacl. You may need to enable ACL support on your partition and install setfacl before using it (as is the case with Ubuntu). This uses a command to try to determine your web server user and set it as HTTPDUSER:

```bash
    HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
    sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
    sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
```

If this doesn't work, try adding -n option.

### Without using ACL

If none of the previous methods work for you, change the umask so that the cache and log directories will be group-writable or world-writable (depending if the web server user and the command line user are in the same group or not). To achieve this, put the following line at the beginning of the app/console, web/app.php and web/app_dev.php files:

```bash
    umask(0002); // This will let the permissions be 0775

    // or

    umask(0000); // This will let the permissions be 0777
```

Note that using the ACL is recommended when you have access to them on your server because changing the umask is not thread-safe.
