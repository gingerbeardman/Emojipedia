# Emojipedia
Mac OS X Dictionary containing Emoji and their meanings

## Installing the dictionary
1. Download [latest release](https://github.com/gingerbeardman/Emojipedia/releases/download/1.0/Emojipedia.dictionary.zip)
2. Copy `Emoji.dictionary` to `~/Library/Dictionaries` (or `/Library/Dictionaries` to install it for all Users)
3. Launch Dictionary.app
4. In Dictionary > Preferences, scroll to the bottom of the list and activate the *Emojipedia* dictionary)
(5. Oprtional: drag the *Emojipedia* dictionary to a place of your choice in the list of dictionaries

### Status
Number of Emoji: 1791  
Features: descriptive name, hyperlinked keywords, link to read more at [Emojipedia](http://emojipedia.org)

## Editing the dictionary

### Requirements

[Auxiliary Tools for Xcode 7](http://adcdownload.apple.com/Developer_Tools/Auxiliary_Tools_for_Xcode_7/Auxiliary_Tools_for_Xcode_7.dmg) (contains the Dictionary Development Kit)

### Building

1. Copy contents of `Auxiliary_Tools_for_Xcode_7.dmg` to `/Applications/Auxiliary Tools/`
2. Download this project and unzip
3. Open Terminal and cd to project directory
4. Run `build.sh` (this will build and install the dictionary)
5. In Dictionary > Preferences, scroll to the bottom of the list and activate the *Emojipedia* dictionary (only required once)

## Screenshots

Dictionary.app  
![Dictionary.app](https://github.com/gingerbeardman/Emojipedia/blob/master/screenshot_dictionary_app.png)

Dicationary Lookup (Cmd+Ctrl+D)  
![Dictionary lookup](https://github.com/gingerbeardman/Emojipedia/blob/master/screenshot_dictionary_lookup.png)

### Todo
* Add long descriptions and other data provided by [Emojipedia](http://emojipedia.org)
* Add international versions with dictionary language toggle

#### References
1. [Dictionary Services Programming Guide](https://developer.apple.com/library/mac/documentation/UserExperience/Conceptual/DictionaryServicesProgGuide/Introduction/Introduction.html#//apple_ref/doc/uid/TP40006152-CH1-SW1), Apple
2. [Create Custom Dictionaries For Mac OSX](http://blog.nagpals.com/mac-dictionaries/), Indiver Nagpal
3. [Emojipedia](http://emojipedia.org)
