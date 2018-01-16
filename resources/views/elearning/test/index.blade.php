@extends ('templates.elearning.test')

@section ('init')
    {{ Html::script('templates/elearning/js/countdown.js') }}
@endsection

@section ('content')
    <div class="progress-bar-test">
        <div class="progress">
          <div id = 'progress-bar' time="{{ $time }}" class="progress-bar progress-bar-success animated" role="progressbar" aria-valuemin="0" aria-valuenow="0" aria-valuemax="100" style="width: 0">
          </div>
        </div>
    </div>
    <div class="wrapper-all">
        <div class="wrapper-test">
            <div class="include-test" id="include-test">
                <div class="content-test animated fadeInRight" tid='{{ $question->test_id }}'>
                    <h2 class="1">{{ $question->content }}</h2>

                    <div class="answer-test" id="{{ $question->id }}">
                        <ul>
                            @foreach ($answers as $answer)
                                <li class="choose-answer-test" id={{ $answer->id }}><span>{{ $answer->content }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper-action-test row">
            <div class="col-sm-6 action-img">
                <div class="action-show" id="right-answer">
                    <img class="right-wrong-img" src="{{ config('setting.url_image_right') }}">
                    <span>@lang('lang.right')</span>
                </div>
                <div class="action-show" id="wrong-answer">
                    <img class="right-wrong-img" src="{{ config('setting.url_image_wrong') }}">
                    <span>@lang('lang.wrong')</span>
                </div>
            </div>
            <div class="col-sm-6 action-test btn-next">
                <a href="">@lang('lang.next')</a>
            </div>
        </div>
    </div>
@endsection
