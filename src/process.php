<?php
require __DIR__ . '/../vendor/autoload.php';

use Respect\Validation\Validator as valid;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    $errors = [];

    if (!valid::stringType()->notEmpty()->validate($name)) {
        $errors[] = "Поле 'Ім'я' не може бути порожнім.";
    }
    if (!valid::email()->validate($email)) {
        $errors[] = "Введіть коректний email.";
    }

    if ($errors) {
        echo "<p class='error'>Виникла помилка:</p><ul>";
        foreach ($errors as $err) {
            echo "<li>" . htmlspecialchars($err) . "</li>";
        }
        echo "</ul><a href='../public/form.html'>Назад до форми</a>";
    } else {
        echo "<p>Дякуємо, <b>" . htmlspecialchars($name) . "</b>!</p>";
        echo "<p>Ми зв'яжемося з вами на <b>" . htmlspecialchars($email) . "</b>.</p>";
    }
} else {
    echo "Будь ласка, відкрийте <a href='../public/form.html'>форму</a>";
}
?>
