<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - NextStats_Dev
 * Last Updated - 14/02/2021
 */

class Database
{
    //good practice to declared vars at start
    private $config;
    private $host;
    private $user;
    private $pass;
    private $name;
    private $alert;

    function __construct() // Constructor called at creation of all instances
    {
        $config = new Config();
        $config->load($_SERVER['DOCUMENT_ROOT'].'/config.php');

        $this->config = $config;
        $this->host = $config->get('db.host','');
        $this->user = $config->get('db.user','');
        $this->pass = $config->get('db.pass','');
        $this->name = $config->get('db.name','');


        $this->alert = new InterfaceAlert();
    }

    public function check()
    {
        if ($this->host == "") {
            $ErrorNumber = "db01";
            $ErrorDescription = "Database connection cannot be established as no database host ip address has been provided.";
            $this->checkfailed($ErrorNumber,$ErrorDescription);
        }
        if ($this->user == "") {
            $ErrorNumber = "db02";
            $ErrorDescription = "Database connection cannot be established as no database username has been provided";
            $this->checkfailed($ErrorNumber,$ErrorDescription);
        }
        if ($this->name == "") {
            $ErrorNumber = "db03";
            $ErrorDescription = "Database connection cannot be established as no database name has been provided";
            $this->checkfailed($ErrorNumber,$ErrorDescription);
        }
    }

    private function checkfailed($ErrorNumber,$ErrorDescription){

        header("Location: ../help/error.php?errno=$ErrorNumber&error=$ErrorDescription");
    }

    public function query($sql,$Return = false)
    {
        //create connection
        $database = new mysqli("$this->host","$this->user","$this->pass","$this->name");

        if($database->connect_error) {
            header("Location: ../help/error.php?errno=$database->connect_errno&error=$database->connect_error");
        }

        $database->query($sql);
        return $database->query($sql);

        header("location: $Return");

    }

    public function fetch($sql,$Return = false): array // Return Null "true" or "false"
    {
        //submit sql request

        $database = new mysqli("$this->host","$this->user","$this->pass","$this->name");

        if($database->connect_error)
        {
            header("Location: ../help/error.php?errno=$database->connect_errno&error=$database->connect_error");
        }
        $result = $database->query($sql);

        if ($result) {
            $result1 = []; // creates an empty array for sql results
            while ($row = mysqli_fetch_row($result)) {
                array_push($result1, $row); //fetches all rows and inserts into array
            }
            if ($result1) {

                return $result1; // return sends data back to requester


            } elseif ($result1 == null) {
                if ($Return == false) {
                    $this->alert->create("No data entries found", "info");
                    return [];
                } else {
                    array_push($result1, [null, "No data entries found"]);
                    return $result1;
                }
            } else {

                $this->alert->create("SQL FATAL ERROR: Please contact our support team", "error");

            }

        }
        $database->close();
    }


}