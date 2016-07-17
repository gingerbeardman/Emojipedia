# Emojipedia
Mac OS X Dictionary containing Emoji and their meanings

## Installing the dictionary
1. Download [Emojipedia.dictionary.zip](https://github.com/gingerbeardman/Emojipedia/releases/download/20160717/Emojipedia.dictionary.zip) and unzip it
2. Copy `Emoji.dictionary` to `~/Library/Dictionaries`
3. Launch Dictionary.app
4. In Dictionary > Preferences, scroll to the bottom of the list and activate the *Emojipedia* dictionary)
(5. Optional: drag the *Emojipedia* dictionary to a place of your choice in the list of dictionaries

### Status
Number of Emoji: 1791

Features: 
* Emoji display
* Descriptive name
* Hyperlinked keywords
* Link to read more at [Emojipedia](http://emojipedia.org)

---

## Screenshots

Dicationary Lookup (press Cmd+Ctrl+D whilst pointing the mouse cursor at the emoji/word you want to lookup)  
![Dictionary lookup](https://github.com/gingerbeardman/Emojipedia/blob/master/screenshot_dictionary_lookup.png)

Dictionary.app  
![Dictionary.app](https://github.com/gingerbeardman/Emojipedia/blob/master/screenshot_dictionary_app.png)

### Todo
* Add long descriptions and other data provided by [Emojipedia](http://emojipedia.org)
* Add international versions with language toggle

---

## Editing the dictionary

The following steps are only required if you wish to modify the dictonary. Feel free to send Pull Requests for items on the todo list!

### Requirements

[Auxiliary Tools for Xcode 7](http://adcdownload.apple.com/Developer_Tools/Auxiliary_Tools_for_Xcode_7/Auxiliary_Tools_for_Xcode_7.dmg) (contains the Dictionary Development Kit)

### Building

1. Copy contents of `Auxiliary_Tools_for_Xcode_7.dmg` to `/Applications/Auxiliary Tools/`
2. Download this project and unzip
3. Open Terminal and cd to project directory
4. Run `build.sh` (this will build and install the dictionary)
5. In Dictionary > Preferences, scroll to the bottom of the list and activate the *Emojipedia* dictionary (only required once)

#### References
1. [Dictionary Services Programming Guide](https://developer.apple.com/library/mac/documentation/UserExperience/Conceptual/DictionaryServicesProgGuide/Introduction/Introduction.html#//apple_ref/doc/uid/TP40006152-CH1-SW1), Apple
2. [Create Custom Dictionaries For Mac OSX](http://blog.nagpals.com/mac-dictionaries/), Indiver Nagpal
3. [Emoji Data](http://unicode.org/emoji/charts/emoji-list.html), Unicode, Inc.
4. [Emojipedia](http://emojipedia.org)
