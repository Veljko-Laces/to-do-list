<?php

session_start();

if (!isset($_SESSION['TODOS'])) {
    $_SESSION['TODOS'] = array();
}

$idAleatoire = bin2hex(random_bytes(16));

$tache = isset($_POST['tache']) ? $_POST['tache'] : "";

if ($tache) {
    $taskExists = false;
    foreach ($_SESSION['TODOS'] as $todo) {
        if ($todo['text'] == $tache) {
            $taskExists = true;
            break;
        }
    }

    if (!$taskExists) {
        $newTodo = array(
            "id" => $idAleatoire,
            "text" => $tache,
            "done" => false
        );
        $_SESSION['TODOS'][] = $newTodo;
    }
}

function displayTodos() {
    foreach ($_SESSION['TODOS'] as $todo) {
        $doneClass = $todo["done"] ? 'done' : '';
        echo '
            <div class="todo">
                <form method="GET" class="checkbox">
                    <p class="task-checkbox ' . $doneClass . '">' . $todo["text"] . '</p>
                </form>
                <form method="GET" action="" class="delete-form">
                    <input type="hidden" name="delete_id" value="' . $todo["id"] . '">
                    <button type="submit" class="delete-btn">🗑️</button>
                </form>
            </div>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['delete_id'])) {
        deleteTodo($_GET['delete_id']);
    }
}

function deleteTodo($id) {
    foreach ($_SESSION['TODOS'] as $index => $todo) {
        if ($todo['id'] === $id) {
            unset($_SESSION['TODOS'][$index]);
            $_SESSION['TODOS'] = array_values($_SESSION['TODOS']);
            return;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>to-do-list</title>
    <link rel="stylesheet" href="./asset/style.css">
</head>
<body>
    <h1>To Do List</h1>
    <form action="" method="post">
        <input type="text" id="tache" name="tache" placeholder="Ajouter une tâche" class="task-input"/>
        <button type="submit" class="add-btn">+</button>
    </form>
    <div class="todos">
        <?= displayTodos() ?>
    </div>
</body>
</html>