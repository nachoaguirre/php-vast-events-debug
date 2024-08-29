# php-vast-events-debug
Debug VAST tracking events in local.

## Settings
Edit the `config.php` file to set the path to the XML file you want to debug.
| Variable | Description |
| --- | --- |
| `HOST` | The host of server and demo files |
| `SERVER_DEBUG_PORT` | The port which tracking events will be sent to |
| `SERVER_DEBUG_FILE` | The file which tracking events will be sent to |
| `DEMO_XML_PORT` | The port of the demo XML file will be served on |


## Serve local files (optional)
Run `make serve-public` to serve local files.
This will serve the XML file you should set into your player vast setting.

## Run the debug server
In other terminal run `make start-server` to run the debug server.
In this window you can see the debug information.

## Other info
Run `make help` to see all available commands.
