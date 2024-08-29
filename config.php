<?php
const HOST = 'localhost';
const SERVER_DEBUG_PORT = 8030;
const SERVER_DEBUG_FILE = 'server.php';
const USE_DEMO_XML = true;
const DEMO_XML_PORT = 8031;

// -----------------------------------------
// Customize the following settings only if you want to use our vast.xml file

// The host where the player is running, to prevent CORS issues
$playerHost = 'http://localhost:8000';

// URL to open when the user clicks on the ad
$urlDest = "https://github.com";

// Ad media file
$mediaFile = [
  'url' => sprintf('http://%s:%d/videoad.mp4', HOST, DEMO_XML_PORT), // Use demo video file or your own URL
  'duration' => '00:00:15',
  'width' => '854',
  'height' => '480',
];

$eventParams = [
  'clickTracking'      => 'clickTracking',
  'impression'         => 'impression',
  'viewableImpression' => 'viewableImpression',
];

// Tracked events and their corresponding param to display in the debug
// https://www.iab.com/wp-content/uploads/2016/04/VAST4.0_Updated_April_2016.pdf
$events = [
  // Player Operation Metrics (for use in Linear and NonLinear ads)
  "mute"                   => "mute",                   // Fired when the ad is muted by the user.
  "unmute"                 => "unmute",                 // Fired when the ad is unmuted after being muted.
  "pause"                  => "pause",                  // Fired when the ad is paused.
  "resume"                 => "resume",                 // Fired when the ad is resumed after being paused.
  "rewind"                 => "rewind",                 // Fired when the ad is rewound.
  "skip"                   => "skip",                   // Fired when the ad is skipped by the user after they are allowed to skip it.
  "playerExpand"           => "playerExpand",           // Fired when the ad is expanded.
  "playerCollapse"         => "playerCollapse",         // Fired when the ad is collapsed.

  // Linear Ad metrics
  "start"                  => "start",                  // Fired when the user starts the video ad.
  "firstQuartile"          => "firstQuartile",          // Fired when the ad reaches 25% of its total duration.
  "midpoint"               => "midpoint",               // Fired when the ad reaches 50% of its total duration.
  "thirdQuartile"          => "thirdQuartile",          // Fired when the ad reaches 75% of its total duration.
  "complete"               => "complete",               // Fired when the ad has been played until the end.
  "acceptInvitationLinear" => "acceptInvitationLinear", // Fired when the user activated a control that launched an additional portion of the linear creative.
  "otherAdInteraction"     => "otherAdInteraction",     // An optional metric that can capture all other user interactions under one metric such a s hover-overs, or custom clicks

  // NonLinear Ad metrics
  "creativeView"           => "creativeView",           // Fired when the creative impression is viewed.
  "acceptInvitation"       => "acceptInvitation",       // Fired when the user interacts with the ad to expand it or engage in more complex interactivity.
  "adExpand"               => "adExpand",               // Fired when the user activated a control to expand the creative.
  "adCollapse"             => "adCollapse",             // Fired when the user activated a control to reduce the creative to its original dimensions.
  "minimize"               => "minimize",               // Fired when the user clicked or otherwise activated a control used to minimize the ad to a size smaller than a collapsed ad but without fully dispatching the ad from the player environment.
  "close"                  => "close",                  // Fired when the ad is closed by the user.
];
