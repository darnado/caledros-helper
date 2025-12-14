=== Caledros Helper ===

Contributors: @darnado
Tags: disable patterns, disable rest api
Requires at least: 6.8
Tested up to: 6.9
Stable tag: 1.0.0
Requires PHP: 8.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Adds an Admin Menu that allows removing the default block patterns. It also allows deactivating the WordPress REST API for non-authenticated users.

== Description ==

This plugin creates a custom Admin Menu with two checkboxes:

* The first checkbox allows the user to remove the core block patterns from the Gutenberg editor. This feature can be activated or deactivated.

* The second checkbox allows the user to deactivate the WordPress REST API for non-authenticated users. This feature can be activated or deactivated.

After plugin activation, both options will be disabled by default.

== Frequently Asked Questions ==

= Can I deactivate the plugin features? =
Yes, both features can be easily deactivated from the custom Admin Menu added by the plugin.

= If I remove the default block patterns, are they gone forever? =
No. The plugin only disables theme support for the core block patterns while the option is active. If you turn off the option, the default block patterns will reappear.

= If I deactivate the REST API, is it gone forever? =
No. The REST API is only disabled while the checkbox is enabled. If you uncheck the option, the REST API will be re-enabled.

== Screenshots ==
1. Plugin Admin Menu containing both options.

== Changelog ==

= 1.0.0 =
* Added two options. One for removing the default block patterns and one for deactivating the WordPress REST API.

== Upgrade Notice ==
= 1.0.0 =
First version of the plugin. Adds an Admin Menu with options for removing the default block patterns and for deactivating the WordPress REST API.

== Installation ==

You have two easy ways to install the Caledros Helper plugin:

**Option 1: From Your WordPress Dashboard**

**1\.** Go to your WordPress admin area.

**2\.** Navigate to Plugins &#8594; Add Plugin.

**3\.** In the Search Plugins box, type "Caledros Helper".

**4\.** Click Install Now, then Activate.

**Option 2: Manual Installation**

**1\.** Download the plugin ZIP file from WordPress.org.

**2\.** In your WordPress admin area, go to Plugins &#8594; Add Plugin &#8594; Upload Plugin.

**3\.** Choose the ZIP file you downloaded and click Install Now.

**4\.** Activate the plugin after installation.