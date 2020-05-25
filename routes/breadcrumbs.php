<?php

use App\Chapter;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('chapter', function (BreadcrumbsGenerator $trail, \App\Chapter $chapter) {
    $trail->push('Table Of Content', route('chapters.index'));

    $pushChapters = function (Chapter $chapter) use ($trail, &$pushChapters) {

        if ($chapter->parent) {
            $pushChapters($chapter->parent);
        }

        $trail->push($chapter->path . ' ' . getChapterName($chapter->path), route('chapters.show', $chapter));
    };

    $pushChapters($chapter);
});

Breadcrumbs::for('exercise', function (BreadcrumbsGenerator $trail, \App\Exercise $exercise) {
    $trail->parent('chapter', $exercise->chapter);
    $trail->push('Exercise ' . $exercise->path, route('exercises.show', $exercise));
});
