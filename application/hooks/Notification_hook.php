<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_hook {

    public function __construct() {
        $this->CI = &get_instance();
    }

    public function checkNotification() {
        // Load the Notification library
        $this->CI->load->library('Notification');

        // Get session level
        $levelAccess = $this->CI->session->userdata('level');

        // Get notifications using the Notification library
        $notifications = $this->CI->notification->push($levelAccess);

        // $pullNotifications = $this->CI->notification->pullAll($levelAccess);

        // You can then store $notifications in a session variable
        // or any other method you want to use for displaying notifications.
    }

 
}
