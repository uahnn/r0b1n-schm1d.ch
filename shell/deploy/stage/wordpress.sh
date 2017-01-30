#!/bin/bash

echo "removing wordpress..."

ssh mugetld@server54.cyon.ch "
    cd public_html/robinschmid.ch/web
    rm -rf wp
    echo 'done'
"
echo "deploy wordpress..."
scp -r ./web/wp mugetld@server54.cyon.ch:public_html/robinschmid.ch/web
echo "wordpress deployment done"