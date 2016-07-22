<?php
$correctHtml = Array('<div>', '<div>', '<h1>', '</h1>', '<ul>', '<li>', '</li>', '</ul>', '</div>', '</div>');
$incorrectHtml = Array('<div>', '<div>', '<h1>', '</h1>', '<ul>', '<li>', '</ul>', '</div>', '</div>');
$incorrectTagHtml = Array('<div>', '<div', '<h1>', '</h1>', '<ul>', '<li>', '</ul>', '</div>', '</div>');

function isCorrectHtml($tags) 
{
    $queue = [];

    foreach($tags as $tag) 
    {
        if(!isCorrectTag($tag)) return false;
        
        if(isClosingTag($tag)) 
        {
            if($tag != end($queue)) 
            {
                return false;
            } else {
                array_pop($queue);
            }
        } else {
            $queue[] = getClosingTag($tag);
        }
    }
    return true;
}

function isCorrectTag($tag)
{
    if(preg_match('/\A<\/?.+>\z/', $tag)) return true;

    return false;
}

function isClosingTag($tag) 
{
    if($tag[1] == '/') return true;

    return false;
}

function getClosingTag($tag)
{
    return substr_replace($tag, '/', 1, 0);
}

print isCorrectHtml($correctHtml) . PHP_EOL;
print !isCorrectHtml($incorrectHtml) . PHP_EOL;
