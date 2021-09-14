<?php
function createReview()
{
    echo '公演名：';
    $title = trim(fgets(STDIN));

    echo '観劇日：';
    $theater_day = trim(fgets(STDIN));

    echo '公演場所：';
    $performance_place = trim(fgets(STDIN));

    echo 'キャスト：';
    $cast = trim(fgets(STDIN));

    echo '評価：';
    $score = trim(fgets(STDIN));

    echo '3行ストーリー：';
    $story = trim(fgets(STDIN));

    echo 'この作品が一番伝えたかったこと：';
    $important_say = trim(fgets(STDIN));

    echo '' . PHP_EOL;
    echo '登録が完了しました。' . PHP_EOL;

    return [
        'title' => $title,
        'theater_day' => $theater_day,
        'performance_place' => $performance_place,
        'cast' => $cast,
        'score' => $score,
        'story' => $story,
        'important_say' => $important_say,
    ];
}

function listReview($reviews)
{
    echo '登録されている観劇ログを表示します。' . PHP_EOL . PHP_EOL;

    foreach ($reviews as $review) {
        echo '公演名：' . $review['title'] . PHP_EOL;
        echo '観劇日：' . $review['theater_day'] . PHP_EOL;
        echo '公演場所：' . $review['performance_place'] . PHP_EOL;
        echo 'キャスト：' . $review['cast'] . PHP_EOL;
        echo '評価：' . $review['score'] . PHP_EOL;
        echo '3行ストーリー：' . $review['story'] . PHP_EOL;
        echo 'この作品が一番伝えたかったこと：' . $review['important_say'] . PHP_EOL;
        echo '---------------------------------' . PHP_EOL;
    }
}

$reviews = [];

while (true) {
    echo '' . PHP_EOL;
    echo '以下のメニューから番号を入力してください。(1 or 2 or 3)' . PHP_EOL . PHP_EOL;
    echo '1. 観劇ログを登録してください。' . PHP_EOL;
    echo '2. 観劇ログを表示' . PHP_EOL;
    echo '3. アプリケーションを終了します。' . PHP_EOL;
    $number = trim(fgets(STDIN));

    if ($number == '1') {
        $reviews[] = CreateReview();
    } elseif ($number == '2' && $reviews == null) {
        echo '観劇ログは0件です。観劇ログを登録してください。' . PHP_EOL . PHP_EOL;
    } elseif ($number == '2') {
        listReview($reviews);
    } elseif ($number == '3') {
        echo 'お疲れ様でした！また新しい舞台を観に行こう！' . PHP_EOL;
        break;
    } else {
        echo '番号を正しく入力してください。' . PHP_EOL;
    }
}
