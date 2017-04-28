#!/bin/bash

echo "deploy on cyon server"

ssh mugetld@s018.cyon.net "
    echo 'update git'
    cd public_html/robinschmid.ch
	git pull
	git status
	git submodule sync
	git submodule update
	git submodule status
    echo 'done'
"
