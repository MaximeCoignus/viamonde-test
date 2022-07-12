<?php 
session_start();

include("db_link.php");

if ( empty($_POST['login']) && empty($_POST['password'])) {
	exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $bdd->prepare('SELECT id, password FROM users WHERE login = ?')) {
	$stmt->execute(array($_POST['login']));

	if ($stmt->rowCount() > 0) {
    	
    	// Account exists, now we verify the password.
		// Note: remember to use password_hash in your registration file to store the hashed passwords.
    	$resultat = $stmt->fetch();
    	if(password_verify($_POST['password'], $resultat['password'])) {
        	// Verification success! User has logged-in!
			// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
			session_regenerate_id();
        	$_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['login'];
            $_SESSION['id'] = $id;
        	$_SESSION['CREATED'] = time();
        	header('Location: home.php');
        } else {
    	    // Incorrect password
			echo 'Incorrect password!';
	        echo '<br /><a href=\'index.php\'>Back</a>';
        }
    } else {
    	// Incorrect username
		echo 'Incorrect username!';
	    echo '<br /><a href=\'index.php\'>Back</a>';
    }


	$stmt->closeCursor();
}

?>
