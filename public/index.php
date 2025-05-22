<?php

require_once __DIR__ . '/../vendor/autoload.php';


use Dotenv\Dotenv;
use App\Models\User;
use App\Core\Database;
use App\Builder\Director;
use App\Builder\MySqlQueryBuilder;

// تحميل ملف البيئة
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// إعداد الاتصال بقاعدة البيانات
$db = new Database();

// إنشاء الـ Builder و Director
$builder = new MySqlQueryBuilder();
$director = new Director();
$director->setBuilder($builder);

// توليد استعلام SQL باستخدام Director
$sql = $director->buildCustomQuery(
    table: 'users',
    columns: ['id', 'name', 'email', 'age', 'status'],
    conditions: [
        ['age', '>', 25],
        ['status', '=', 'active']
    ],
    limit: 5
);
echo "\n";
echo "Generated SQL:\n$sql"; 

// تنفيذ الاستعلام باستخدام PDO
$results = $db->query($sql);
$users = User::fromArray($results);
echo "<h3>Query Results:</h3><pre>";
foreach ($users as $user) {
    echo "ID: {$user->id}, Name: {$user->name}, Email: {$user->email}, Age: {$user->age}, Status: {$user->status}\n";
}
echo "</pre>";


