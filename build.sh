#!/bin/sh

composer install
#composer update

php dof test.framework

php dof compile.clear

php dof orm.sync

php dof test.service.status --fails --verbose

php dof test.storage.connection --fails --verbose

php dof test

php dof compile

# chmod -R 0777 var/
# chown -R www:www var/
