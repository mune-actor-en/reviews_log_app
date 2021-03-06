<?php
require_once __DIR__ . '/lib/mysqli.php';

/* 読書ログの実装 */

function createReview($link, $review)
{
    $sql = <<<EOT
INSERT INTO reviews (
    title,
    author,
    status,
    score,
    summary
) VALUES (
    "{$review['title']}",
    "{$review['author']}",
    "{$review['status']}",
    "{$review['score']}",
    "{$review['summary']}"
)
EOT;
    $result = mysqli_query($link, $sql);
    if (!$result) {
        error_log('Error: fail to create review');
        error_log('Debugging Error: ' . mysqli_error($link));
    }
}

  function validate($review){
    $errors = [];
    // 書籍名が正しく入力されているかチェック
    if(!strlen($review['title'])){
      $errors['title'] = '書籍名を入力してください。';
    } elseif (strlen($review['title']) > 255){
      $errors['title'] = '書籍名は255文字以内で入力してください。';
    }

    // 著者名が正しく入力されているかチェック
    if(!strlen($review['author'])){
      $errors['author'] = '著者名を入力してください。';
    } elseif(strlen($review['author']) > 100){
      $errors['author'] = '著者名は100文字以内で入力してください。';
    }

    // 読書状況が正しく入力されているかチェック
    if(!in_array($review['status'], ['未読', '読んでる', '読了'])){
      $error['status'] = '読書状況は「未読」「読んでる」「読了」のいずれかを入力してください。';
    }

    // 評価が正しく入力されているかチェック
    if(!strlen($review['score'] < 1 || $review['score'] > 5)){
      $error['score'] = '評価は1〜5の整数を入力してください。';
    }

    // 感想が正しく入力されているかチェック
    if(!strlen($review['summary'])){
      $error['summary'] = '感想を入力してください。';
    } elseif(strlen($review['summary'] > 1000)){
      $error['summary'] = '感想は10,000文字以内で入力してください。';
    }

    return $errors;
  }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // status（読書状況）が未入力のときに $_POST['status'] を呼び出しのエラー対策
  $status = '';
  if(array_key_exists('status', $_POST)){
    $status = $_POST['status'];
  }

  $review = [
      'title' => $_POST['title'],
      'author' => $_POST['author'],
      'status' => $_POST['status'],
      'score' => $_POST['score'],
      'summary' => $_POST['summary']
  ];
    // バリデーション処理を追加
    $errors = validate($review);

    if( !count($errors)){
      $link = dbConnect();
      createReview($link, $review);
      mysqli_close($link);
      header("Location: index.php");
    }

}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>読書ログ登録</title>
</head>

<body>
    <h1>読書ログ</h1>
    <form action="create.php" method="post">
        <?php if (count($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div>
            <label for="title">書籍名</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="author">著者名</label>
            <input type="text" name="author" id="author">
        </div>
        <div>
            <label>読書状況</label>
            <div>
                <div>
                    <input type="radio" name="status" id="status1" value="未読">
                    <label for="status1">未読</label>
                </div>
                <div>
                    <input type="radio" name="status" id="status2" value="読んでる">
                    <label for="status2">読んでる</label>
                </div>
                <div>
                    <input class="form-check-input" type="radio" name="status" id="status3" value="読了">
                    <label for="status3">読了</label>
                </div>
            </div>
        </div>
        <div>
            <label for="score">評価（5点満点の整数）</label>
            <input type="number" name="score" id="score">
        </div>
        <div>
            <label for="summary">感想</label>
            <textarea type="text" name="summary" id="summary" rows="10"></textarea>
        </div>
        <button type="submit">登録する</button>
    </form>
</body>

</html>
