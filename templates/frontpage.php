<?php include "includes/header.php"; ?>

<div class="bs-docs-section clearfix" style="margin-top: 20px">
    <div class="jumbotron">
        <h1 class="display-3">Find A Job</h1>
        <form action="index.php" method="get">
            <select name="category" class="form-control">
                <option value="0">Choose Category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id ?>"
                        <?php echo ($category->id == $cat) ? "selected" : "" ?>><?= $category->name ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <button class="btn btn-lg btn-success" type="submit">Find</button>
        </form>

    </div>
    <h3><?= $title ?></h3>
    <?php foreach ($jobs as $job) : ?>
        <div class="row marketing">
            <div class="col-md-10">
                <h4><?= $job->job_title ?></h4>
                <p><?= $job->description ?></p>
            </div>
            <div class="col-md-2">
                <a href="job.php?id=<?= $job->id ?>" class="btn btn-secondary">View</a>
            </div>
        </div>

    <?php endforeach; ?>

</div>

<?php include 'includes/footer.php'; ?>
