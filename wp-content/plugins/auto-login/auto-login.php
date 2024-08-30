<?php
/*
Plugin Name: Custom Auto Login By Median
Description: Automatically logs in users via data received from React.
Version: 1.0
Author: Median
*/

// Your JavaScript and PHP code from the previous steps goes here

function enqueue_custom_scripts() {
  ?>
  <script>
    window.addEventListener('message', function(event) {
      // Ensure the message is coming from the trusted origin
      if (event.origin !== 'http://localhost:5173/website/landing-page/82/v2') return;

      const { username, password } = event.data;
      if (username && password) {
        // Send AJAX request to WordPress to log in
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/wp-headless/server/wp-admin/admin-ajax.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Prepare data for sending
        const params = 'action=auto_login&username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password);

        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);

            if (response.status === 'success') {
              // Redirect to WordPress dashboard or desired page after login
              window.location.href = 'http://localhost/wp-headless/server/wp-admin/';
            } else {
              console.error('Login failed:', response.message);
            }
          }
        };

        xhr.send(params);
      }
    });
  </script>
  <?php
}

add_action('wp_footer', 'enqueue_custom_scripts');

function handle_auto_login() {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $creds = array(
      'user_login'    => sanitize_text_field($_POST['username']),
      'user_password' => sanitize_text_field($_POST['password']),
      'remember'      => true,
    );

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
      echo json_encode(['status' => 'error', 'message' => $user->get_error_message()]);
    } else {
      echo json_encode(['status' => 'success', 'message' => 'Login successful!']);
    }
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid credentials.']);
  }
  wp_die(); // Important to end the AJAX request properly
}

add_action('wp_ajax_nopriv_auto_login', 'handle_auto_login');
add_action('wp_ajax_auto_login', 'handle_auto_login');
?>
