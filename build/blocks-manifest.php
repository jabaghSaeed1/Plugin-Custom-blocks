<?php
// This file is generated. Do not modify it manually.
return array(
	'clubs-ranking' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/clubs-ranking',
		'version' => '0.1.0',
		'title' => 'Clubs Ranking',
		'category' => 'widgets',
		'icon' => 'list-view',
		'description' => 'Live football standings table from API-Sports.',
		'attributes' => array(
			'leagueId' => array(
				'type' => 'string',
				'default' => '39'
			)
		),
		'supports' => array(
			'html' => false,
			'color' => array(
				'background' => true,
				'text' => true
			)
		),
		'textdomain' => 'clubs-ranking',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'editorial-search' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/editorial-search',
		'version' => '0.1.0',
		'title' => 'Editorial Search',
		'category' => 'widgets',
		'icon' => 'search',
		'description' => 'Sports news search with an overlay results dropdown.',
		'supports' => array(
			'html' => false,
			'align' => true
		),
		'textdomain' => 'custom-design-block',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'fan-boll' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/fan-poll',
		'version' => '0.1.0',
		'title' => 'Football Fan Poll',
		'category' => 'widgets',
		'icon' => 'chart-bar',
		'description' => 'Interactive fan poll for football matches.',
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'fan-poll',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js',
		'render' => 'file:./render.php'
	),
	'top-matches-schedule' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/top-matches-schedule',
		'version' => '0.1.0',
		'title' => 'Weekly Top Matches',
		'category' => 'widgets',
		'icon' => 'calendar-alt',
		'description' => 'Displays major football matches for the current week.',
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'editorScript' => 'file:./index.js',
		'viewScript' => 'file:./view.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'top-transfers' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/top-transfers',
		'version' => '0.1.0',
		'title' => 'Top 10 Recent Transfers',
		'category' => 'widgets',
		'icon' => 'random-alt',
		'description' => 'Displays the most recent high-profile player transfers.',
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	)
);
