#!/bin/bash
#rm -rf objects
osascript -e 'quit app "Dictionary"'
make clean
make
make install
open /Applications/Dictionary.app
