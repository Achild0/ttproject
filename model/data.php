<?php
    function addBanIp($ip) {
        $pdo = new PDO('mysql:host=localhost;dbname=ton_database', 'ton_user', 'ton_password');
        $stmt = $pdo->prepare("INSERT INTO banned_ips (ip_address) VALUES (:ip)");
        $stmt->execute(['ip' => $ip]);
    }
?>