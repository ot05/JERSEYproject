<?php
$members = [
    [
        "fullname" => "Omar",
        "Age" => "24",
        "nationality" => "Morocco",
    ],
    [
        "fullname" => "Othmane",
        "Age" => "18",
        "nationality" => "Morocco",
    ],
    [
        "fullname" => "Marwan",
        "Age" => "18",
        "nationality" => "Morocco",
    ],
]
?>
<?php foreach ($members as $member) { ?>
    <div>
        <p>full Name : <?= $member["fullname"] ?></p>
        <p>Age : <?= $member["Age"] ?></p>
        <p>nationality : <?= $member["nationality"] ?></p>
    </div>
<?php } ?>