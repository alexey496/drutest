#!/bin/sh
wget ftp://diler2:FGfhn@85.249.224.228/PRD.xls -O ~/apart/public_html/sites/default/files/migration/PRD.xls
cd ~/apart/public_html
/opt/php71/bin/php ~/apart/public_html/vendor/drush/drush/drush migrate:import commerce_variations --update