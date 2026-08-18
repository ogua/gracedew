<?php
/**
 * Copy this file to config.local.php (same folder) and fill in the real
 * value. config.local.php holds a secret and must never be committed to
 * version control or shared publicly.
 */

// Must match WEBSITE_API_TOKEN in oguaschoolz's .env.
define('GD_API_TOKEN', 'paste-the-real-token-here');

// Uncomment to point at a local oguaschoolz dev server instead of production
// while developing (must be defined before db.php runs, which this is).
// Local oguaschoolz runs on :7000; production has no port — don't change
// db.php's default to match local, override it here instead.
// define('GD_API_BASE', 'http://oguaschool.com:7000/api/v1/public');
