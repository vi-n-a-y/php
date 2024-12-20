
// Step 1: Create Custom Table
function create_cf7_custom_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cf7_custom_submissions';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        first_name varchar(255) NOT NULL,
        last_name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone varchar(20),
        city varchar(255),
        state varchar(255),
        zip varchar(20),
        submitted_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_setup_theme', 'create_cf7_custom_table');

// Step 2: Save Submissions to Custom Table
function save_cf7_submission_to_custom_table($contact_form) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cf7_custom_submissions';
    $submission = WPCF7_Submission::get_instance();

    if ($submission) {
        $posted_data = $submission->get_posted_data();
        if (isset($posted_data['user_id']) && !empty($posted_data['user_id'])) {
            $wpdb->update(
                $table_name,
                array(
                    'first_name' => sanitize_text_field($posted_data['first-name']),
                    'last_name' => sanitize_text_field($posted_data['last-name']),
                    'email' => sanitize_email($posted_data['email']),
                    'phone' => sanitize_text_field($posted_data['phone']),
                    'city' => sanitize_text_field($posted_data['city']),
                    'state' => sanitize_text_field($posted_data['state']),
                    'zip' => sanitize_text_field($posted_data['zip']),
                ),
                array('id' => intval($posted_data['user_id']))
            );
        } else {
            $wpdb->insert(
                $table_name,
                array(
                    'first_name' => sanitize_text_field($posted_data['first-name']),
                    'last_name' => sanitize_text_field($posted_data['last-name']),
                    'email' => sanitize_email($posted_data['email']),
                    'phone' => sanitize_text_field($posted_data['phone']),
                    'city' => sanitize_text_field($posted_data['city']),
                    'state' => sanitize_text_field($posted_data['state']),
                    'zip' => sanitize_text_field($posted_data['zip']),
                )
            );
        }
    }
}
add_action('wpcf7_before_send_mail', 'save_cf7_submission_to_custom_table');

// Step 3: Admin Page
function cf7_custom_admin_page() {
    add_menu_page(
        'User Registration',
        'User Registration',
        'manage_options',
        'cf7-custom-submissions',
        'cf7_custom_page_html'
    );
}
add_action('admin_menu', 'cf7_custom_admin_page');

// Step 4: Admin Dashboard Table and Forms
function cf7_custom_page_html() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cf7_custom_submissions';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'cf7_custom_action')) {
            wp_die('Security check failed.');
        }

        if (isset($_POST['update_user']) && isset($_POST['user_id']) && !empty($_POST['user_id'])) {
            $wpdb->update(
                $table_name,
                array(
                    'first_name' => sanitize_text_field($_POST['first_name']),
                    'last_name' => sanitize_text_field($_POST['last_name']),
                    'email' => sanitize_email($_POST['email']),
                    'phone' => sanitize_text_field($_POST['phone']),
                    'city' => sanitize_text_field($_POST['city']),
                    'state' => sanitize_text_field($_POST['state']),
                    'zip' => sanitize_text_field($_POST['zip']),
                ),
                array('id' => intval($_POST['user_id']))
            );
        }

        if (isset($_POST['save_user']) && !isset($_POST['update_user'])) {
            $wpdb->insert(
                $table_name,
                array(
                    'first_name' => sanitize_text_field($_POST['first_name']),
                    'last_name' => sanitize_text_field($_POST['last_name']),
                    'email' => sanitize_email($_POST['email']),
                    'phone' => sanitize_text_field($_POST['phone']),
                    'city' => sanitize_text_field($_POST['city']),
                    'state' => sanitize_text_field($_POST['state']),
                    'zip' => sanitize_text_field($_POST['zip']),
                )
            );
        }

        if (isset($_POST['delete_user']) && isset($_POST['user_id']) && !empty($_POST['user_id'])) {
            $wpdb->delete($table_name, array('id' => intval($_POST['user_id'])));
        }

        wp_redirect(admin_url('admin.php?page=cf7-custom-submissions'));
        exit;
    }

    $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
    $items_per_page = 10;
    $offset = ($current_page - 1) * $items_per_page;

  // Handle Search Query

    $search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

    $where_clause = !empty($search_query) 

        ? $wpdb->prepare("WHERE first_name LIKE %s OR last_name LIKE %s OR email LIKE %s", "%$search_query%", "%$search_query%", "%$search_query%") 

        : '';

    $total_items = $wpdb->get_var("SELECT COUNT(*) FROM $table_name $where_clause");

    $submissions = $wpdb->get_results($wpdb->prepare(

        "SELECT * FROM $table_name $where_clause ORDER BY submitted_at DESC LIMIT %d OFFSET %d",
        $items_per_page,
        $offset
    ));

    echo '<div class="wrap">';
    echo '<h1>User Registration</h1>';
	
	echo '<form id="cf7-custom-form" method="POST" enctype="multipart/form-data">';
