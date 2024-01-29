<?php include '../templates/layouts/header.php'; ?>

<div class="container">
    <h1>歡迎來到貓咪商店</h1>
    <a href="/">回首頁</a>
    <hr />

    <h2><?= $item['name'] ?></h2>
    <hr />
    <p>商品編號：<?= $item['id'] ?></p>
    <p class="text-danger text-xl">$<?= $item['price'] ?></p>

    <form method="post" action="/add_to_cart.php">
        <input name="id" type="hidden" value="<?= $item['id'] ?>">
        <div class=input-group>
        <label for="amount-select" class="input-group-text">選擇數量</label>
        <select name="amount" id="amount-select" class="form-select" aria-label="Select amount">
            <option selected value="1">1</option>
            <?php foreach (range(2, 20) as $num) { ?>
                <option value="<?= $num ?>"><?= $num ?></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary">加入購物車</button>
        </div>
    </form>

</div>

<?php include '../templates/layouts/footer.php';
