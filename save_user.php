





<?php
$servername = "localhost";
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة المرور لقاعدة البيانات
$dbname = "user_data"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استلام البيانات من النموذج
$email = $_POST['email'];
$password_input = $_POST['password']; // كلمة المرور المدخلة

// التحقق مما إذا كان البريد الإلكتروني موجودًا بالفعل في قالالالاعدة البيانات
$sql_check = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    echo "البريد الإلكتروني موجود بالفعل!";
} else {
    // إدخال البيانات في قاعدة البيانات بدون تشفير كلمة المرور
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password_input')";

    if ($conn->query($sql) === TRUE) {
        echo "تم تسجيل الحساب بنجاح!";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}

// إغلاق الاتصال
$conn->close();
?> 