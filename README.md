# Statamic Flash Messages

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

## Installation

Download or clone the repository, rename the folder to `Flash` then copy the folder to your site's `Addons` directory.


## Usage

This package provides several tags to use in your markup to both set and display flash messages. The messages themselves are stored using Laravel's flash data, which persists until the next request for that session. Of the tags provided, `{{ flash:is_set }}` is the only tag pair.


### Setting flash data

#### flash:set

Example: `{{ flash:set key="msg" message="This is a flash message" }}`

The `{{ flash:set }}` tag is used on the page where you want to set the content of the message. Flash items are saved in a key/value pair, and then retrieved using the same key as when they were set. The `key` parameter is optional, with the default being "message".



#### flash:redirect

Example: `{{ flash:redirect key="msg" message="This is a flash message" to="/login" }}`

The `{{ flash:redirect }}` tag is identical to the `{{ flash:set }}` tag, but also adds in the functionality of the native statamic `{{ redirect }}` tag, since these features are often used together.

### Retrieving and displaying

#### flash

Example: `{{ flash key="msg" }}`

The `{{ flash }}` tag will retrieve the item with the given key, if it exists. If no key is specified, it would default to "message", and be equivalent to `{{ flash key="message" }}`

#### flash:is_set

Example: `{{ flash:is_set key="msg" }} {{ /flash:is_set }}`

The `{{ flash:is_set }}` tag pair will conditionally show the contents between them if flash data with the given key has a non-zero length. 


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.