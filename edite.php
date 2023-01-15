<?php
require "core/dbConnect.php";

$id = $_GET['id'];
$sql = "SELECT * FROM `tasks` WHERE `id`='$id' ";
$result = $conn->query($sql);
$row = $result->fetch();

include "inc/header.php";
?>

<div class="continer">

    <div class="col-8 m-auto">
        <h2 class="display-4 text-center">My ToDo List</h2>
        <form class="mt-4" action="handelers/tasks/update.php?id=<?php echo $row['id'] ?>" method="POST">
            <div class="form-group">
                <input type="text" class="form-control mb-3" name="task" value="<?php echo $row['task'] ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-success" name="submit">
                    Save Task
                </button>
            </div>

        </form>

    </div>
</div>
<?php include "inc/footer.php"; ?>