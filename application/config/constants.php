<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


defined('SITE_KEY')            OR define('SITE_KEY', '6Lcn5dMoAAAAAOn66FoEr6D6Q1umYzThAR6MLdYY');
defined('SECRET_KEY')          OR define('SECRET_KEY', '6Lcn5dMoAAAAAJQZFcOJpFOGB2dQyOUIogczphfR');

defined('APPOINTMENT_VACANT')    OR define('APPOINTMENT_VACANT', 'vacant');
defined('APPOINTMENT_RESERVED')  OR define('APPOINTMENT_RESERVED', 'reserved');
defined('APPOINTMENT_REJECTED')  OR define('APPOINTMENT_REJECTED', 'rejected');
defined('APPOINTMENT_CANCELLED') OR define('APPOINTMENT_CANCELLED', 'cancelled');
defined('APPOINTMENT_DONATED')  OR define('APPOINTMENT_DONATED', 'donated');

defined('MAX_MAKEAPPOINTMENT')  OR define('MAX_MAKEAPPOINTMENT', 5);

defined('CAMP_VACANT')     OR define('CAMP_VACANT', 'vacant');
defined('CAMP_FILLED')     OR define('CAMP_FILLED', 'filled');
defined('CAMP_CANCELLED')  OR define('CAMP_CANCELLED', 'cancelled');
defined('CAMP_JOINED')     OR define('CAMP_JOINED', 'joined');
defined('CAMP_REVOKED')    OR define('CAMP_REVOKED', 'revoked');
defined('CAMP_QUIT')       OR define('CAMP_QUIT', 'quit');

defined('MSG_SENT')     OR define('MSG_SENT', 'sent');
defined('MSG_SEEN')     OR define('MSG_SEEN', 'seen');
defined('MSG_DEL')      OR define('MSG_DEL', 'deleted');
defined('MSG_WARNING')  OR define('MSG_WARNING', 'warning');
defined('MSG_INFO')     OR define('MSG_INFO', 'info');
defined('MSG_SUCCESS')  OR define('MSG_SUCCESS', 'success');
defined('MSG_HELP')     OR define('MSG_HELP', 'help');

defined('DONATION_PROCESSING')   OR define('DONATION_PROCESSING', 'processing');
defined('DONATION_PROCESSED')    OR define('DONATION_PROCESSED', 'processed');
defined('DONATION_REJECTED')     OR define('DONATION_REJECTED', 'rejected');
defined('DONATION_DONATED')      OR define('DONATION_DONATED', 'donated');
defined('DONATION_CAMP')         OR define('DONATION_CAMP', 'bloodcamp');
defined('DONATION_APPOINTMENT')  OR define('DONATION_APPOINTMENT', 'appointment');

defined('BLOOD_AP')    OR define('BLOOD_AP', 'ap');
defined('BLOOD_AN')    OR define('BLOOD_AN', 'an');
defined('BLOOD_ABP')   OR define('BLOOD_ABP', 'abp');
defined('BLOOD_ABN')   OR define('BLOOD_ABN', 'abn');
defined('BLOOD_BP')    OR define('BLOOD_BP', 'bp');
defined('BLOOD_BN')    OR define('BLOOD_BN', 'bn');
defined('BLOOD_OP')    OR define('BLOOD_OP', 'op');
defined('BLOOD_ON')    OR define('BLOOD_ON', 'on');

defined('PRIORITY_NORMAL') or define('PRIORITY_NORMAL', 'normal');
defined('PRIORITY_URGENT') or define('PRIORITY_URGENT', 'urgent');

defined('REQUEST_PENDING')   or define('REQUEST_PENDING', 'pending');
defined('REQUEST_CANCELLED') or define('REQUEST_CANCELLED', 'cancelled');
defined('REQUEST_REJECTED')  or define('REQUEST_REJECTED', 'rejected');
defined('REQUEST_ACCEPTED')  or define('REQUEST_ACCEPTED', 'accepted');

defined('HOSPITAL_PENDING')   or define('HOSPITAL_PENDING', 'pending');
defined('HOSPITAL_VERIFIED')  or define('HOSPITAL_VERIFIED', 'verified');
defined('HOSPITAL_ACCEPTED')  or define('HOSPITAL_ACCEPTED', 'accepted');
defined('HOSPITAL_REVOKED')   or define('HOSPITAL_REVOKED', 'revoked');