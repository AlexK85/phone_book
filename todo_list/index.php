<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo-list</title>
    <style>
        .todo-list {
            list-style-type: none;
        }

        input:checked + span {
            text-decoration: line-through;
        }

        .task-expired {
            color: red;
        }

        button {
            width: 30px;
            height: 28px;
        }
    </style>
</head>
<body>
    <h1>Задачи</h1>
    <form action="">
        <ul class='todo-list'>
            <?php
                require_once "functions.php";

                $tasks = [
                    [
                        'name' => 'Купить хлеба',
                        'isDone' => false,
                    ],
                    [
                        'name' => 'Убрать в квартире',
                        'isDone' => false,
                    ],
                    [
                        'name' => 'Вынести мусор',
                        'isDone' => true,
                    ],
                    [
                        'name' => 'Еще что-то',
                        'isDone' => true,
                    ],
                ];

                foreach ($tasks as $task) {
                    echo renderTask($task['name'], $task['isDone']);
                }
            ?>
        </ul>
    </form>
    <form action="">
        <input type="text">
        <input type="submit" value='Добавить задачу'>
    </form>
</body>
</html>