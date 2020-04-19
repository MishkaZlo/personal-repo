<?php

class Publication
{
    public $id;
    public $title;
    public $date;
    public $short_content;
    public $content;
    public $preview;
    public $author;
    public $type;

    public function __construct($row)
    {
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->date = $row['date'];
        $this->short_content = $row['short_content'];
        $this->content = $row['content'];
        $this->preview = $row['preview'];
        $this->author = $row['author'];
        $this->type = $row['type'];
    }
}

class NewsPublication extends Publication
{
    public function printItem()
    {
        echo '<br />  НОВОСТЬ: ' . $this->title;
        echo '<br /> ДАТА: ' . $this->date;
        echo '<hr>';
    }
}

;

class ArticlePublication extends Publication
{
    public function printItem()
    {
        echo '<br />  СТАТЬЯ: ' . $this->title;
        echo '<br /> АВТОР: ' . $this->author;
        echo '<hr>';
    }
}

class PhotoPublication extends Publication
{
    public function printItem()
    {
        echo '<br /> фотоотчет: ' . $this->title;
        echo '<br /> <img src= "' . $this->preview . '">';
        echo '<hr>';
    }
}

;
?>