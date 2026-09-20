<?php
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function redirect($url) {
    header("Location: $url");
    exit;
}

function user_logged_in() {
    return isset($_SESSION['user_id']);
}

function admin_logged_in() {
    return isset($_SESSION['admin_id']);
}

function require_user() {
    if (!user_logged_in()) {
        redirect("login.php");
    }
}

function require_admin() {
    if (!admin_logged_in()) {
        redirect("login.php");
    }
}

function cart_count() {
    return isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
}

function get_shop($conn) {
    $result = $conn->query("SELECT * FROM shop_settings WHERE id=1 LIMIT 1");
    return $result ? $result->fetch_assoc() : [];
}
?>