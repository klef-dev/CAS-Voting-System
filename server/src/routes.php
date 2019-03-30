<?php
use Slim\Http\Response;
// Create and configure Slim app
$app = new \Slim\App;

// ADD NOMINEES
$app->post("/add_admin", function ($request, $response) {
    // USERNAME, PASSWORD
    $username = $request->getParam("username");
    $password = $request->getParam("password");
    $cstrong = true;
    $user_id = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

    // INSTANTIATE DB
    $db = new Db();
    $sql = "SELECT username FROM users WHERE username = :username";
    $db_param = ["username" => $db->cleanInput($username)];
    $getDb = $db->getQuery($sql, $db_param);

    if ($getDb > 0) {
        return '{"error": {"err_text": "User already exists"}}';
    } else {
        // INSERT INTO DB
        $sql = "INSERT INTO users (user_id, username, password) VALUES(:user_id,:username, :password)";
        $db_params = [
            "user_id" => $user_id,
            "username" => $db->cleanInput($username),
            "password" => password_hash($password, PASSWORD_BCRYPT, [12]),
        ];
        $db->postQuery($sql, $db_params, $username . " your profile has just been created");
    }

});

// LOGIN A USER
$app->post('/login_admin', function ($request, $response, $args) {
    $username = $request->getParam('username');
    $password = $request->getParam('password');
    $db = new Db();
    $db = $db->connect();
    $statement = $db->prepare("SELECT user_id, password FROM users WHERE username = :username");
    $statement->execute(['username' => $username]);
    $user = $statement->fetch(PDO::FETCH_OBJ);
    $count = $statement->rowCount();

    if ($count > 0) {
        $db_password = $user->password;
        if (password_verify($password, $db_password)) {
            session_start();
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['time'] = time();
            $id = $user->user_id;
            $loggedin = 1;
            $cstrong = true;
            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
            $db = new Db();
            $sql = "SELECT user_id, time, token FROM loggedin WHERE user_id = :user_id";
            // Assign the Parameters
            $db_params = [
                'user_id' => $id,
            ];
            // Connect and Send Query
            $user_idQuery = $db->getQuery($sql, $db_params);
            if ($user_idQuery > 0) {
                $sql_delete = "DELETE FROM loggedin WHERE user_id = :user_id";
                $db_params_delete = ["user_id" => $id];
                $db_delete = $db->postQuery($sql_delete, $db_params_delete);
                $sql_insert = "INSERT INTO loggedin (user_id, loggedin, time, token) VALUES (:user_id, :loggedin, :time, :token)";
                $db_params_insert = ["user_id" => $id, 'loggedin' => $loggedin, 'time' => $_SESSION['time'], "token" => $token];
                $db_insert = $db->postQuery($sql_insert, $db_params_insert);
                $sql = "SELECT user_id, time, token FROM loggedin WHERE token = :token";
                // Assign the Parameters
                $db_params = [
                    'token' => $token,
                ];
                // Connect and Send Query
                $token = $db->getQuery($sql, $db_params);
                foreach ($token as $token) {
                    $time = $token->time;
                    $token = $token->token;
                    $loggedinArr = ["time" => $time, "token" => $token];

                    // Get the Query in JSON Format
                    return json_encode($loggedinArr);
                }
            } else {
                $sql_insert = "INSERT INTO loggedin (user_id, loggedin, time, token) VALUES (:user_id, :loggedin, :time, :token)";
                $db_params_insert = ["user_id" => $id, 'loggedin' => $loggedin, 'time' => $_SESSION['time'], "token" => $token];
                $db_insert = $db->postQuery($sql_insert, $db_params_insert);
                $sql = "SELECT user_id, time, token FROM loggedin WHERE token = :token";
                // Assign the Parameters
                $db_params = [
                    'token' => $token,
                ];
                // Connect and Send Query
                $token = $db->getQuery($sql, $db_params);
                foreach ($token as $token) {
                    $time = $token->time;
                    $token = $token->token;
                    $loggedinArr = ["time" => $time, "token" => $token];

                    // Get the Query in JSON Format
                    return json_encode($loggedinArr);
                }
            }
        } else {
            return '{"error": {"err_text": "Only accessable to admins"}}';
        }
    } else {
        return '{"error": {"err_text": "Your plan has failed"}}';
    }
});

