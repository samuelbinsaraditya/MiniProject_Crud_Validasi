<?php
if (!isset($article)) {
    $article = (object) [
        'title' => '',
        'created_at' => '',
        'draft' => 'false',
        'content' => ''
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article->title) ?> - Berita Coding</title>
</head>
<body style="font-family: sans-serif; background-color: #f4f4f4; padding: 20px;">
    
    <div style="max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        
        <h1 style="color: teal;"><?= $article->title ?></h1>
        <p style="color: gray; font-size: 0.9em;">
            Diterbitkan pada: <?= $article->created_at ?> | Status: <?= $article->draft === 'true' ? 'Draft' : 'Published' ?>
        </p>
        <hr style="border: 1px solid #eee; margin: 20px 0;">
        
        <div style="line-height: 1.6;">
            <?= $article->content ?>
        </div>

        <br><br>
        <a href="<?= site_url('admin/post') ?>" style="display: inline-block; padding: 10px 20px; background: #e7e7e7; color: black; text-decoration: none; border-radius: 5px;">&laquo; Kembali ke Dashboard</a>
    </div>

</body>
</html>