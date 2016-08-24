# Emojipedia
Mac OS X Dictionary containing Emoji and their meanings

## Installing the dictionary

### Manually
- Download [Emojipedia.dictionary.zip](https://github.com/gingerbeardman/Emojipedia/releases/download/20160808/Emojipedia.dictionary.zip) and unzip it
- Copy `Emojipedia.dictionary` to `~/Library/Dictionaries`

### Using Helper
- Install using homebrew caskroom `brew cask install emojipedia`

## Configuration
1. Launch Dictionary.app
2. In Dictionary > Preferences, scroll to the bottom of the list and check the *Emojipedia* dictionary to enable it
3. Optional: drag the *Emojipedia* dictionary entry to change the order of dictionaries

---

## Using the dictionary

Try looking up the meaning of these emoji as a test: 😍 🔰 💮 💩

* Right-click on the emoji and choose the _Look Up_ menu item  
  (on a track pad you can also use a Three Finger Tap or Force Click)
* Press Cmd+Ctrl+D whilst pointing the mouse cursor at the emoji to display a popup
* Launch Dictionary and type the emoji into the search field

## Screenshots

Contextual menu Look Up  
![Dictionary lookup](https://github.com/gingerbeardman/Emojipedia/blob/master/screenshot_dictionary_lookup.png)

Dicationary Popup  
![Dictionary popup](https://github.com/gingerbeardman/Emojipedia/blob/master/screenshot_dictionary_popup.png)

Dictionary.app  
![Dictionary.app](https://github.com/gingerbeardman/Emojipedia/blob/master/screenshot_dictionary_app.png)

---

## Status
Number of Emoji included: 1791

Features: 
* Emoji display
* Descriptive name
* Hyperlinked keywords
* Link to read more at [Emojipedia](http://emojipedia.org)

## Todo
* Add long descriptions and other data provided by [Emojipedia](http://emojipedia.org)
* Add translations
* Add language toggle

---

## Editing the dictionary

The following steps are only required if you wish to modify the dictonary. 

Feel free to send Pull Requests for items on the todo list!

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
4. [Emojipedia](http://emojipedia.org), Emojipedia Pty Ltd
