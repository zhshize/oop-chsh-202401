<?php include '../templates/layouts/header.php'; ?>

<div class="container">
    <h1>歡迎來到貓咪商店</h1>
    <hr />

    <div class="d-flex flex-wrap mb-4">
        <?php foreach ($allItems as $item) { ?>
            <div class="card m-1" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/view.php?id=<?= $item['id'] ?>">
                            <?= $item['name'] ?>
                        </a>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $item['id'] ?></h6>
                    <p class="card-text text-end text-danger"><strong>$<?= $item['price'] ?></strong></p>
                </div>
            </div>
        <?php } ?>
    </div>

    <h1>購物車</h1>
    <hr />
    <?php if (count($cart) === 0) { ?>
        <p class="text-secondary">目前購物車為空</p>
    <?php } else { ?>
        <div class="d-flex flex-wrap mb-4">
            <?php foreach ($cart as ['item' => $item, 'amount' => $amount]) { ?>
                <div class="card mb-1 w-100">
                    <div class="card-body row">
                        <h5 class="card-title col-8">
                            <a href="/view.php?id=<?= $item['id'] ?>">
                                <?= $item['name'] ?>s
                            </a>
                            <span class="ml-2 text-body-secondary text-sm"><?= $item['id'] ?></h6>
                        </h5>
                        <div class="col-2 text-end">
                        $<?= $item['price'] ?> &times; <?= $amount ?> 個
                        </div>
                        <div class="col-2 text-end"> = <span class="text-danger">$<?= $item['price'] * $amount ?></span></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>

<?php include '../templates/layouts/footer.php';
