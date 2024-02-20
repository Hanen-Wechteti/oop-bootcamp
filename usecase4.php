<?php

// //Il y a deux groupes, chacun de 10 étudiants. Chaque élève a un nom (même Jaqen ) et obtient une note. 
// Vous pouvez vous amuser en créant le contenu ici :-)

// Fournissez un moyen simple de calculer le score moyen d’un groupe.
// Ajoutez une fonction pour déplacer un élève d'un groupe à un autre.
// Montrez le score moyen des deux groupes. Déplacez l’élève le mieux noté d’un groupe avec l’élève le moins bien noté d’un autre. 
// Afficher à nouveau les moyennes : comment ont-elles été affectées ?

class student{

public $name;
public $score;

    public function __construct($name, $score) {

    $this->name = $name;
    $this->score = $score; 
}
}

class group{
    public $students = [];

    public function addStudent($student) {
        $this->students[] =$student;
    }

    public function calculateAverageScore() {
        $totalScore = 0;
        foreach ($this->students as $student) {
            $totalScore += $student->score;
        }
        return count($this->students) > 0 ? $totalScore /count($this->students) : 0;
    }
    public function moveStudentToGroup($student, $destinationGroup) {
        // Remove student from current group
        $key = array_search($student, $this->students);
        if ($key !== false) {
            unset($this->students[$key]);
    
            // Add student to the destination group
            $destinationGroup->addStudent($student);
        }
    }

    public function getbestandworstScore() {
        $bestScore = null;
        $worstScore = null;

        foreach ($this->students as $student) {
            if ($bestScore === null || $student->score > $bestScore-> score) {
                $bestScore = $student;
            }

            if ($worstScore === null || $student->score < $worstScore->score ) {
              $worstScore = $student;  
            }
        }
        return [ "best" => $bestScore, "worst" =>$worstScore];
    }

}

// create 2 groups with 10students each
$groupA = new group();
$groupB = new group();

for ($i = 1; $i <= 10; $i++) {
    $studentA = new student("studentA$i", rand(50, 100));
    $studentB = new student("studentB$i", rand(50, 100));

    $groupA->addStudent($studentA);
    $groupB->addStudent($studentB);

    //display average scores for both groups
    echo "group A average score :" . $groupA->calculateAverageScore() . "<br>";
    echo "group B average score :" . $groupB->calculateAverageScore() . "<br>";

// move te best score froum group A to group B and vice versa
$bestScoregroupA = $groupA->getbestandworstScore()["best"];
$bestScoregroupB = $groupB->getbestandworstScore()["best"];

$groupA->moveStudenttoGroup($bestScoregroupA, $groupB);
$groupB->moveStudenttoGroup($bestScoregroupB, $groupA);

//display average scores againa after the swap
echo "After Swap:<br>";
echo "group A average Score: " . $groupA->calculateAverageScore() . "<br>";
echo "group B average Score: " . $groupB->calculateAverageScore() . "<br>";

}
?>