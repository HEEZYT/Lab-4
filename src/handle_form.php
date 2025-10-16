<?php
if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    $errors = [];

    if (trim($name) === '') {
        $errors[] = "Поле 'Ім'я' не можу бути порожнім.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Введіть коректний email";
    }

    if ($errors) {
        echo "<p class='error'>Виникли помилки:</p><ul>";
        foreach ($errors as $err) {
            echo "<li>" . htmlspecialchars($err) . "</li>";
        }
        echo "</ul><a href='form.html'>Назад до форми</a>";
    } else {
        echo "<p>Дякуємо, <b>" . htmlspecialchars($name) . "</b>!</p>";
        echo "<p>Ми зв'яжемося з вами на <b>" . htmlspecialchars($email) . "</b>!</p>";
    }
} else {
    echo "Будь ласка, відкрийте <a href='form.html'>форму</a>";
}
?>