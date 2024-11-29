<?php
// 允许跨域请求
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// 获取订单数据
$order = [
    'time' => $_GET['time'] ?? '',
    'name' => $_GET['name'] ?? '',
    'phone' => $_GET['phone'] ?? '',
    'password' => $_GET['password'] ?? '',
    'product' => $_GET['product'] ?? '',
    'quantity' => $_GET['quantity'] ?? '',
    'status' => $_GET['status'] ?? '新订单'
];

// 读取现有订单
$ordersFile = 'orders.json';
$orders = [];
if (file_exists($ordersFile)) {
    $orders = json_decode(file_get_contents($ordersFile), true) ?? [];
}

// 添加新订单
$orders[] = $order;

// 保存订单
file_put_contents($ordersFile, json_encode($orders));

// 返回成功响应
echo json_encode(['success' => true]); 