wp_nonce_field('cf7_custom_action');
echo '<table>';
echo '<tr>';
	echo '<input type="hidden" name="user_id" id="user_id">';
echo '<th><label for="first_name">First Name:</label></th>';
echo '<td><input type="text" name="first_name" id="first_name" required></td>';
echo '</tr>';
echo '<tr>';
echo '<th><label for="last_name">Last Name:</label></th>';
echo '<td><input type="text" name="last_name" id="last_name" required></td>';
echo '</tr>';
echo '<tr>';
echo '<th><label for="email">Email:</label></th>';
echo '<td><input type="email" name="email" id="email" required></td>';
echo '</tr>';
echo '<tr>';
echo '<th><label for="phone">Phone:</label></th>';
echo '<td><input type="text" name="phone" id="phone"></td>';
echo '</tr>';
echo '<tr>';
echo '<th><label for="city">City:</label></th>';
echo '<td><input type="text" name="city" id="city"></td>';
echo '</tr>';
echo '<tr>';
echo '<th><label for="state">State:</label></th>';
echo '<td><input type="text" name="state" id="state"></td>';
echo '</tr>';
echo '<tr>';
echo '<th><label for="zip">Zip:</label></th>';
echo '<td><input type="text" name="zip" id="zip"></td>';
echo '</tr>';
echo '</table>';
echo '<button type="submit" class="custom-reg-add-up-btn" style="background-color:#2271b1; color:white; padding:10px 20px; border:none; border-radius:5px;  margin:5px 0 0 80px;"  name="save_user"  id="submit-button" >Add User</button>';
echo '</form>';

	echo '<h2 style="text-align:center;" >Existing Submissions</h2>';
	    // Search Form

    echo '<form method="GET" action="">';

    echo '<input type="hidden" name="page" value="cf7-custom-submissions" />';

    echo '<input type="text" name="s" value="' . esc_attr($search_query) . '" placeholder="Search by name or email" />';

    echo '<button class="custom-reg-search-btn" style="background-color:#2271b1; color:white; padding:7px 20px; border:none; border-radius:5px; margin-left:5px;" type="submit">Search</button>';

    echo '</form>';

    
    echo '<table style="margin-top:10px;" class="widefat fixed" cellspacing="0">';
    echo '<thead><tr>';
    echo '<th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>City</th><th>State</th><th>Zip</th><th>Actions</th>';
    echo '</tr></thead><tbody>';

    foreach ($submissions as $submission) {
        echo '<tr>';
        echo '<td>' . esc_html($submission->id) . '</td>';
        echo '<td>' . esc_html($submission->first_name) . '</td>';
        echo '<td>' . esc_html($submission->last_name) . '</td>';
        echo '<td>' . esc_html($submission->email) . '</td>';
        echo '<td>' . esc_html($submission->phone) . '</td>';
        echo '<td>' . esc_html($submission->city) . '</td>';
        echo '<td>' . esc_html($submission->state) . '</td>';
        echo '<td>' . esc_html($submission->zip) . '</td>';
        echo '<td>';
//         echo '<button type="button" class="edit-button" data-id="' . esc_attr($submission->id) . '">Edit</button>';
echo '<button type="button" class="edit-button" data-id="' . esc_attr($submission->id) . '" style="border: none; background: transparent;  cursor: pointer;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16" style="fill: blue;">
            <path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/>
        </svg>
      </button>';
		
echo '<button type="button" class="delete-button" data-id="' . esc_attr($submission->id) . '" style="margin-left: 8px; border: none; background: transparent; padding: 10px; cursor: pointer;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="16" height="16" style="fill: red;">
            <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
        </svg>
      </button>';

                echo '<form method="POST" style="display:inline;" class="delete-form" action="' . admin_url('admin.php?page=cf7-custom-submissions') . '">';
        wp_nonce_field('cf7_custom_action');
        echo '<input type="hidden" name="user_id" value="' . esc_attr($submission->id) . '">';
        echo '<input type="hidden" name="delete_user" value="1">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';

    $pagination = paginate_links(array(
        'base' => add_query_arg('paged', '%#%'),
        'format' => '',
        'current' => $current_page,
        'total' => ceil($total_items / $items_per_page),
    ));
    echo '<div class="pagination">' . $pagination . '</div>';
    echo '</div>';
}
