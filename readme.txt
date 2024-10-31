=== Plugin Name ===
Contributors: Rajmahendran P
Donate link: 
Tags: news, updates, recent event, simple news list, Event Short code, Blog list, 
Requires at least: 3.0.1
Tested up to: 3.4.2
Stable tag: trunk
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This Plugin used to Post and display the News or Recent Information list.

== Description ==

This Plugin used to Post and display the News or Recent Information list. Admin have option to upload the News or Recent Information and we can display the news or Recent Information in user side using short code.

After Installed and activated the plugin, we can see the admin menu called "Recent Updates". We can upload the information here. Using short code called [recent_news_updates] we can list the posted information in user side.

Short codes:
[recent_news_updates] = Use this short code for list the recent Updates. Default count for the list page is 10.

[recent_news_updates count=X] = use count value with in the short code to control the list page default count. Replace the 'X' with your count with in the short code.

[recent_news_updates cat=slug1,slug2] = Use this code for display the particular categories "Recent Updates". Replace the slug1 & slug2 with your own categories slug. 

Eg Code : [recent_news_updates count=1 cat=run,stop] = run, stop is the categories slug.

Featured Image:
If you added the Featured Image for "Recent Updates", it will display in the list page below the title and date.

In the news list page default character count is 140.
Note: 140 is nearest to the 140 character. Due to round the sentence we displayed the end word as full word. 
	 
== Installation ==
1. Download and Unzip the folder.
2. Upload `recent-news-updates` to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress


== Frequently Asked Questions ==

= How to display the posted information in user side? =

Copy and past the shortcode called [recent_news_updates].



== Changelog ==

= 1.0 =
* New version


= 1.1 =
* Included the featured image option.
* list page change.
* Added the detail page template.
* Added the categories filter in short code.