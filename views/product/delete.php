<h1>Delete  Product</h1>
<h1>Are you Sure you Want To Delete This  Product</h1>

<form method="post" action="?action=delete_product">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $product->getName() ?>">
    </div>
    <div>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?= $product->getPrice() ?>">
    </div>
    <input type="hidden" name="id" value="<?= $product->getId() ?>">
    <button name="delete" >Delete</button>
    <button name="notdelete" > NO</button>

</form>

