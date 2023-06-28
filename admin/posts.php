<!DOCTYPE html>
<html>
    <title>Admin | Manage Posts</title>
    <head>
        <?php
        include_once('session_manager.php');
        include("admin_functions.php");
        include("post_functions.php");
        include("head_section.php");
        include("c_head.php");
        $posts = getAllPosts();
        ?>
        <link rel="stylesheet" href="css/posts.css">
    </head>
    <body>
        <div class="container content">
            <?php include("menu.php") ?>

            <div class="table-div">
                <?php include("messages.php") ?>

                <?php if (empty($posts)): ?>
                    <div class="alert alert-info mt-3">
                        No posts in the database.
                    </div>
                <?php else: ?>
                    <table class="table table-striped mt-3">
                        <thead class="thead-dark">
                        <th>N</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Title</th>
                        <?php if ($_SESSION['type'] == "Admin" || $_SESSION['type'] == "Maintainer" || $_SESSION['type'] == "Programmer"): ?>
                            <th><small>Publish</small></th>
                        <?php endif; ?>
                        <th><small>Edit</small></th>
                        <th><small>Delete</small></th>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $key => $post): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $post['user_id']; ?></td>
                                    <td><?php echo date("F j, Y ", strtotime($post["date"])); ?></td>
                                    <td><?php echo $post['title']; ?></td>
                                    <?php if ($_SESSION['type'] == "Admin" || $_SESSION['type'] == "Maintainer" || $_SESSION['type'] == "Programmer"): ?>
                                        <td>
                                            <?php if ($post['published'] == true): ?>
                                                <a class="btn btn-success btn-sm" href="posts.php?unpublish=<?php echo $post['id'] ?>">Unpublish</a>
                                            <?php else: ?>
                                                <a class="btn btn-info btn-sm" href="posts.php?publish=<?php echo $post['id'] ?>">Publish</a>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="create_post.php?edit-post=<?php echo $post['id'] ?>">Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="create_post.php?delete-post=<?php echo $post['id'] ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>
