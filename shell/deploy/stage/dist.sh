#!/bin/bash

ssh mugetld@server54.cyon.ch "
    cd public_html/robinschmid.ch
    echo 'removing dist folder...'
	rm -rf web/app/themes/robinschmid/dist
    echo 'done'
"

echo "deploy dist folder on cyon server"
scp -r ./web/app/themes/robinschmid/dist mugetld@server54.cyon.ch:public_html/robinschmid.ch/web/app/themes/robinschmid
echo "dist folder deployment done"
