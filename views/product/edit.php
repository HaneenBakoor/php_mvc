<h1>Edit Product</h1>
<form method="post" action="?action=update_product&id=<?php echo $product->getId(); ?>">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $product->getName() ?>">
    </div>
    <div>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?= $product->getPrice() ?>">
    </div>
    <input type="hidden" name="id" value="<?= $product->getId() ?>">
    <button>Update</button>
</form>