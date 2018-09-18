<?php
/**
This Example shows how to campaignCreate using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$type = 'absplit';

$options = array(
	'list_id' => $listId,
	'subject' => 'Test Newsletter Subject',
	'from_email' => 'example@example.org',
	'from_name' => 'DEMO, Inc.',
	'tracking' => array(
		'opens' => true,
		'html_clicks' => true,
		'text_clicks' => false
	),
	'analytics' => array(
		'google' => 'my_google_analytics_key'
	),
	'title' => 'Test Newsletter Title',
	'generate_text' => true,
);

$content = array(
	//'template_id' => 'template_id',
	'html' => 'some pretty html content #[UNSUB]# message
<table align="center" border="0" cellpadding="0" cellspacing="5" style="width: 100%; max-width: 620px;" dir="ltr">
<tbody>
<tr>
<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center">This email was sent from #[CAMPAIGN:SENDER_NAME]# to <a href="mailto:#[EMAIL]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;">#[EMAIL]#</a>.</td>
</tr>
<tr>
<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center">#[LIST:COMPANY]# | #[LIST:ADDRESS]#</td>
</tr>
<tr>
<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center"><a href="#[LIST:URL]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;">Why am I receiving this email?</a></td>
</tr>
<tr>
<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center"><a href="#[UNSUB]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;"> Click here to unsubscribe</a> | <a href="#[UPDATE_PROFILE]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;">Update your profile</a></td>
</tr>
</tbody>
</table>',
	//'plain' => 'some pretty plain content *[UNSUB]* message',
	//'url' => 'http://www.google.com',
	// 'archive' => base64_encode(file_get_contents('archive.tar')),
	// 'archive_type' => 'tar'
);

$testType = 'time';

$options['title'] = "{$options['title']} (test type: {$testType})";
$type_opts = [
	'test_type' => $testType,
	'test_size' => 40,
	'winner_by' => 'click',
	'winner_after' => 12, // hours
	'send_manual' => false,
	'winner_inconclusive' => 'B',
];

switch ($testType) {
	case 'content':
		$content = [
			'html_A' => 'Content A, some pretty html content #[UNSUB]# message
		<table align="center" border="0" cellpadding="0" cellspacing="5" style="width: 100%; max-width: 620px;" dir="ltr">
		<tbody>
		<tr>
		<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center">This email was sent from #[CAMPAIGN:SENDER_NAME]# to <a href="mailto:#[EMAIL]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;">#[EMAIL]#</a>.</td>
		</tr>
		<tr>
		<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center">#[LIST:COMPANY]# | #[LIST:ADDRESS]#</td>
		</tr>
		<tr>
		<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center"><a href="#[LIST:URL]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;">Why am I receiving this email?</a></td>
		</tr>
		<tr>
		<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center"><a href="#[UNSUB]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;"> Click here to unsubscribe</a> | <a href="#[UPDATE_PROFILE]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;">Update your profile</a></td>
		</tr>
		</tbody>
		</table>',
			'html_B' => 'Content B, some pretty html content #[UNSUB]# message
		<table align="center" border="0" cellpadding="0" cellspacing="5" style="width: 100%; max-width: 620px;" dir="ltr">
		<tbody>
		<tr>
		<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center">This email was sent from #[CAMPAIGN:SENDER_NAME]# to <a href="mailto:#[EMAIL]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;">#[EMAIL]#</a>.</td>
		</tr>
		<tr>
		<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center">#[LIST:COMPANY]# | #[LIST:ADDRESS]#</td>
		</tr>
		<tr>
		<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center"><a href="#[LIST:URL]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;">Why am I receiving this email?</a></td>
		</tr>
		<tr>
		<td style="font-size: 11px; font-family: Arial; color: #666666;" align="center"><a href="#[UNSUB]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;"> Click here to unsubscribe</a> | <a href="#[UPDATE_PROFILE]#" target="_blank" style="font-size: 11px; font-family: Arial; color: #4d749c;">Update your profile</a></td>
		</tr>
		</tbody>
		</table>',
		];
		unset($content['html']);
		break;
	case 'subject':
		$options += [
			'subject_A' => 'Test Newsletter Subject A',
			'subject_B' => 'Test Newsletter Subject B',
		];
		unset($options['subject']);
		break;
	case 'from':
		$options += [
			'from_name_A' => 'DEMO A, Inc.',
			'from_name_B' => 'DEMO B, Inc.',
		];
		unset($options['from_name']);
		break;
	case 'time':
		$options += [
			'schedule_time_A' => date('Y-m-d H:00:00', strtotime('+2 days')),
			'schedule_time_B' => date('Y-m-d H:00:00', strtotime('+2 days +2 hours')),
		];
		break;
}

$retval = $api->campaignCreate($type, $options, $content, $type_opts);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignCreate()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "New Campaign ID:".$retval."\n";
}
