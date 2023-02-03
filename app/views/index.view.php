<?php require("layouts/header.php") ;?>

<h1>Tasks:</h1>
<ul>
        <?php foreach($tasks as $task) : ?>
            <li>
            <?php if($task->completed) : ?>
                <strike><?= $task->description ?></strike>
            <?php else : ?>
                    <?= $task->description ?>
            <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h1>Submit a task</h1>

    <form action="/tasks" method="POST">
        <input type="text" name="description" />

        <button type="submit">Add</button>
    </form>

<?php require("layouts/footer.php") ;?>
