#!/bin/bash

rm -f ./_docs
rm -f ./.git
rm .gitignore
rm Readme.md

mv /config/config.samlpe.php /config/config.php
mv /config/auth.samlpe.php /config/auth.php