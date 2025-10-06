<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars Quiz</title>
    <link rel="icon" href="https://i.pinimg.com/236x/30/aa/1e/30aa1e394ddaa00cbb89977a3fbc67ef.jpg" type="image/svg+xml">




<?php 


session_start();



/**
Basic Star Wars Quiz written in HTML, CSS, and PHP
Made during Advanced Higher Computing in school, before I dropped out
How to run:
  - Step 1: Download this file (obviously)
  - Step 2: Download XAMPP (what I use) or EasyPHP (kinda sucks but it works)
  - Step 3: If you downloaded XAMPP, after the installation is complete, navigate to wherever it is located
            in your system, in my case this is C:\xampp (This is the default I think). From when I used 
            EasyPHP it should be somewhere in C:\Program FIles (x86) or C:\Program FIles 
  - Step 4: If using XAMPP, put this file into htdocs, however if using Easy PHP put into eds-www.
  - Step 5: For XAMPP users, open XAMPP and start the Apache module, then open localhost/index.php in your browser.
            For Easy PHP users, open Easy PHP from hidden icons and start the HTTP server, then open
            127.0.0.1/index.php in your browser
 */


// Question class to store question data







class Question {
    public $id;
    public $text;
    public $choices;
    public $correct;
    public $difficulty;
    public $explanation;

    public function __construct($id, $text, $choices, $correct, $difficulty, $explanation) {
        $this->id = $id;
        $this->text = $text;
        $this->choices = $choices;
        $this->correct = $correct;
        $this->difficulty = $difficulty;
        $this->explanation = $explanation;
    }
}





$question_bank = [


    new Question('question_1', 'When did the first death star get destroyed?', [
        'a' => 'A long time ago in a galaxy far, far away',
        'b' => 'During the Battle of Yavin',
        'c' => 'During the Battle of Endor',
        'd' => 'During the Battle of Hoth'
    ], 'b', 1, 'The death star was destroyed during the Battle of Yavin, which took place in the year 0 BBY (Before the Battle of Yavin).'),
   
   
    new Question('question_2', 'Who trained Luke Skywalker in the ways of the Force?', [
        'a' => 'Obi-Wan Kenobi',
        'b' => 'Yoda',
        'c' => 'Mace Windu',
        'd' => 'Qui-Gon Jinn'
    ], 'b', 2, 'Yoda trained Luke Skywalker on Dagobah in Episode V: The Empire Strikes Back.'),


    new Question('question_3', 'What species is Chewbacca?', [
        'a' => 'Wookiee',
        'b' => 'Ewok',
        'c' => 'Togruta',
        'd' => 'Rodian'
    ], 'a', 1, 'Chewbacca is a Wookiee from the planet Kashyyyk.'),


    new Question('question_4', 'Who is the Supreme Leader of the First Order?', [
        'a' => 'Kylo Ren',
        'b' => 'Snoke',
        'c' => 'Hux',
        'd' => 'Palpatine'
    ], 'b', 3, 'Supreme Leader Snoke controlled the First Order until he was killed by Kylo Ren.'),


    new Question('question_5', 'Which planet was the Clone Army created on?', [
        'a' => 'Naboo',
        'b' => 'Kamino',
        'c' => 'Geonosis',
        'd' => 'Coruscant'
    ], 'b', 2, 'The Clone Army was grown on Kamino following the secret order from Darth Sidious.'),


    new Question('question_6', 'Who killed Count Dooku?', [
        'a' => 'Anakin Skywalker',
        'b' => 'Obi-Wan Kenobi',
        'c' => 'Yoda',
        'd' => 'Mace Windu'
    ], 'a', 2, 'Anakin Skywalker killed Count Dooku at the end of Episode III: Revenge of the Sith.'),


    new Question('question_7', 'What color is Mace Windu’s lightsaber?', [
        'a' => 'Blue',
        'b' => 'Green',
        'c' => 'Purple',
        'd' => 'Red'
    ], 'c', 1, 'Mace Windu is known for wielding a unique purple lightsaber.'),


    new Question('question_8', 'Who leads the droid army during the Clone Wars?', [
        'a' => 'Count Dooku',
        'b' => 'General Grievous',
        'c' => 'Palpatine',
        'd' => 'Nute Gunray'
    ], 'b', 3, 'General Grievous commanded the Separatist droid army in the Clone Wars.'),


    new Question('question_9', 'Which Jedi survives Order 66 and becomes key to Rey’s training?', [
        'a' => 'Ahsoka Tano',
        'b' => 'Obi-Wan Kenobi',
        'c' => 'Yoda',
        'd' => 'Luke Skywalker'
    ], 'a', 4, 'Ahsoka Tano survives Order 66 and is later a mentor figure, influencing the events of Star Wars: Rebels and the sequel trilogy.'),


    new Question('question_10', 'Who is Rey’s grandfather?', [
        'a' => 'Darth Vader',
        'b' => 'Emperor Palpatine',
        'c' => 'Kylo Ren',
        'd' => 'Moff Gideon'
    ], 'b', 5, 'Rey is revealed to be the granddaughter of Emperor Palpatine in Episode IX: The Rise of Skywalker.'),


    new Question('question_11', 'Where was Anakin Skywalker born?', [
        'a' => 'Tatooine',
        'b' => 'Naboo',
        'c' => 'Coruscant',
        'd' => 'Kashyyyk'
    ], 'a', 1, 'Anakin Skywalker was born on the desert planet Tatooine.'),


    new Question('question_12', 'Which weapon does Darth Maul wield?', [
        'a' => 'Double-bladed lightsaber',
        'b' => 'Single-bladed lightsaber',
        'c' => 'Sith Staff',
        'd' => 'Blaster'
    ], 'a', 2, 'Darth Maul is famous for his red double-bladed lightsaber.'),


    new Question('question_13', 'Who ultimately defeats Darth Vader?', [
        'a' => 'Luke Skywalker',
        'b' => 'Emperor Palpatine',
        'c' => 'Rey',
        'd' => 'Obi-Wan Kenobi'
    ], 'a', 3, 'Luke Skywalker confronts Vader and helps redeem him during Episode VI: Return of the Jedi.'),


    new Question('question_14', 'What is the name of Han Solo’s ship?', [
        'a' => 'Slave I',
        'b' => 'Star Destroyer',
        'c' => 'Millennium Falcon',
        'd' => 'X-Wing'
    ], 'c', 1, 'Han Solo pilots the Millennium Falcon, a heavily modified Corellian freighter.'),


    new Question('question_15', 'Which Sith lord manipulates Anakin Skywalker into becoming Darth Vader?', [
        'a' => 'Darth Maul',
        'b' => 'Count Dooku',
        'c' => 'Darth Sidious',
        'd' => 'Kylo Ren'
    ], 'c', 4, 'Darth Sidious, also known as Emperor Palpatine, seduces Anakin to the dark side and turns him into Darth Vader.')

];


