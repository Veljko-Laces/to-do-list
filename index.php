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
        <div class="todo">
            <div class="checkbox">
                <input type="checkbox">
                <p class="task-checkbox done">manger</p>
            </div>
            <div class="delete-btn">
                🗑️
            </div>
        </div>
        <div class="todo">
            <div class="checkbox">
                <input type="checkbox">
                <p class="task-checkbox">manger</p>
            </div>
            <div class="delete-btn">
                🗑️
            </div>
        </div>
    </div>
</body>
</html>