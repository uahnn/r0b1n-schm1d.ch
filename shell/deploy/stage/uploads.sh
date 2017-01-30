#!/bin/bash

ssh mugetld@server54.cyon.ch "
    cd public_html/robinschmid.ch/web/app
    echo 'removing uploads folder...'
	rm -rf uploads
    echo 'done'
"

echo "deploy uploads on cyon server"
scp -r ./web/app/uploads mugetld@server54.cyon.ch:public_html/robinschmid.ch/web/app
echo "uploads deployment done"
