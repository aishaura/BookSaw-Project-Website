<?php
include_once 'includes/connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = supabase_request('buku?id=eq.' . rawurlencode($id), 'DELETE');
    
    if ($res && !isset($res['error'])) {
        header("location: admin.php");
        exit();
    } else {
        echo "Error deleting record from Supabase: " . json_encode($res);
    }
} else {
    echo "ID tidak disediakan!";
}
?>