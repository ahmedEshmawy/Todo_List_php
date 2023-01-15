<?php
session_start();
require "core/dbConnect.php";

$sql = "SELECT * FROM `tasks`";
$result = $conn->query($sql);
include "inc/header.php";
?>

<div class="continer">

    <div class="col-6 m-auto">
        <h2 class="display-4 text-center"> ToDo List</h2>
        <!-- ===================== show add alert message ============= -->
        <?php
        if (isset($_SESSION['task_added'])) : ?>
            <div class="alert alert-success text-center">
                <?= $_SESSION['task_added']; ?>
            </div>
        <?php
        endif;
        unset($_SESSION['task_added']);
        ?>
        <!-- ===================== show delete alert message ============= -->
        <?php
        if (isset($_SESSION['delete_task'])) : ?>
            <div class="alert alert-danger text-center">
                <?= $_SESSION['delete_task']; ?>
            </div>
        <?php
        endif;
        unset($_SESSION['delete_task']);
        ?>
        <!-- ===================== show update alert message ============= -->

        <?php
        if (isset($_SESSION['task_updated'])) : ?>
            <div class="alert alert-success text-center">
                <?= $_SESSION['task_updated']; ?>
            </div>
        <?php
        endif;
        unset($_SESSION['task_updated']);
        ?>


        <!-- ===================== show validation alert message ============= -->
        <?php


        if (isset($_SESSION['errors'])) :

            foreach ($_SESSION['errors'] as $error) :;  ?>
                <div class="alert alert-danger text-center">
                    <?= $error; ?>
                </div>
        <?php endforeach;
            unset($_SESSION['errors']);
        endif;
        ?>
        <!-- ===================== End  validation alert message ============= -->
        <form class="mt-4" action="handelers/tasks/store.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control mb-3" name="task" placeholder="Add New Task">
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-success" name="submit">
                    Add Task
                </button>
            </div>

        </form>
        <table class="table   table-bordered table-hover table-striped text-center mx-auto mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 1;
                while ($row = $result->fetch()) { ?>

                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['task'] ?></td>

                        <td>
                            <a href="edite.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>
                            <a href="handelers/tasks/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "inc/footer.php"; ?>