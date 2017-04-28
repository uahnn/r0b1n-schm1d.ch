#!/bin/bash

ssh mugetld@s018.cyon.net "
    cd public_html/robinschmid.ch
    echo 'removing vendor folder...'
	rm -rf vendor
    echo 'removing app/plugins folder...'
	rm -rf web/app/plugins
    echo 'done'
"

echo "deploy composer dependencies on cyon server"
echo "deploy vendor folder..."
scp -r ./vendor mugetld@s018.cyon.net:public_html/robinschmid.ch
echo "vendor deployment done"
echo "deploy wordpress plugins"
scp -r ./web/app/plugins mugetld@s018.cyon.net:public_html/robinschmid.ch/web/app
echo "wordpress plugins deployment done"
