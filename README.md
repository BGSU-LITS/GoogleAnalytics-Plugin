# Google Analytics Plugin for Omeka

This plugin depends on Omeka 2.0+.

## Installation

Download the plugin by visiting the [downloads]() page and selecting the most
current version of the plugin. Move those files over to the plugins directory
of your Omeka install.

After the files are moved over you will need to login to Omeka and activate
the plugin.

## Configuration

There is only 1 option to configure in this plugin and that is your Google Analytics
tracking ID. To find your tracking id you can follow the steps below.

* Log into [Google Analytics](http://www.google.com/analytics)
* Select your site
* Click on the Admin button in the upper right
* Click on the Tracking Info tab

## Hook

This plugin depends on the `public_footer` hook.

The following line of code will need to be in your theme somewhere
_(preferably in the footer.php file)._

``` php
<?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
```

-----

Developed by the [Bowling Green State University Libraries](http://www.bgsu.edu/colleges/library/index.html).
