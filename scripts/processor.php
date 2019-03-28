<?php
/**
 * This script handles registration and payment
 *
 * PHP version 7.2
 *
 * @category Form_Processor
 * @package  Form_Processor
 * @author   Benson Imoh,ST <benson@stbensonimoh.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://stbensonimoh.com
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Require Classes
require '../config.php';
require './DB.php';
require './Notify.php';
require './Newsletter.php';

$mediaHouseName= $_POST['mediaHouseName'];
$mediaHouseEmail = $_POST['mediaHouseEmail'];
$mediaHousePhone = $_POST['mediaHousePhone'];
$contactPersonName = $_POST['contactPersonName'];
$contactPersonEmail =$_POST['contactPersonEmail'];
$contactPersonPhone =$_POST['contactPersonPhone'];
$representative = $_POST['representative'];


$name = $mediaHouseName . " " ;
require './emails.php';
$details = array(
    "mediaHouseName" => $_POST['mediaHouseName'],
    "mediaHouseEmail" =>$_POST['mediaHouseEmail'],
    "mediaHousePhone" =>$_POST['mediaHousePhone'],
    "contactPersonName" =>$_POST['contactPersonName'],
    "contactPersonEmail" =>$_POST['contactPersonEmail'],
    "contactPersonPhone" =>$_POST['contactPersonPhone'],
    "representative" => $_POST['representative'],
);
$emails = array(
    array(
            "email"         =>  $mediaHouseEmail,
            "variables"     =>  array(
            "mediaHouseName"         =>  $mediaHouseName,
            "mediaHouseEmail"          =>  $mediaHouseEmail,
            "mediaHousePhone"    =>  $mediaHousePhone,
            "contactPersonName"      => $contactPersonName,
            "contactPersonEmail"        =>  $contactPersonEmail,
            "contactPersonPhone"    => $contactPersonPhone,
            "representative" => $representative,
            )
    )
);
$db = new DB($host, $db, $username, $password);

$notify = new Notify($smstoken, $emailHost, $emailUsername, $emailPassword, $SMTPDebug, $SMTPAuth, $SMTPSecure, $Port);
$newsletter = new Newsletter($apiUserId, $apiSecret);

// Check if the person has signed up to volunteer before
if ($db->userExists($email, "awlc2019_accreditation")) {
    echo json_encode("user_exists");
}
// Put the User into the Database
if ($db->insertUser("awlc2019_accreditation", $details)) {
    // $notify->viaEmail("info@awlo.org", "Afican Women In Leadership Organisation", $mediaHouseEmail, $mediaHouseName, "You have successfully completed the media accreditation process.Media representatives are expeted to arrive at the conference venue with proof of identification to be presented at he registration desk. Identification validates entry.Thank you for your cooperation");
    // $notify->viaEmail("info@awlo.org", "A media house has been accredited", "info@awlo.org", "Admin", $emailBodyOrganisation, "New Media Accreditation.");
    // $notify->viaSMS("AWLOInt", "Dear {$mediaHouseName}, Your media accreditation was successful, Kindly check youur email for more details.", $mediaHousePhone);
    // $notify->viaSMS("AWLOInt", "A Media House has just been accredited for the AWLCRwanda2019. Kindly check your email for the details.", "08037594969,08022473972");
    // $newsletter->insertIntoList("2309698", $emails);
    echo json_encode("success");
}