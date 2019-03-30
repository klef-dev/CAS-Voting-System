<?php
class Db
{
    protected $dbhost = "remotemysql.com";
    protected $dbname = "S1hYG6PGsb";
    protected $dbuser = "S1hYG6PGsb";
    protected $dbpass = "UpssAxr9r6";

    public function connect()
    {
        $dsn = 'mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname . '';
        $dbcon = new PDO($dsn, $this->dbuser, $this->dbpass);
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbcon;
    }

    public function cleanInput($input)
    {
        $input = htmlspecialchars($input, ENT_QUOTES);
        return $input;
    }

    public function cleanUsername($username)
    {
        $username = htmlspecialchars($username, ENT_QUOTES);
        $username = strtolower($username);
        return $username;
    }

    /*************************************************************
     ******************** GET QUERY FUNCTION **********************
     *************************************************************/
    public function getQuery($sql, $params = null)
    {
        try {
            // Connection to Database
            $pdo = $this->connect();
            // Query
            $statement = $pdo->prepare($sql);
            // Get the parameters and execute them
            $statement->execute($params);
            // Check if there is data in the database
            $count = $statement->rowCount();
            if ($count > 0) {
                return $statement->fetchAll(PDO::FETCH_OBJ);
            } else {
                return false;
            }
            $pdo = null;
        } catch (PDOException $e) {
            echo '{"error": {"err_text": "' . $e->getMessage() . '"}}';
        }
    }

    /************************************************************
     ******************** POST QUERY FUNCTION ********************
     ************************************************************/
    public function postQuery($sql, $params = null, $msg = null)
    {
        try {
            // Connection to Database
            $pdo = $this->connect();

            // Query
            $statement = $pdo->prepare($sql);

            ##### Get the parameters and execute them    #####
            $statement->execute($params);

            ##### Print out the Response #####
            echo ($msg !== null) ? '{"success": {"success_text": "' . $msg . '"}}' : "";

            // Close the Connection
            $pdo = null;
        } catch (PDOException $e) {
            echo '{"error": {"err_text": "' . $e->getMessage() . '"}}';
        }
    }

    public function checkmail($email)
    {
        $sql = "SELECT email FROM users WHERE email = :email";
        $db_param = ["email" => $email];
        $check = $this->getQuery($sql, $db_param);
        if ($check > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function Ago($datetime)
    {
        $time = strtotime($datetime);
        $current = time();

        return date('M j, Y g:i A', $time);
    }

    public function sendMail($subject, $body, $address, $name)
    {
        require '../sendgrid/vendor/autoload.php';
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("cas@lmu.edu.ng", "CAS Official Voting System 2019");
        $email->setSubject($subject);
        $email->addTo($address, $name);
        $email->addContent(
            "text/html", $body
        );
        $API_KEY = "";
        $sendgrid = new \SendGrid($API_KEY);
        try {
            $response = $sendgrid->send($email);
            if ($response->statusCode() == 202) {
                // Successfully sent

                return true;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }
}