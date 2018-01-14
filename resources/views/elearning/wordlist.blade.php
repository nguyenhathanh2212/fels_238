@extends('templates.elearning.master')

@section('content')
        <!-- PAGE TITLE SECTION-->
        <section class="pageTitleSection">
            <div class="container">
                <div class="pageTitleInfo">
                    <h2>{{ $data['course']->name }}</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">@lang('lang.homeLow')</a></li>
                        @foreach ($data['categoriesParentName'] as $categoryName)
                            <li><a href="">{{ $categoryName }}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </section>

        <section class="mainContent full-width clearfix course-detail">
            <div class="container" >
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="teachersPhoto">
                            <img src="{{ $data['course']->picture_path }}" alt="image" class="img-rounded img-responsive">
                            @if (!$data['isActiveCourse'])
                                <a class="btn-learn" href="">@lang('lang.btnLearn')</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-12">
                        <div class="teachersInfo">
                            <h3>{{ $data['course']->name }}</h3>
                            <p>{{ $data['course']->information }}</p>
                        </div>
                        <a class="btn-learn btn-wordlist" href="{{ route('elearning.courses.show', $data['course']->id) }}">@lang('lang.lessons')</a>
                    </div>
                </div>
            </div>

            <div class="full-width clearfix course-detail-content" id="x">
                @if ($data['isActiveCourse'])   
                    <div class="progress-content progress-wordlist">
                        <div><strong>{{ $data['learnedWord'] . '/' . $data['totalWord'] . ' ' . trans('lang.word') }}</strong></div>
                        <div><strong>{{ count($data['idLessonsLearned']) . '/' . count($data['course']->lessons) . ' ' . trans('lang.lesson') }}</strong></div>
                        <div class="progress progress-course">
                            <div class="progress-bar progress-bar-success animated fadeInLeft progress-bar-course" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $data['progressVal'] . '%' }}">
                                {{ $data['progressVal'] . '%'}}
                            </div>
                        </div>
                        <div class="btn-progress">
                            @if ($data['learnedWord'])
                                <a class="btn-learn bg-color-1" href="">
                                    @lang('lang.review') ({{ $data['learnedWord'] }})
                                </a>
                            @endif
                            <a class="btn-learn " href="">@lang('lang.learn')</a>
                        </div>
                    </div>
                @endif

                <div class="tabCommon filter-wordlist">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="" class="filter-word" role="1" courseId="{{ $data['course']->id }}">
                                @lang('lang.all')
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="" class="filter-word" role="2" courseId="{{ $data['course']->id }}">
                                @lang('lang.alphabet')
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="" class="filter-word" role="3" courseId="{{ $data['course']->id }}">
                                @lang('lang.learned')
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="" class="filter-word" role="4" courseId="{{ $data['course']->id }}">
                                @lang('lang.unLearn')
                            </a>
                        </li>
                        <li>
                            <select id="select-filter-word">
                                <option value="0">@lang('lang.allLesson')</option>
                                @foreach ($data['course']->lessons as $lesson)
                                    <option value="{{ $lesson->id }}">{{ $loop->iteration . ' - ' . $lesson->name }}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                </div>
                <div id="rs"></div>

                <div class="wordlist-content" id="wordlist-content">
                    <ul>
                        <li class="full-width clearfix">
                            <div class="col-sm-3 col-xs-12 color-3-bold">
                                @lang('lang.word')
                            </div>
                            <div class="col-sm-4 col-xs-12 color-1-bold">
                                @lang('lang.pronunciation')
                            </div>
                            <div class="col-sm-4 col-xs-12 color-2-bold">
                                @lang('lang.explain')
                            </div>
                            <div class="col-sm-1 col-xs-12 color-4-bold">
                                @lang('lang.learned')
                            </div>
                        </li>
                        @foreach ($data['wordLists'] as $word)
                            <li class="full-width clearfix">
                                <div class="col-sm-3 col-xs-12">{{ $word->name }}</div>
                                <div class="col-sm-4 col-xs-12">{{ $word->pronunciation }}</div>
                                <div class="col-sm-4 col-xs-12">{{ $word->explain }}</div>
                                <div class="col-sm-1 col-xs-12">
                                    @if ($data['isActiveCourse'] && in_array($word->id, $data['idWordListsLearned']))
                                        <img src="{{ config('setting.checkIcon') }}" class="check-icon">
                                    @else
                                        <div class="lock"><i class="fa fa-lock"></i></div>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
@endsection
