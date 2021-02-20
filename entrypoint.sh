# entrypoint.sh

#!/bin/bash
# Docker entrypoint script.

 echo "INSTALLING DEPENDENCIES"
php /usr/local/bin/composer install
 echo "FINISHING INSTALLING DEPENDENCIES"
 
 echo "STARTING SERVER"
 php-fpm