// ADD NOMINEES
$app->post("/add", function ($request, $response) {
    // USERNAME, PASSWORD
    $reg_no = $request->getParam("reg_no");
    $person = $request->getParam("person");
    $category = $request->getParam("category");
    $personImage = $request->getParam("personImage");
    $cstrong = true;
    $personId = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
    $db = new Db();

    // INSERT INTO DB
    $sql = "INSERT INTO nominees (personId, reg_no, person, personImage, category, likes) VALUES(:personId, :reg_no, :person, :personImage, :category, 0)";
    $db_params = [
        "personId" => $personId,
        "reg_no" => $db->cleanInput($reg_no),
        "person" => $db->cleanInput($person),
        "personImage" => $db->cleanInput($personImage),
        "category" => $db->cleanInput($category),
    ];
    $db->postQuery($sql, $db_params, $person . " has just been nominated");
});

$app->post("/upload", function($request, $response, $args) {
    $image = $request->getParam("image");
    if($_FILES['image']['error'] == 0) {
        switch ($_FILES['image']['type']) {
            case 'image/jpeg':
                $image;
                break;
            case 'image/jpg':
                $image;
                break;
            case 'image/png':
                $image;
                break;
            
            default:
                return '{"error": {"err_text": "Invalid image format"}}';
                break;
        }
        $cstrong = true;
        $imageId = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

        $destination = 'uploads/'.$imageId.'_'.$_FILES['image']['name'];
        if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            return '{"success": {"success_text": "'.$destination.'"}}';
        } else {
            return '{"error": {"err_text": "Couldn\'t upload image"}}';
        }
    } else if($_FILES['image']['error'] == 1 || $_FILES['image']['error'] == 2) {
        return '{"error": {"err_text": "File size too big"}}';

    } else {
        return '{"error": {"err_text": "File partially uploaded"}}';
    }
});

// SIGNING UP A USER
$app->post("/signup", function ($request, $response) {
    // USERNAME, PASSWORD
    $reg_no = $request->getParam("reg_no");
    $password = $request->getParam("password");
    $cstrong = true;
    $user_id = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

    // INSTANTIATE DB
    $db = new Db();
    $sql = "SELECT reg_no FROM students WHERE reg_no = :reg_no";
    $db_param = ["reg_no" => $db->cleanInput($reg_no)];
    $getDb = $db->getQuery($sql, $db_param);

    if ($getDb > 0) {
        return '{"error": {"err_text": "Hello, you can not register two time ooo..."}}';
    } else {
        // INSERT INTO DB
        $sql = "INSERT INTO students (user_id, reg_no, password, voted) VALUES(:user_id,:reg_no, :password, 0)";
        $db_params = [
            "user_id" => $user_id,
            "reg_no" => $db->cleanInput($reg_no),
            "password" => password_hash($password, PASSWORD_BCRYPT, [12]),
        ];
        $db->postQuery($sql, $db_params, $reg_no . " your profile has just been created");
    }
});

// LOGIN A USER
$app->post('/login', function ($request, $response, $args) {
    $reg_no = $request->getParam('reg_no');
    $password = $request->getParam('password');
    $db = new Db();
    $db = $db->connect();
    $statement = $db->prepare("SELECT user_id, password FROM students WHERE reg_no = :reg_no");
    $statement->execute(['reg_no' => $reg_no]);
    $user = $statement->fetch(PDO::FETCH_OBJ);
    $count = $statement->rowCount();

    if ($count > 0) {
        $db_password = $user->password;
        if (password_verify($password, $db_password)) {
            session_start();
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['time'] = time();
            $id = $user->user_id;
            $loggedin = 1;
            $cstrong = true;
            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
            $db = new Db();
            $sql = "SELECT user_id, time, token FROM loggedin WHERE user_id = :user_id";
            // Assign the Parameters
            $db_params = [
                'user_id' => $id,
            ];
            // Connect and Send Query
            $user_idQuery = $db->getQuery($sql, $db_params);
            if ($user_idQuery > 0) {
                $sql_delete = "DELETE FROM loggedin WHERE user_id = :user_id";
                $db_params_delete = ["user_id" => $id];
                $db_delete = $db->postQuery($sql_delete, $db_params_delete);
                $sql_insert = "INSERT INTO loggedin (user_id, loggedin, time, token) VALUES (:user_id, :loggedin, :time, :token)";
                $db_params_insert = ["user_id" => $id, 'loggedin' => $loggedin, 'time' => $_SESSION['time'], "token" => $token];
                $db_insert = $db->postQuery($sql_insert, $db_params_insert);
                $sql = "SELECT user_id, time, token FROM loggedin WHERE token = :token";
                // Assign the Parameters
                $db_params = [
                    'token' => $token,
                ];
                // Connect and Send Query
                $token = $db->getQuery($sql, $db_params);
                foreach ($token as $token) {
                    $time = $token->time;
                    $token = $token->token;
                    $loggedinArr = ["time" => $time, "token" => $token];

                    // Get the Query in JSON Format
                    return json_encode($loggedinArr);
                }
            } else {
                $sql_insert = "INSERT INTO loggedin (user_id, loggedin, time, token) VALUES (:user_id, :loggedin, :time, :token)";
                $db_params_insert = ["user_id" => $id, 'loggedin' => $loggedin, 'time' => $_SESSION['time'], "token" => $token];
                $db_insert = $db->postQuery($sql_insert, $db_params_insert);
                $sql = "SELECT user_id, time, token FROM loggedin WHERE token = :token";
                // Assign the Parameters
                $db_params = [
                    'token' => $token,
                ];
                // Connect and Send Query
                $token = $db->getQuery($sql, $db_params);
                foreach ($token as $token) {
                    $time = $token->time;
                    $token = $token->token;
                    $loggedinArr = ["time" => $time, "token" => $token];

                    // Get the Query in JSON Format
                    return json_encode($loggedinArr);
                }
            }
        } else {
            return '{"error": {"err_text": "Woah!!! your credentials is not correct"}}';
        }
    } else {
        return '{"error": {"err_text": "Can\'t recall you registering with these registration number"}}';
    }
});

