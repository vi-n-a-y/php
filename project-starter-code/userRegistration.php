
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

    $total_items = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
    $submissions = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM $table_name ORDER BY submitted_at DESC LIMIT %d OFFSET %d",
        $items_per_page,
        $offset
    ));

    echo '<div class="wrap">';
    echo '<h1>User Registration</h1>';

    echo '<form id="cf7-custom-form" method="POST">';
    wp_nonce_field('cf7_custom_action');
    echo '<input type="hidden" name="user_id" id="user_id">';
    echo '<input type="text" name="first_name" id="first_name" placeholder="First Name" required>';
    echo '<input type="text" name="last_name" id="last_name" placeholder="Last Name" required>';
    echo '<input type="email" name="email" id="email" placeholder="Email" required>';
    echo '<input type="text" name="phone" id="phone" placeholder="Phone">';
    echo '<input type="text" name="city" id="city" placeholder="City">';
    echo '<input type="text" name="state" id="state" placeholder="State">';
    echo '<input type="text" name="zip" id="zip" placeholder="Zip">';
    echo '<button type="submit" name="save_user" id="submit-button">Add User</button>';
    echo '</form>';

    echo '<h2>Existing Submissions</h2>';
    echo '<table class="widefat fixed" cellspacing="0">';
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
        echo '<button type="button" class="edit-button" data-id="' . esc_attr($submission->id) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16" style="fill: blue;">
            <path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/>
        </svg></button>';
        echo '<button type="button" class="delete-button" data-id="' . esc_attr($submission->id) . '" style="margin-left: 8px;">Delete</button>';
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
