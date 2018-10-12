@extends('layouts.app')

@section('title')
    {{ __('Takvim') }}
@endsection

@section('stylesheets')
    <link href='css/fullcalendar.min.css' rel='stylesheet' />
@endsection

@section('content')
    <div class="ui segments">
        <div class="ui center aligned segment">
            {{ __('Takvim') }}
        </div>
        <div class="ui segment">
            <div id='calendar'></div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>
    <script type="text/javascript">
        $('.button').popup();
    </script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left:   '',
                    center: '',
                    right: 'prev,next, today, agendaDay,agendaWeek,month',
                },
                defaultView: 'agendaWeek',
                dayNames: ['Pazar','Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi'],
                dayNamesShort: ['Pzr','Pzt','Sal','Çar','Per','Cum','Cmt'],
                editable: false,
                eventLimit: true,
                firstDay: 1,
                allDaySlot: false,
                events: [
                    @foreach($schedules as $schedule)
                    {
                        title: '{{ $schedule->scheduleType->name }}: {{ $schedule->client->name }}',
                        start: '{{ $schedule->meeting_at . 'T' .  $schedule->started_at }}',
                        end: '{{ $schedule->meeting_at . 'T' .  $schedule->finished_at }}',
                        url: '{{ route('schedule.edit', $schedule->id) }}',
                        color: '{{ $schedule->scheduleType->color }}',
                    },
                    @endforeach
                ],
                businessHours: {
                    dow: [ 1, 2, 3, 4, 5],
                    start: '9:00',
                    end: '18:00',
                }
            });

        });
    </script>
@endsection