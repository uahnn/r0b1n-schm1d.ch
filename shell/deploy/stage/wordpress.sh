#!/bin/bash

echo "removing wordpress..."

ssh mugetld@s018.cyon.net "
    cd public_html/robinschmid.ch/web
    rm -rf wp
    echo 'done'
"
echo "deploy wordpress..."
scp -r ./web/wp mugetld@s018.cyon.net:public_html/robinschmid.ch/web
echo "wordpress deployment done"