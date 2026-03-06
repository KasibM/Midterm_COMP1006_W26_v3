<?php
//connect to db
require "connect.php";

//build sql query to show all
$sql = "SELECT * FROM reviews ORDER BY author";

//prepare the sql query
$stmt = $pdo->prepare($sql);

//execute the query
$stmt->execute();

//fetch query results
$reviews = $stmt->fetchALL();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <h1>Admin</h1>
    <p>All reviews</p>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($review['id']); ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($review['title']); ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($review['author']); ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($review['rating']); ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($review['review_text']); ?>
                    </td>
                    <td>
                        <!-- converts YYYY-MM-DD to Month (short) day, year -->
                        <?= htmlspecialchars(date("M d, Y", strtotime($review['created_at']))); ?>
                    </td>
                    <td>
                    <a
                        class="btn btn-secondary"
                        href="update.php?id=<?= urlencode($review['id']); ?>">
                        Update
                    </a>

                    <a
                        class="btn btn-secondary"
                        href="delete.php?id=<?= urlencode($review['id']); ?>"
                        onclick="return confirm('Please confirm deletion of this review.');">
                        Delete
                    </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>





    <a href="index.php">Back</a>
</body>

</html>