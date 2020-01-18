<?php include "includes/header.php"; ?>

<h2 class="page-header">Create Job Listing</h2>
<form action="edit.php?id=<?= $job->id ?>" method="post">
    <div class="form-group">
        <label for="">Company</label>
        <input type="text" class="form-control" name="company" value="<?= $job->company ?>">
    </div>

    <div class="form-group">
        <label for="">category</label>
        <select name="category_id" class="form-control">
            <option value="0">Choose Category</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category->id ?>"
                    <?php echo ($category->id == $job->category_id) ? "selected" : "" ?>><?= $category->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="">Job Title</label>
        <input type="text" class="form-control" name="job_title" value="<?= $job->job_title ?>">
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <textarea class="form-control" name="description"><?= $job->description ?></textarea>
    </div>

    <div class="form-group">
        <label for="">Location</label>
        <input type="text" class="form-control" name="location" value="<?= $job->location ?>">
    </div>

    <div class="form-group">
        <label for="">Salary</label>
        <input type="text" class="form-control" name="salary" value="<?= $job->salary ?>">
    </div>

    <div class="form-group">
        <label for="">Contact User</label>
        <input type="text" class="form-control" name="contact_user" value="<?= $job->contact_user ?>">
    </div>

    <div class="form-group">
        <label for="">Contact Email</label>
        <input type="email" class="form-control" name="contact_email" value="<?= $job->contact_email ?>">
    </div>

    <button class="btn btn-primary" name="submit" type="submit">Submit</button>
</form>

<?php include "includes/footer.php"; ?>
