#!/bin/bash

ssh mugetld@s018.cyon.net "
    cd public_html/robinschmid.ch/web/app
    echo 'removing uploads folder...'
	rm -rf uploads
    echo 'done'
"

echo "deploy uploads on cyon server"
scp -r ./web/app/uploads mugetld@s018.cyon.net:public_html/robinschmid.ch/web/app
echo "uploads deployment done"
