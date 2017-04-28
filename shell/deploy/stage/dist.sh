#!/bin/bash

ssh mugetld@s018.cyon.net "
    cd public_html/robinschmid.ch
    echo 'removing dist folder...'
	rm -rf web/app/themes/sage/dist
    echo 'done'
"

echo "deploy dist folder on cyon server"
scp -r ./web/app/themes/sage/dist mugetld@s018.cyon.net:public_html/robinschmid.ch/web/app/themes/sage
echo "dist folder deployment done"
