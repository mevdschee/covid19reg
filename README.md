# COVID-19 attendance registration

This is a simple COVID-19 attendance registration tool that can be used at any venue, like sports clubs, churches, restaurants, bars, etc. The tool has multiple themes (color sets) and contains multiple languages.

## Why should I use this tool?

This tool registers attendees at your venue and is the digital equivalent of paper registration ballots that you can hand-out and collect in a closed box. If somebody happens to get COVID-19 and this person was at your venue, this tool will help you contact the people that might have been exposed.

## How about privacy?

In short: the tool stores the answers (email address or phone number) in a file on the server. This file is automatically overwritten after a month. It is designed in a way that only the system administrator has access to this data.

## Dependencies

The tool requires PHP 7. The QR-code is generated by: https://github.com/kazuhikoarase/qrcode-generator.

## Great! How do I start?

1. Download the ZIP: https://github.com/mevdschee/covid19reg/archive/master.zip
1. Unpack the ZIP to a local folder.
1. Upload the folder to your server, using (S)FTP.
1. Edit the config.json file.

## Configuration

In the config.json you can set on of the following themes:

- tikkie-style
- ...  (see themes directory)

You can also choose on of the following languages:

- English (en)
- Nederlands (nl)
- ... (please translate and send a pull request)

