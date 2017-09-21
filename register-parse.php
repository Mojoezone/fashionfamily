<?php
//parse the register form if it was submitted
if($_POST['did_register']){
  //sanitize every input
  $username = clean_string($_POST['username']);
  $email = clean_email($_POST['email']);
  $password = clean_string($_POST['password']);
  $policy = clean_int($_POST['policy']);

  //validate
  $valid = true;

    //username is blank or more than 40 characters
    if($username == '' OR strlen($username > 40)){
      $valid = false;
      $errors['username'] = 'Your username must be within 1 - 40 characters long';
    }else{
      //username is already taken, $username in single quote because it the string data
      $query = "SELECT username
                FROM users
                WHERE username = '$username'
                LIMIT 1 ";
      $result = $db->query($query);
      //if on result is found, the username is already taken!
      if($result->num_rows == 1){
        $valid = false;
        $errors['username'] = 'That usernae is already taken. Try another';
      }//end if username taken

    }//if statement useranme

    //email  is blank or invalid email
    if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
      $valid = false;
      $errors['email'] = 'Please provide a valid email address';
    }else{
      //email is already used
      $query = "SELECT email
                FROM users
                WHERE email = '$email'
                LIMIT 1 ";
    $result = $db->query($query);
      //if on result is found, the username is already taken!
      if($result->num_rows == 1){
      $valid = false;
      $errors['email'] = 'That email is already registered. Do you want to log in?';
    }//end if email taken

  }//if stasten email

    //password is blank or less than 8 characters
    if(strlen($password) < 8){
      $valid = false;
      $errors['password'] = 'Choose a password that is longer that 8 characters';
    }

    //if the policy box is not check
    if($policy != 1){
      $valid = false;
      $errors['policy'] = 'Please agree to the term and service before register';
    }

  //if valid, add the user to DB
  if($valid){
    //Calculate the sha1 hash of a string //hash the password before storing // sha1 is random password assigned to teh user
    $password = sha1($password . SALT );
    $query = "INSERT INTO users
              (username, password, email, is_admin, join_date)
              VALUES
              ('$username', '$password', '$email', 0, now() ) ";
    $result = $db->query($query);

      //if that works, redirect to the login form
    if($db->affected_rows == 1){
      //success, redirect to login,
      header('Location:login.php');
    }else{
      $feedback = 'Sorry, your account cound not be created at this time.';
    }//end if success
  }else{
    $feedback = 'Please fix the following errors: ';
  }//end if valid

}//end parse


//no need to close php
