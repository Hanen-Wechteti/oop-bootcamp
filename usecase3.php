<?php
// We are preparing three types of content for a website:

// Articles
// Ads
// Vacancies
// All of those have a title and text. When showing the title,
//  they are modified as follows: articles remain as they are, ads are shown in all caps and vacancies are appended with " - apply now!".
//   The original title should still be retrievable, so no modification is permanent.

// Have an array with two articles, one ad and one vacancy. Use this array to show all content types (title + text).

// Bonus: an article can be marked as "breaking news". If this is the case, 
// the title is prepended with "BREAKING: ". Extra bonus: display all the content with the appropriate html tags.

class content{

    public $title;
    public $text;

        public function __construct($title, $text) {
            $this->title = $title;
            $this->text = $text;
        }
        public function displayContent(){
            return " <h2>{$this->title}</h2><p>{$this->text}</p>";
        }
}

class article extends content{
    public function displayContent() {
        $title = $this->title;
        if ($this->isBreakingNews()) {
            $title = "RUPTURE : " . $title;

        }
        return "<h2>{$title}</h2><p>{$this->text}</p>" ;
    }
    private function isBreakingNews() {

        return false;
    }
    }

    class advertisement extends content {
        public function displayContent() {
            return "<h2>" . strtoupper($this->title) . "</h2><pW{$this->text}</p>";
        }
    }

    class jobVacancy extends content{
        public function displayContent() {
            return "<h2>{$this->title} - post now! </h2><p>{$this->text}</p>";
        }
    }

    //creat table

    $contents =[
        new Article("titre de l'article", "contenu de l'article."),
        new Article("Derniere nouvelle", "contenu de la derniere nouvelle."),
        new advertisement("Annonce", "contenu de l'annonce."),
        new jobVacancy("Poste vacant", "Contetnu du poste vacant."),

    ];
     // display all types
     foreach($contents as $content) {
        echo $content->displayContent() . "<br>";
     }


?>