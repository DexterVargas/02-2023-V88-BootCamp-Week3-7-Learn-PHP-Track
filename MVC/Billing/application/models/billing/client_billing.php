<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_Billing extends CI_Model {
    /**Class method that will pullout the default data to be displayed in the index.php
     * The data range is within 2011 
    */
    function get_all_billings(){
        return $this->db->query("SELECT DATE_FORMAT(billing.charged_datetime, '%M') AS month_charged,DATE_FORMAT(billing.charged_datetime, '%Y') AS year_charged ,SUM(billing.amount) AS total_revenue FROM billing
        where DATE_FORMAT(charged_datetime, '%Y') = '2011'
        GROUP BY  DATE_FORMAT(charged_datetime, '%M')
        ORDER BY year_charged asc;")->result_array();
    }

    /**Class method that will pullout the user fetch data to be displayed in the index.php.
     * Then format the date picker [date_from] and [date_to] the same format as the database date/time format
     * 
    */
    function get_fetch_data($range){
        $from = date('Y-m-d H:i:s', strtotime( $range['date_from']));
        $to = date('Y-m-d H:i:s', strtotime( $range['date_to']));
        return $this->db->query("SELECT DATE_FORMAT(billing.charged_datetime, '%M') AS month_charged,DATE_FORMAT(billing.charged_datetime, '%Y') AS year_charged ,SUM(billing.amount) AS total_revenue FROM billing
        where charged_datetime between ? and ?
        GROUP BY  DATE_FORMAT(charged_datetime, '%M') ,DATE_FORMAT(billing.charged_datetime, '%Y')
        ORDER BY year_charged asc;" , array($from, $to))->result_array();;
    }
}
