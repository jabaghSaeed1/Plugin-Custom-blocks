=== Football News Portal & Automation Plugin ===
Contributors: Jabagh
Tags: football, news-api, automation, blocks, search
Requires at least: 6.0
Tested up to: 6.4
Stable tag: 1.0.0
License: GPLv2 or later

== Description ==

This plugin is a high-performance football news aggregator and display system. It automates the fetching of global sports news via the NewsAPI and provides custom Gutenberg blocks for a modern, interactive user experience.

== Project Summary & Key Features ==

We have built a complete pipeline from data fetching to frontend display. Key milestones completed:

1. MANUAL SYNC ENGINE
A dedicated admin trigger allows the site owner to fetch the latest 10 football articles on demand.
* Features a "User-Agent" fix to comply with API security requirements.
* Implements a duplicate check to prevent re-posting existing news.
* Automatically cleans titles by removing synchronization timestamps.

2. SMART CATEGORIZATION & TAGGING
The system "reads" the content and assigns it to the correct WordPress taxonomy.
* Categorizes posts into 'Premier League', 'La Liga', and 'Recent News' based on keywords.
* Automatically assigns a 'Today' tag to all fresh syncs.

3. DUAL-SOURCE IMAGE SYSTEM
Since synced news uses external URLs, we built a hybrid thumbnail system.
* PHP Filters: Injects external images into Query Loops and Post Featured Image blocks.
* API Integration: Exposes 'external_image_url' to the WordPress REST API for use in JavaScript blocks.

4. CUSTOM "MORPHING" SEARCH BLOCK
A custom Gutenberg block built with @wordpress/create-block.
* Features a morphing UI that expands on click.
* Live-search functionality that fetches results via the REST API.
* Custom 'view.js' logic to handle both local featured images and synced external images.

== Technical Implementation Details ==

* Source Code (src/): Contains the human-readable React/JS code for the block.
* Build Code (build/): Contains the compiled, minified production assets required by WordPress.
* REST API: Uses 'rest_prepare_post' to ensure metadata is accessible to the frontend search.

== Installation ==

1. Upload the plugin folder to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Ensure you have your NewsAPI key configured in the sync function.
4. Click "⚽ SYNC 10 LATEST POSTS" in the admin bar to populate your site.

== Development Notes ==

To modify the custom search block:
1. Navigate to the plugin directory.
2. Run `npm install` to load dependencies.
3. Run `npm start` for development or `npm run build` for production.