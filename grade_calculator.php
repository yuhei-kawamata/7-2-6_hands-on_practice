<?php

// 学生データの定義
$students = [
    ["name" => "田中太郎", "score" => 85],
    ["name" => "佐藤花子", "score" => 92],
    ["name" => "鈴木一郎", "score" => 78],
    ["name" => "高橋美咲", "score" => 65],
    ["name" => "伊藤健太", "score" => 58],
];


// 成績判定ロジックの定義
function getGrade($score)
{
    if ($score >= 90) {
        return ["grade" => "A", "status" => "優秀"];
    } elseif ($score >=80) {
        return ["grade" => "B", "status" => "良好"];
    } elseif ($score >= 70) {
        return ["grade" => "C", "status" => "普通"];
    } elseif ($score >=60) {
        return ["grade" => "D", "status" => "要努力"];
    } else {
        return ["grade" => "F", "status" => "不合格"];
    }
}

$pass_count = 0;
$fail_count = 0;
$total_score = 0;

echo "<h1>成績判定システム</h1><br>";
echo "<h2>【個別成績】</h2><br>";

// 各学生の成績を処理
foreach ($students as $student) {
    $name = $student["name"];
    $score = $student["score"];
    $result = getGrade($score);
    $grade = $result["grade"];
    $status = $result["status"];


    // 合格・不合格者数のカウント
    if ($score >= 60) {
        $pass_count++ ;
    } else {
        $fail_count++ ;
    }

    // 合計点の集計
    $total_score += $score;

    // 結果の表示
    echo "{$name}： {$score}点 - 評価：{$grade}（{$status}）<br>";
}

// 平均点の計算
$average = $total_score / count($students);

echo "<h2>【統計情報】</h2>";
echo "合格者数： {$pass_count}人<br>";
echo "不合格者数： {$fail_count}人<br>";
echo "平均点：" . number_format($average, 1) . "点<br>"; 
