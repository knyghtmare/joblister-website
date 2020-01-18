<?php include_once 'config/init.php'; ?>

<?php

$job = new Job;
$template = new Template('templates/frontpage.php');

$category = isset( $GET['category'] ) ? $GET_['category'] : null;

if ($category) {
    // code...
    $template->jobs = $job->getByCategory($category);
    $template->title = "Jobs in ".$job->getCategory($category)->name;
    $template->cat = $category;
} else {
    // code...
    $template->title = "Latest Job";
    $template->jobs = $job->getAllJobs();
}

$template->categories = $job->getCategories();

echo $template;
 ?>
