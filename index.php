<?php

use Models\Comment;
use Models\User;
use Validators\Validator;

require_once __DIR__ . '/vendor/autoload.php';

function printErrors($validator, $errors) {
    $messages = $validator->getErrorMessages($errors);
    if (empty($messages)){
        echo 'valid';
    } else {
        foreach ($messages as $message) {
            echo "<p>{$message}</p>";
        }
    }
}

$validator = new Validator();

$user1 = new User(1, 'rrr@mail.ru', 'qwerty');
$user2 = new User(2, 'some', 'qazwsx');
$user3 = new User(3, 'somemail@mail.ru', 'password1');
$user4 = new User(4, '123', '312.0');
$user5 = new User(5, 'someanother@mail.ru', 'awesomepassword');

$errors1 = $validator->validate($user1);
$errors2 = $validator->validate($user2);
$errors3 = $validator->validate($user3);
$errors4 = $validator->validate($user4);
$errors5 = $validator->validate($user5);
echo '<h1>User Validation</h1>';
echo '<p>user1</p>';
printErrors($validator, $errors1);
echo '<p>user2</p>';
printErrors($validator, $errors2);
echo '<p>user3</p>';
printErrors($validator, $errors3);
echo '<p>user4</p>';
printErrors($validator, $errors4);
echo '<p>user5</p>';
printErrors($validator, $errors5);
echo '<h1>Comments</h1>';
$comments = [
    new Comment($user1, 'Comment 1'),
    new Comment($user2, 'Comment LOng long long long long long long long'),
    new Comment($user3, 'My dog is beauty'),
    new Comment($user4, 'I hate Python 2'),
    new Comment($user5, 'I am Empty'),
];

$limitDateTime = new DateTime('2022-01-03');

foreach ($comments as $comment) {
    if ($comment->user->getCreatedAt() > $limitDateTime){
        echo "<h3>User: {$comment->getAuthor()}</h3> \n <p>{$comment->text}</p>";
    }
}

