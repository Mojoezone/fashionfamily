<?php //parse comment if on was submitted
if($_POST['did_review']){
  //extrac and sanitize(clean_string is in our function file)
  $title = clean_string($_POST['title']);
	$review = clean_string($_POST['review']);


  //validate
  $valid = true;

  if($title == '' OR strlen($title) > 40){
    $valid = false;
    $errors['title'] = 'Please provide your name, up to 100 characters long';
  }
//comment is blank
if( $review == ''){
  $valid = false;
  $errors['review'] = 'Review filed can not left blank';
}

  //if valid, add to DB
  if($valid){
    $user_id = $logged_in_user['user_id'];
    $product_id = $_GET['product_id'];
    //todo: once the admin panel is set up, change the is_approve value
    $query = "INSERT INTO reviews (title, body, user_id, product_id, date, is_approved)
              VALUES
              ('$title', '$review', $user_id, $product_id, now(), 1)";
    //run it
    $result = $db->query($query);
    //check it
    //give user feedback
    if($db->affected_rows == 1){
      //success
      $feedback = 'Thank you for your review, it will appear shortly.';
    }else{
      //error db
      $feedback = 'Sorry, Something went wrong, your review could not be posted.';
    }
  }//valid
  else{
    $feedback = 'There are errors in the review form, please fix the following.';
  }
}//end if comment parse
 ?>
