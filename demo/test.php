<?php
/**
 * User  : Nikita.Makarov
 * Date  : 09/01/14
 * Time  : 7:32 AM
 * E-Mail: nikita.makarov@effective-soft.com
 */
$library_path = implode(DIRECTORY_SEPARATOR, array(dirname(dirname(__FILE__)), 'compiled')) . DIRECTORY_SEPARATOR . 'Swiftmailer.';

/**
 * IMPORTANT: If you wish to customize swift configs, then define directory to configs here;
 */
if (!defined('SWIFT_CONFIG_DIR')) {
    define('SWIFT_CONFIG_DIR',dirname(__FILE__) . DIRECTORY_SEPARATOR . 'swift_configs');
}


if (extension_loaded('bz2')) {
    require_once 'phar://' . $library_path . 'bz2';
    echo 'BZ2 Loaded' . PHP_EOL;
} elseif (extension_loaded('zlib')) {
    require_once 'phar://' . $library_path . 'gz';
    echo 'GZ Loaded' . PHP_EOL;
} else {
    require_once 'phar://' . $library_path . 'phar';
    echo 'RAW Loaded' . PHP_EOL;
}

require_once 'phar://' . $library_path . 'phar';

$subject = 'Hello from Mandrill, PHP!';
$from = array('you@yourdomain.com' =>'Your Name');
$to = array(
    'recipient1@example.com'  => 'Recipient1 Name',
    'recipient2@example2.com' => 'Recipient2 Name'
);

$text = "Mandrill speaks plaintext";
$html = "<em>Mandrill speaks <strong>HTML</strong></em>";

$transport = Swift_SmtpTransport::newInstance('localhost', 25);
//$transport->setUsername('');
//$transport->setPassword('');
$swift = Swift_Mailer::newInstance($transport);

$message = new Swift_Message($subject);
$message->setFrom($from);
$message->setBody($html, 'text/html');
$message->setTo($to);
$message->addPart($text, 'text/plain');

if ($recipients = $swift->send($message, $failures))
{
    echo 'Message successfully sent!';
} else {
    echo "There was an error:\n";
    print_r($failures);
}