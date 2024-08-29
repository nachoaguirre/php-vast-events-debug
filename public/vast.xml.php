<?php
include '../config.php';
header('Content-Type: application/xml; charset=utf-8');
header('Access-Control-Allow-Origin: ' . $playerHost);
header('Access-Control-Allow-Credentials: true');

$urlTrackingPrefix = sprintf('http://%s:%d/%s?', HOST, SERVER_DEBUG_PORT, SERVER_DEBUG_FILE);

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<VAST version="4.1" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns="http://www.iab.com/VAST">
  <Ad id="1" adType="video">
    <InLine>
      <AdSystem version="1">Debug</AdSystem>
      <AdTitle>Vast Linear</AdTitle>
      <Creatives>
        <Creative sequence="1" id="1">
          <UniversalAdId idRegistry="Ad-ID">1</UniversalAdId>
          <Linear>
            <Duration><?= $mediaFile['duration']; ?></Duration>
            <MediaFiles>
              <MediaFile id="1" delivery="progressive" type="video/mp4" width="<?= $mediaFile['width']; ?>" height="<?= $mediaFile['height']; ?>" scalable="1" maintainAspectRatio="1"><![CDATA[<?= $mediaFile['url']; ?>]]></MediaFile>
            </MediaFiles>
            <VideoClicks>
              <ClickThrough id="1"><![CDATA[<?= $urlDest; ?>]]></ClickThrough>
              <ClickTracking><![CDATA[<?= "{$urlTrackingPrefix}{$eventParams['clickTracking']}"; ?>]]></ClickTracking>
            </VideoClicks>
            <TrackingEvents>
              <?php foreach ($events as $event => $param): ?>
              <Tracking event="<?= $event; ?>"><![CDATA[<?= "{$urlTrackingPrefix}{$param}"; ?>]]></Tracking>
              <?php endforeach; ?>
            </TrackingEvents>
          </Linear>
        </Creative>
      </Creatives>
      <Extensions>
      </Extensions>
      <Impression id=""><![CDATA[<?= "{$urlTrackingPrefix}{$eventParams['impression']}"; ?>]]></Impression>
      <ViewableImpression id="">
        <Viewable><![CDATA[<?= "{$urlTrackingPrefix}{$eventParams['viewableImpression']}"; ?>]]></Viewable>
      </ViewableImpression>
    </InLine>
  </Ad>
</VAST>
