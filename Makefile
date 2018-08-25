#
# Makefile
#
#
#

###########################

# You need to edit these values.

GENERATOR_SCRIPT_PATH		=	generator/index.php
DICT_NAME		=	Emojipedia
DICT_SRC_PATH		=	Emoji.xml
CSS_PATH		=	Emoji.css
PLIST_PATH		=	Emoji.plist

DICT_BUILD_OPTS		=
# Suppress adding supplementary key.
# DICT_BUILD_OPTS		=	-s 0	# Suppress adding supplementary key.

###########################

# The DICT_BUILD_TOOL_DIR value is used also in "build_dict.sh" script.
# You need to set it when you invoke the script directly.

DICT_BUILD_TOOL_DIR	=	"/Applications/Additional Tools/Utilities/Dictionary Development Kit"
DICT_BUILD_TOOL_BIN	=	"$(DICT_BUILD_TOOL_DIR)/bin"

###########################

DICT_DEV_KIT_OBJ_DIR	=	./objects
export	DICT_DEV_KIT_OBJ_DIR

DICTIONARY_BUNDLE	=	$(DICT_DEV_KIT_OBJ_DIR)/$(DICT_NAME).dictionary
DESTINATION_FOLDER	=	~/Library/Dictionaries
RM			=	/bin/rm

###########################

all: build

generate:
	php $(GENERATOR_SCRIPT_PATH)

build: $(DICTIONARY_BUNDLE)

$(DICTIONARY_BUNDLE): $(DICT_SRC_PATH) $(CSS_PATH) $(PLIST_PATH)
	"$(DICT_BUILD_TOOL_BIN)/build_dict.sh" $(DICT_BUILD_OPTS) $(DICT_NAME) $(DICT_SRC_PATH) $(CSS_PATH) $(PLIST_PATH)
	@echo "Done."


install: build
	@echo "Installing into $(DESTINATION_FOLDER)".
	mkdir -p $(DESTINATION_FOLDER)
	ditto --noextattr --norsrc $(DICTIONARY_BUNDLE) $(DESTINATION_FOLDER)/$(DICT_NAME).dictionary
	touch $(DESTINATION_FOLDER)
	@echo "Done."
	@echo "To test the new dictionary, try Dictionary.app."

clean:
	$(RM) -r $(DICT_DEV_KIT_OBJ_DIR)/$(DICT_NAME).dictionary
	$(RM) -rf $(DICT_DEV_KIT_OBJ_DIR)

.PHONY: all build install clean
