
<h1>Courses</h1>
<li><a href="/darrebni/new-mvc/?action=log_out">Log_out</a></li>
<?php if($_SESSION['type']=='admin') {?>
<li><a href="/darrebni/new-mvc/?action=create_course">Create Course</a></li>
<?php }?>
<br><br>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $course->getId() ?></td>
                <td><?= $course->getName() ?></td>
                <td><?= $course->getPrice() ?></td>
                <td>
                <?php if($_SESSION['type']=='user') {?>

                    <form method="post" action="/darrebni/new-mvc/?action=buy_course&id=<?= $course->getId() ?>">
                     <input type="hidden" name="id" value="<?= $course->getId() ?>"> 
                    <button>Buy</button>
                    </form>
                    <?php }?>
                    <?php if($_SESSION['type']=='admin') {?>

                    <form method="post" action="/darrebni/new-mvc/?action=delete_course&id=<?= $course->getId() ?>">
                        <input type="hidden" name="id" value="<?= $course->getId() ?>">
                        <button>Delete</button>
                    </form> 
                    <form method="post" action="/darrebni/new-mvc/?action=edite_course&id=<?= $course->getId() ?>">
                        <input type="hidden" name="id" value="<?= $course->getId() ?>">
                        <button>Edit</button>
                        <?php }?>

                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
