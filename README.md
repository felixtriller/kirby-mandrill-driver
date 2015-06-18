# Mandrill mail driver for Kirby

[![Release](https://img.shields.io/github/release/felixtriller/kirby-mandrill-driver.svg)](https://github.com/felixtriller/kirby-mandrill-driver/releases)  [![Issues](https://img.shields.io/github/issues/felixtriller/kirby-mandrill-driver.svg)](https://github.com/felixtriller/kirby-mandrill-driver/issues) [![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/felixtriller/kirby-mandrill-driver/master/LICENSE)

The missing mail driver for the awesome [Kirby](http://getkirby.com/) CMS by Bastian Allgeier.

## Installation

### Copy & Pasting

If not already existing, add a new `fields` folder to your `site` directory. Then copy or link this repositories whole content in a new `selector` folder there. Afterwards, your directory structure should look like this:

```
site/
    plugins/
        kirby-mandrill-driver/
            kirby-mandrill-driver.php
```

### Git Submodule

If you are an advanced user and know your way around Git and you already use Git to manage you project, you can make updating this field extension to newer releases a breeze by adding it as a Git submodule.

```bash
$ cd your/project/root
$ git submodule add https://github.com/felixtriller/kirby-mandrill-driver.git site/plugins/kirby-mandrill-driver
```

Updating all your Git submodules (eg. the Kirby core modules and any extensions added as submodules) to their latest version, all you need to do is to run these two Git commands.

```bash
$ cd your/project/root
$ git submodule update --remote site/plugins/kirby-mandrill-driver
$ git commit -am 'Updating Mandrill driver.'
```

## Usage

```php
$email = new Email(array(
    'to'      => 'to@example.com',
    'from'    => 'from@example.com',
    'subject' => 'Yay, Kirby sends mails',
    'body'    => 'Hey, this is a test email!',
    'service' => 'mandrill',
    'options' => array(
        'key' => 'YOUR-MANDRILL-API-KEY'
    )
));

if ($email->send()) {
    echo 'The email has been sent via Mandrill';
} else {
    echo $email->error()->message();
}
```

See the Kirby [docs](http://getkirby.com/docs/toolkit/sending-email) for further details.
