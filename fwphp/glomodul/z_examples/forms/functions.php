<?php
//2017.11.29
// Create nonce
if ( ! function_exists( 'create_nonce' ) ) {
    function create_nonce($action, $time) {
        $str = sprintf('%s_%s_%s', $action, $time, NONCE_SALT);
        $nonce = hash('sha512', $str);
        
        return $nonce;
    }
}

// Verify nonce
if ( ! function_exists( 'verify_nonce' ) ) {
    function verify_nonce($nonce, $action, $time) {
        $check = create_nonce($action, $time);
        
        if ( $nonce == $check ) {
            return true;
        }
        
        return false;
    }
}

// Status messages
if ( ! function_exists( 'do_messages' ) ) {
function do_messages($insert=NULL) {
  if ( is_null( $insert ) ) {
      return;   
  }
  
  $message = '<div class="message">';
    if ( $insert == true ) {
        $message .= '<p class="success">Data was inserted successfully.</p>';
    } else {
        $message .= '<p class="error">There was an error with the submission.</p>';
    }
  $message .= '</div>';
  
  
  return $message;
}
}

// Process form data
if ( ! function_exists( 'process' ) ) {
function process($post) {
    // Check nonce
    $verify = verify_nonce($post['nonce'], $post['form_action'], $post['timestamp']);
    
    if ( false === $verify ) {
        return false;
    }
    
    // Validate email
    $filter_email = filter_var($post['email'], FILTER_VALIDATE_EMAIL);
    
    if ( false === $filter_email ) {
        return false;
    }
    
    // Filter input
    $args = array(
        'name' => 'FILTER_SANITIZE_STRING',
        'frequency' => 'FILTER_SANITIZE_STRING',
        'country' => 'FILTER_SANITIZE_STRING',
        'comment' => 'FILTER_SANITIZE_STRING',
    );
    
    $filter_post = filter_var_array($post, $args);
    
    // Filter interests
    if ( ! empty ( $post['interests'] ) ) {
        foreach ( array_keys( $post['interests'] ) as $interest ) {
            $interests[] = filter_var($interest, FILTER_SANITIZE_STRING);
        }
        
        $filter_interests = serialize($interests); 
    } else {
        $filter_interests = '';
    }

    // Send to database
    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    $stmt = $mysql->prepare("
        INSERT INTO users (name,email,frequency,interests,country,comment) 
        VALUES(?,?,?,?,?,?)
    ");
    
    $stmt->bind_param("ssssss", 
        $filter_post['name'], $filter_email, $filter_post['frequency'], 
        $filter_interests, $filter_post['country'], $filter_post['comment']
    );
    
    $insert = $stmt->execute();
    
    // Close connections
    $stmt->close();
    $mysql->close();
    
    return $insert;
}
}

if ( ! function_exists( '_e' ) ) {
    function _e($string) {
        echo htmlentities($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}