// GET USERID
$app->get("/loggedin/{token}", function ($request, $response, $args) {
    $token = $args["token"];

    $db = new Db();

    $sql = "SELECT * FROM loggedin WHERE token = :token";

    $db_params = [
        "token" => $token,
    ];

    $result = $db->getQuery($sql, $db_params);
    if ($result > 0) {
        return $response->withjson($result);
    } else {
        return false;
    }
});

// GET CATGORIES
$app->post("/vote", function ($request, $response, $args) {
    $type = $request->getParam("type");
    $person = $request->getParam("person");
    $personId = $request->getParam("personId");
    $user_id = $request->getParam("user_id");

    $db = new Db();

    $sql = "SELECT * FROM nominees WHERE personId = :personId";

    $db_params = [
        "personId" => $personId,
    ];

    $result = $db->getQuery($sql, $db_params);
    if ($result > 0) {
        $sql = "SELECT * FROM $type WHERE user_id = :user_id";

        $db_params = [
            "user_id" => $user_id,
        ];

        $result = $db->getQuery($sql, $db_params);
        if ($result > 0) {
            return '{"error": {"err_text": "You can\'t vote two times"}}';
        } else {
            $sql_insert = "INSERT INTO $type (person, personId, user_id, likes) VALUES (:person, :personId, :user_id, 1)";
            $sql_update = "UPDATE nominees SET likes = likes+1 WHERE  personId = :personId";
            $db_params_insert = [
                "user_id" => $user_id,
                "person" => $person,
                "personId" => $personId,
            ];
            $db_params_update = [
                "personId" => $personId,
            ];
            $db->postQuery($sql_insert, $db_params_insert, "Your vote has count for " . $person);
            $db->postQuery($sql_update, $db_params_update);
        }
    } else {
        return '{"error": {"err_text": "😱😱 you want to hack this site..."}}';
    }
});

// Logout
$app->post("/logout", function ($request, $response, $args) {
    session_start();
    $token = $request->getParam("token");
    $db = new Db();
    $sql = "DELETE FROM loggedin WHERE token = :token";

    $db->postQuery($sql, ["token" => $token]);
    session_destroy();

});

// GET CATGORIES
$app->get("/cat/{type}", function ($request, $response, $args) {
    $type = $args["type"];

    $db = new Db();

    $sql = "SELECT * FROM nominees WHERE category = :type";

    $db_params = [
        "type" => $type,
    ];

    $result = $db->getQuery($sql, $db_params);
    if ($result > 0) {
        return $response->withjson($result);
    } else {
        return false;
    }
});

// GET LEADS
$app->get("/leads/{type}", function($request, $response, $args) {
    $type = $args['type'];
    $sql = "SELECT * FROM nominees WHERE category = :category ORDER BY likes DESC LIMIT 1";
    $db = new Db();
    $leads = $db->getQuery($sql, ["category" => $type]);
    if ($leads > 0) {
        return $response->withjson($leads);
    }
});

// PROFILE
$app->get("/user/{username}", function ($request, $response, $args) {
    $username = $args["username"];

    $db = new Db();

    $sql = "SELECT * FROM users WHERE username = :username || user_id = :username";

    $db_params = [
        "username" => $username,
        "user_id" => $username,
    ];

    $result = $db->getQuery($sql, $db_params);
    if ($result > 0) {
        return $response->withjson($result);
    } else {
        return false;
    }
});

// GET AMOUNT OF STUDENT REGISTERED
$app->get("/registered", function ($request, $response, $args) {
    $db = new Db();
    $sql = "SELECT COUNT(id) AS totalRegistered FROM students";

    $result = $db->getQuery($sql);
    if ($result > 0) {
        return $response->withjson($result);
    } else {
        return false;
    }
});