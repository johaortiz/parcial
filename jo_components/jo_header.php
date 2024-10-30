<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="jo_header">
    <div class="jo_logo">
        <h1>Dark Blog</h1>
    </div>
    <nav class="jo_nav">
        <a href="/index.php">Home</a>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a href="/jo_pages/jo_list_posts.php">Posts</a>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="/jo_pages/jo_create_post.php">Create Post</a>
            <?php endif; ?>
            <a href="/jo_pages/jo_logout.php">Logout</a>
        <?php else: ?>
            <a href="/jo_pages/jo_login.php">Login</a>
            <a href="/jo_pages/jo_register.php">Register</a>
        <?php endif; ?>
    </nav>
</header>