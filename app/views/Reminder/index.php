<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reminder</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($data['reminders'] as $reminder): ?>
            <div class="col-md-4">
           
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($reminder['subject']); ?></h5>
                        <p class="card-text">
                            <small class="text-muted">Created at: <?php echo htmlspecialchars($reminder['created_at']); ?></small>
                        </p>
                           <a href="/reminders/create" class="btn btn-secondary">Create a new Reminder</a>
                        <a href="/reminders/update/<?php echo $reminder['id']; ?>" class="btn btn-secondary">Update</a>
                        <a href="/reminders/delete/<?php echo $reminder['id']; ?>" class="btn btn-secondary">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php require_once 'app/views/templates/footer.php' ?>
