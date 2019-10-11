# raspberry-clipboard

Micro app to put on your Raspberry PI in order to save a single message from web interface.

# Setup
1. Install and configure PHP & Apache.
2. Set up a new virtual hosts file under /etc/apache2/sites-available/.
3. Enter the following configuration:
```
<Directory /var/www/clipboard.local >
    AllowOverride All
</Directory>

<Directory /var/www/clipboard.local/pub >
  RewriteEngine On

  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</Directory>```
4. Access the web server by IP and save your message.

TODO:
1. Add push notification functionality.
