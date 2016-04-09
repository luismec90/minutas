<?php

echo shell_exec('cd /var/www/minutas; git fetch --all; git reset --hard origin/master;');