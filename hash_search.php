<?php
$categories = array(
    array('id' => 1,
          'title' => 'Обувь',
          'children'=> array(
              array('id' => 2,
                    'title' => 'Ботинки',
                    'children' => array(
                        array('id' => 3, 'title' => 'Кожа'),
                        array('id' => 4, 'title' => 'Текстиль'),
                    ),
              ),
              array('id' => 5, 'title' => 'Кроссовки',),
          )
    ),
    array('id' => 6,
          'title' => 'Спорт',
          'children' => array(
              array('id' => 7, 'title' => 'Мячи')
          )
    ),
);

function searchCategory($categories, $id)
{
    $result = '';

    foreach($categories as $category)
    {
        if($category['id'] == $id)
        {
            $result = $category['title'];
        } elseif(isset($category['children'])) {
            $result = searchCategory($category['children'], $id);
        }
        if(!empty($result)) return $result;
    }
}

print searchCategory($categories, 4) . PHP_EOL;





