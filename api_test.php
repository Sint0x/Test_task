<?php
require_once 'methods.php';

$api = new JsonPlaceholderAPI();

try {
    // Получить пользователей
    $users = $api->get_users();
    echo "Пользователи:\n$users\nУспешно получены пользователи.\n";
} catch (Exception $e) {
    echo 'Ошибка при получении пользователей: ',  $e->getMessage(), "\n";
}

try {
    // Получить посты пользователя с ID 1
    $posts = $api->get_posts(1);
    echo "\nПосты пользователя с ID 1:\n$posts\nУспешно получены посты пользователя.\n";
} catch (Exception $e) {
    echo 'Ошибка при получении постов пользователя: ',  $e->getMessage(), "\n";
}

try {
    // Получить задания пользователя с ID 1
    $todos = $api->get_todos(1);
    echo "\nЗадания пользователя с ID 1:\n$todos\nУспешно получены задания пользователя.\n";
} catch (Exception $e) {
    echo 'Ошибка при получении заданий пользователя: ',  $e->getMessage(), "\n";
}

try {
    // Добавить новый пост от пользователя с ID 1
    $new_post = $api->add_post(1, 'Новый пост', 'Это содержимое нового поста');
    echo "\nДобавлен новый пост:\n$new_post\nУспешно добавлен новый пост.\n";
} catch (Exception $e) {
    echo 'Ошибка при добавлении нового поста: ',  $e->getMessage(), "\n";
}

try {
    // Редактировать пост с ID 1
    $edited_post = $api->edit_post(1, 'Обновленный пост', 'Это обновленное содержимое поста');
    echo "\nРедактирование поста с ID 1:\n$edited_post\nУспешно отредактирован пост.\n";
} catch (Exception $e) {
    echo 'Ошибка при редактировании поста: ',  $e->getMessage(), "\n";
}

try {
    // Удалить пост с ID 1
    $deleted = $api->delete_post(1);
    if ($deleted) {
        echo "Пост с ID 1 успешно удален\n";
    } else {
        throw new Exception("Не удалось удалить пост");
    }
} catch (Exception $e) {
    echo 'Ошибка при удалении поста: ',  $e->getMessage(), "\n";
}
?>
