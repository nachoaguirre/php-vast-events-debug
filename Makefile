# Makefile for PHP VAST EVENTS DEBUG
# Author: Ignacio Aguirre
# Repository: https://github.com/nachoaguirre/php-vast-events-debug
# -----------------------------------------------------------------------

.DEFAULT_GOAL := help
VERSION := $(shell git show -s --format=%h)
HOST := $(shell grep 'const HOST' config.php | cut -d '=' -f2 | tr -d ' ;' | sed 's/['\''"]//g')
SERVER_DEBUG_PORT := $(shell grep 'const SERVER_DEBUG_PORT' config.php | cut -d '=' -f2 | tr -d ' ;')
SERVER_DEBUG_FILE := $(shell grep 'const SERVER_DEBUG_FILE' config.php | cut -d '=' -f2 | tr -d ' ;' | sed 's/['\''"]//g')
DEMO_XML_PORT := $(shell grep 'const DEMO_XML_PORT' config.php | cut -d '=' -f2 | tr -d ' ;')
USE_DEMO_XML := $(shell grep 'const USE_DEMO_XML\s*=' config.php | cut -d '=' -f2 | tr -d " ;" | sed "s/['\"]//g" | sed 's/true/1/' | sed 's/false/0/')
URL_DEST := $(shell grep '$$urlDest' config.php | cut -d '=' -f2 | tr -d " ;" | sed "s/'//g" | sed 's/"//g')

help: # Display the application manual
	@echo "$$(tput bold)PHP VAST EVENTS DEBUG$$(tput sgr0) version $$(tput setaf 3)$(VERSION)$$(tput sgr0)\n"
	@echo "$$(tput bold)$$(tput setaf 7)USAGE$$(tput sgr0)"
	@echo " $$(tput smul)make$$(tput rmul) <command> [<arg1>] ... [<argN>]\n"
	@echo "$$(tput bold)$$(tput setaf 7)AVAILABLE COMMANDS$$(tput sgr0)"
	@grep -E '^[a-zA-Z_-]+:.*?# .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?# "}; {printf " %s%-20s%s %s\n", "'$$(tput setaf 2)'", $$1, "'$$(tput sgr0)'", $$2}'

	@echo "\n$$(tput bold)Want to use the demo XML file?$$(tput sgr0)"
	@echo " First serve the public directory with make serve-public"
	@echo " Then add the demo VAST.xml file URL to your player VAST config:"
	@echo " $$(tput smul)http://$(HOST):$(DEMO_XML_PORT)/vast.xml.php$$(tput rmul)"

	@echo "\n$$(tput bold)Do you want to use your own vast.xml file?$$(tput sgr0)"
	@echo " Update your vast.xml file setting the track events URL:"
	@echo " $$(tput smul)http://$(HOST):$(SERVER_DEBUG_PORT)/$(SERVER_DEBUG_FILE)?your-event-name$$(tput rmul)"

serve-public: # Serve the public directory with demo XML and video
	php -S $(HOST):$(DEMO_XML_PORT) -t public

start-server: # Start the debug server
	php $(SERVER_DEBUG_FILE)

get-demo-xml-url: # Get the demo VAST XML URL
	@echo "If you want to use the demo XML..."
	@echo "Add the following URL to your player VAST config:"
	@echo " $$(tput smul)http://$(HOST):$(DEMO_XML_PORT)/vast.xml.php$$(tput rmul)"
	@echo "Remember to serve the public directory first with 'make serve-public'"

get-tracking-url: # Get the tracking url for your events
	@echo "If you want to use your own vast.xml file..."
	@echo "Use the following URL prefix to track your events:"
	@echo " $$(tput smul)http://$(HOST):$(SERVER_DEBUG_PORT)/$(SERVER_DEBUG_FILE)?your-event-name$$(tput rmul)"
	@echo "Add this URL into your vast.xml events changing the event name."
