<?php
namespace App\Http\Controllers;
use  App\Models\Material ;
use  App\Models\Mark ;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    public function index()
{
    $quizzes = Quiz::where('user_id', auth()->id())->get();

    if ($quizzes->isEmpty()) {
        return view('allquizzes')->with('message', "You don't have any active quizzes.");
    }

    return view('allquizzes')->with('quizzes', $quizzes);
}


    public function show($id)
    {
       
        $quiz = Quiz::with('questions.answers')->where('user_id', auth()->id())->findOrFail($id);
        return view('quizzes')->with('quiz' , $quiz);
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'questions' => 'required|array',
            'questions.*.question' => 'required|string',
            'questions.*.answers' => 'required|array',
            'questions.*.answers.*.answer' => 'required|string',
            'questions.*.answers.*.is_correct' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $quiz = Quiz::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);

        foreach ($request->questions as $questionData) {
            $question = $quiz->questions()->create([
                'question' => $questionData['question']
            ]);

            foreach ($questionData['answers'] as $answerData) {
                $question->answers()->create([
                    'answer' => $answerData['answer'],
                    'is_correct' => $answerData['is_correct']
                ]);
            }
        }

    return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
}
public function submit(Request $request, $id)
{
    $quiz = Quiz::with('questions.answers')->findOrFail($id);

    $score = 0;
    $totalQuestions = count($quiz->questions);
    $userAnswers = [];

    foreach ($quiz->questions as $index => $question) {
        $selectedAnswer = $request->input('q' . ($index + 1));
        $userAnswers[$index] = $selectedAnswer;
        foreach ($question->answers as $answer) {
            if ($answer->answer === $selectedAnswer && $answer->is_correct) {
                $score++;
                break;
            }
        }
    }

    // Find the related material
    $material =  Material::where('quiz_id', $id)->first();
    if ($material) {
        // Update or create a mark for the current user and material
        Mark::updateOrCreate(
            ['user_id' => auth()->id(), 'material_id' => $material->id],
            ['score' => $score]
        );
    }
    $quiz->update(['quiz_complete' => true]);

    return redirect()->route('quizzes.index')
        ->with('score', $score)
        ->with('totalQuestions', $totalQuestions)
        ->with('userAnswers', $userAnswers);
}

}