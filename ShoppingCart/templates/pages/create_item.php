<?php include '../templates/layouts/header.php'; ?>

<div class="container">
    <h1>歡迎來到貓咪商店</h1>
    <a href="/">回首頁</a>
    <hr />

    <h2>上架新商品</h2>
    <hr />

    <form method="post" action="/store_item.php">
        <div class="mb-3">
            <label for="name-input" class="form-label">商品名稱</label>
            <input type="text" class="form-control" id="name-input" name="name">
        </div>
        <div class="mb-3">
            <label for="price-input" class="form-label">商品價格</label>
            <input type="number" step="1" class="form-control" id="price-input" name="amount">
        </div>
        <button type="submit" class="btn btn-primary">上架商品</button>
</div>
</form>

</div>

<?php include '../templates/layouts/footer.php';
