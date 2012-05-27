Enhanced Friendly Time plugin for Elgg 1.8
Latest Version: 1.8.2
Released: 2012-05-27
Contact: iionly@gmx.de
License: GNU General Public License version 2
Copyright: (c) Ademola 'PHPlord' Morebise (Original developer) / iionly (for Elgg 1.8)


Instead of the default Elgg behaviour of displaying the date of older posts as 'XX days ago' this plugin will show the posting date in 'date month year' format'. For entries younger than two weeks it will show the date in several step from 'just now' to 'last week' until 'about 2 weeks ago'.

I've included the months' names in the language file to allow for internationalization. If you want the names of the months showing in your preferred language, you can easily create the appropriate languge file on your own.



Installation:

1. copy the friendly_time folder into the mod folder of your site. In case you had version 1.8.0 of the plugin already installed, please remove the plugin's folder in your mod folder first before copying the new version on your server. Otherwise the modified core views that were previously included to be overriden will still get overridden.

2. enable the plugin in the admin section of your site.



Changlog:

1.8.2:

* French translation added (thank to emanwebdev).

1.8.1:

* Using plugin hook friendly:time (overriding of core views is no longer necessary and all plugin views could be removed). Thanks Matt Beckett for pointing out the existence of this plugin hook in Elgg core.
(In case you have version 1.8.0 already installed, please remove the plugin's folder in your mod folder first before copying the new version on your server. Otherwise the modified core views that were previously included to be overriden will still get overridden.)

1.8.0 (Initial release for Elgg 1.8 by iionly):

* Upgraded manifest file for Elgg 1.8,

* Month names are included in language file to allow for internationalization,

* The river/elements/body view is only necessary due to little "bug" in the Elgg core view (elgg_get_friendly_time() is used instead of elgg_view_friendly_time() which prevents overriding the time tag). In case the core view gets corrected at some time (maybe Elgg 1.8.5) it should no longer be necessary to override the core view (2012/5/26 edit: this has indeed been fixed in Elgg 1.8.5).
