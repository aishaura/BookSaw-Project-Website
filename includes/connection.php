<?php
// includes/connection.php

// ⚠️ GANTI TEKS DI BAWAH INI DENGAN DATA YANG ANDA SALIN DARI SUPABASE
define('SUPABASE_URL', 'https://pswegqrfyqighdgpzrpi.supabase.co');
define('SUPABASE_ANON_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InBzd2VncXJmeXFpZ2hkZ3B6cnBpIiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODA5ODE5MTYsImV4cCI6MjA5NjU1NzkxNn0.bY33Y8dWigWjAbRVjyaar14-Pa1GpKfj-hWvBwb7pUQ');

/**
 * Fungsi global untuk berinteraksi dengan Supabase REST API
 * Mendukung GET, POST, PATCH, dan DELETE
 */
function supabase_request($endpoint, $method = 'GET', $data = null, $custom_headers = []) {
    $url = SUPABASE_URL . '/rest/v1/' . $endpoint;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $headers = [
        'apikey: ' . SUPABASE_ANON_KEY,
        'Authorization: Bearer ' . SUPABASE_ANON_KEY,
        'Content-Type: application/json'
    ];
    
    // Satukan header kustom jika ada
    $headers = array_merge($headers, $custom_headers);
    
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers[] = 'Prefer: return=representation';
    } elseif ($method === 'PATCH') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers[] = 'Prefer: return=representation';
    } elseif ($method === 'DELETE') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $headers[] = 'Prefer: return=representation';
    } else {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    }
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    if (curl_errno($ch)) {
        error_log('Supabase Error: ' . curl_error($ch));
        curl_close($ch);
        return [];
    }
    
    curl_close($ch);
    
    // Ubah data JSON dari Supabase menjadi Array PHP yang siap pakai
    return json_decode($response, true);
}

/**
 * Fungsi legacy untuk kompatibilitas data
 */
function fetch_supabase_data($endpoint) {
    return supabase_request($endpoint, 'GET');
}