<?php
$page_title="Products";require_once "header.php";
$result=$conn->query("SELECT * FROM products ORDER BY id DESC");
?>
<div class="d-flex justify-content-between align-items-center mb-4"><h1>Products</h1><a class="btn btn-dark" href="add_product.php">+ Add Product</a></div>
<div class="table-responsive"><table class="table bg-white align-middle"><thead><tr><th>Image</th><th>Name</th><th>Category</th><th>Price</th><th>Stock</th><th>Action</th></tr></thead><tbody>
<?php while($p=$result->fetch_assoc()): ?><tr><td><img src="../assets/images/products/<?= e($p['image']) ?>" width="70" height="55" style="object-fit:cover;border-radius:8px"></td><td><?= e($p['name']) ?></td><td><?= e($p['category']) ?></td><td>₹<?= number_format($p['price'],2) ?></td><td><?= (int)$p['stock'] ?></td><td><a class="btn btn-sm btn-outline-dark" href="edit_product.php?id=<?= (int)$p['id'] ?>">Edit</a> <a class="btn btn-sm btn-outline-danger" href="delete_product.php?id=<?= (int)$p['id'] ?>" onclick="return confirm('Delete this product?')">Delete</a></td></tr><?php endwhile; ?>
</tbody></table></div>
<?php require_once "footer.php"; ?>