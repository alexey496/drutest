#!/bin/sh
wget ftp://diler2:FGfhn@85.249.224.228/PRD.xls -O ~/apart/public_html/sites/default/files/migration/PRD.xls
cd ~/apart/public_html
/usr/local/bin/drush_launcher.phar migrate:import commerce_variations --update