if (!isset($_SESSION['quiz_questions'])) {
    shuffle($question_bank);
    $_SESSION['quiz_questions'] = array_slice($question_bank, 0, 5);
}


$quiz_questions = $_SESSION['quiz_questions'];


$total = 0; //Set score as 0


//Running total to calculate total score
foreach ($_POST as $key => $value) {
    foreach ($quiz_questions as $question) {
        if ($question->id === $key) {
            if ($value === $question->correct) {
                $total += $question->difficulty;
            }
        }
    }
}



?>





<style>
:root { --bg:#0b1020; --card:#0f1724; --muted:#a3aabf; --accent:#ffd700; --glass:rgba(255,255,255,0.03); --radius:12px; --shadow:0 6px 30px rgba(2,6,23,.7); --font:'Inter',ui-sans-serif,system-ui,-apple-system,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif; }
* { box-sizing:border-box; margin:0; padding:0; }
body { font-family:var(--font); background:linear-gradient(180deg,var(--bg),#05060a); color:#e6eef8; line-height:1.4; padding:2rem; }
.container { max-width:980px; margin:0 auto; }
.header { display:flex; align-items:center; gap:1rem; margin-bottom:2rem; }
.header__title { font-weight:700; font-size:1.5rem; }
.main h1 { margin-bottom:.5rem; }
.top__section p { margin-bottom:.5rem; color:var(--muted); }
form { display:flex; flex-direction:column; gap:1rem; }
.question_block { background:var(--glass); border:1px solid rgba(255,255,255,0.02); padding:1rem; border-radius:var(--radius); }
.choice { margin:.25rem 0; }
input[type="radio"] { margin-right:.5rem; accent-color:var(--accent); }
button { align-self:flex-start; background:linear-gradient(90deg,#ffd366,#ffb84d); border:none; padding:.6rem 1rem; border-radius:var(--radius); font-weight:600; cursor:pointer; transition:transform .2s ease; }
button:hover { transform:scale(1.05); }
.results { margin-top:2rem; }
.explanation { margin-top:1rem; padding:.75rem; border-radius:6px; background:rgba(255,255,255,0.02); font-size:.92rem; }
.explanation h3 { margin-bottom:.25rem; }
.explanation p { margin-bottom:.25rem; }
@media(max-width:900px) { body { padding:1rem; } }

</style>





</head>

<body>
    <div class="container">
        <header class="header">
            <h1 class="header__title">Star Wars Quiz</h1>
            <p>Made by Alex Syme</p>
        </header>
    </div>
    

    <main class="main">
        <section class="top__section">
            <h1>Test your Star Wars knowledge</h1>
            <p>This quiz is made up of 5 questions. Each question is randomly selected from a question bank. Each question also varies in difficulty bla bla bla...</p>
            <p style="font-size:small;">Good luck, and may the Force be with you!</p>
        </section>
        <section class="question_one">
            <form action="" method="POST">
                <?php foreach ($quiz_questions as $index => $question) : ?>
                    <div class="question_block">
                        <h2>Question <?php echo $index + 1; ?>:</h2>
                        <p><?php echo htmlspecialchars($question->text); ?></p>
                        <?php foreach ($question->choices as $key => $choice) : ?>
                            <div class="choice">
                                <input type="radio" id="<?php echo $question->id . '_' . $key; ?>" name="<?php echo $question->id; ?>" value="<?php echo $key; ?>" required>
                                <label for="<?php echo $question->id . '_' . $key; ?>"><?php echo htmlspecialchars($choice); ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                <button type="submit">Submit Quiz</button>

                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                    <div class="results">
                        <h2>Your Score: <?php echo $total; ?></h2>
                        <?php foreach ($quiz_questions as $question) : ?>
                            <div class="explanation">
                                <h3><?php echo htmlspecialchars($question->text); ?></h3>
                                <p>Your answer: 
                                    <?php 
                                        $user_answer = $_POST[$question->id] ?? 'No answer';
                                        echo htmlspecialchars($question->choices[$user_answer] ?? 'No answer'); 
                                    ?>
                                </p>
                                <p>Correct answer: <?php echo htmlspecialchars($question->choices[$question->correct]); ?></p>
                                <p>Explanation: <?php echo htmlspecialchars($question->explanation); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php 
                    // Clear the session to reset the quiz for next time
                    session_destroy();
                endif; 
                ?>
            </form>
        </section>
    </main>
</body>
