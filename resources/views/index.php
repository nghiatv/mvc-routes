<?php //echo "<pre>";var_dump($result);echo "</pre>"; exit; ?>
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('public/img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1><?php echo $title ?></h1>
                    <hr class="small">
                    <span class="subheading"><?php echo $description ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php foreach ($result as $row) : ?>
                <div class="post-preview">
                    <a href="post/<?php echo $row['id'] ?>">
                        <h2 class="post-title">
                            <?php echo $row['title'] ?>
                        </h2>
                    </a>
                    <h4 class="post-subtitle" style="font-weight: 300">
                        <span><?php echo strip_tags(substr($row['content'], 0, 200)); ?>
                            <a href="post/<?php echo $row['id'] ?>"> <span class="see-more"><h3> See more</h3></span>
                            </a>
                            </span>
                    </h4>


                    <p class="post-meta">Posted by <a href="#"><?php echo $row['user_name'] ?></a> on September 24, 2014
                    </p>
                </div>
                <hr>

            <?php endforeach; ?>
            <!-- Pager -->
            <ul class="pager">
                <?php if ($current_page > $total_page) : ?>
                    <li class="back_to_home">
                        <a style="float: left" href="<?php echo BASE_PATH ?>"> Back to homepage </a>
                    </li>
                <?php endif; ?>
                <?php if ($current_page > 1 && $current_page <= $total_page) : ?>
                    <li class="prev">
                        <a style="float: left" href="?page=<?php echo($current_page - 1) ?>">&#x2190; Newer Posts </a>
                    </li>
                <?php endif; ?>
                <?php if ($current_page < $total_page) : ?>
                    <li class="next">
                        <a href="?page=<?php echo($current_page + 1) ?>">Older Posts →</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<hr>

