
<h1>Products</h1>

<li><a href="/darrebni/new-mvc/?action=create_product">Create Product</a></li>
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
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product->getId() ?></td>
                <td><?= $product->getName() ?></td>
                <td><?= $product->getPrice() ?></td>
                <td>
                    <form method="post" action="/darrebni/new-mvc/?action=edit_product&id=<?= $product->getId() ?>">
                        <button>Edit</button>
                    </form>
                    <form method="post" action="/darrebni/new-mvc/?action=delete_product&id=<?= $product->getId() ?>">
                        <!-- <input type="hidden" name="id" value="<?= $product->getId() ?>"> -->
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
