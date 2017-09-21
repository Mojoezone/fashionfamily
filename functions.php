<?php
//define function (call anything you want)
function convert_date($timestamp){
  //echo 'convert datetime into human readable format ;
  $date = new DateTime($timestamp);
// -> single arrow like . in javascript
// search in php.net for syntax use return can be store in data
  //echo $date->format('l, F j Y ');
  return $date->format('l, F j Y ');
}

function rss_date($timestamp){
  //echo 'convert datetime into human readable format ;
  $date = new DateTime($timestamp);
// -> single arrow like . in javascript
// search in php.net for syntax use return can be store in data
  //echo $date->format('l, F j Y ');
  return $date->format('r');
}

// Count the number of comments on any posts, post_id int. any valid post id
// $one is string text to show if theres one comments
// $many is string text to show if there's many or zero comment
function count_comments($post_id, $one = ' comment', $many = ' comments'){
  global $db; //pull the global database from global variable if statement is used, define it
  //query
  $query = "SELECT COUNT(*) AS total
            FROM comments
            WHERE post_id = $post_id";
  //run it
  $result = $db->query($query);
  //check it
  if($result->num_rows >= 1){
    while($row = $result->fetch_assoc()){
      //display the count with correct grammar
      if($row['total'] == 1){
        echo "(" . $row['total'] . ")" . $one;
      }else{
        echo "(" . $row['total'] . ")" . $many;
      }

    }//end while loop

  }//end if statement

}//end count_comments

//helper function to clean string data before sending it to $DB
function clean_string($dirty){
  global $db;
  return mysqli_real_escape_string($db, filter_var($dirty, FILTER_SANITIZE_STRING));
}
function clean_email($dirty){
  global $db;
  return mysqli_real_escape_string($db, filter_var($dirty, FILTER_SANITIZE_EMAIL));
}
function clean_int($dirty){
  global $db;
  return mysqli_real_escape_string($db, filter_var($dirty, FILTER_SANITIZE_NUMBER_INT));
}
function clean_boolean($dirty){
  global $db;
  $clean = mysqli_real_escape_string($db, filter_var($dirty, FILTER_SANITIZE_NUMBER_INT));
  //if the value is null change it to 0
  if($clean != 1){
    $clean = 0;
  }
  return $clean;
}

// diplsy the html for success or error messages, with a list of error if needed
function show_feedback($message, $list){
  if(isset($message)){
    ?>
    <div class="feedback">
      <b><?php echo $message; ?></b>

      <?php
      //if the list not Empty
      if(!empty($list)){
      ?>
      <ul>
        <?php foreach($list as $item){ ?>
        <li><?php echo $item; ?></li>
        <?php } ?>
      </ul>
      <?php } //empty? ?>

    </div>
    <?php
  }//if isset
}//show_feedback function

//Display a dropdown menu of all categories //$current = int. the category_id that you want to make 'selected' (optional)
function category_dropdown($current = 0){
  global $db;
  $query ="SELECT * FROM categories";
  $result = $db->query($query);
  if($result->num_rows >= 1){

  ?>
  <select name="category_id" id="the_cat">

    <?php
    while( $row = $result->fetch_assoc()){
      ?>
    <option value="<?php echo $row['category_id']; ?>" <?php if($current == $row['category_id']){ echo 'selected';}//make the selected box ?> >
      <?php echo $row['name']; ?>
    </option>

    <?php } ?>
    </select>

  <?Php

}else{
  echo 'No Categories to Show';
}//end if check stament

}
//not close with function
