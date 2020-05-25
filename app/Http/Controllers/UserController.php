<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Exercise;
use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $rating = getCalculatedRating();
        $userRatingPosition = $rating
            ->search(function (array $ratingPosition) use ($user) {
                ['user' => $ratingUser] = $ratingPosition;

                return $ratingUser->id === $user->id;
            });

        if ($userRatingPosition) {
            ['points' => $points] = $rating->get($userRatingPosition);
        } else {
            $points = 0;
            $userRatingPosition = 'N/A';
        }

        $user->load('readChapters', 'completedExercises');
        $chapters = Chapter::with('children', 'exercises')->get();
        $exercises = Exercise::all();
        $completedExercises = $user->completedExercises->keyBy('exercise_id');

        return view('user.show', compact(
            'user',
            'chapters',
            'exercises',
            'completedExercises',
            'userRatingPosition',
            'points'
        ));
    }
}
