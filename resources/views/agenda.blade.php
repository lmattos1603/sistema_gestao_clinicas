<style>
  .calendar-day {
  width: 100px;
  min-width: 100px;
  max-width: 100px;
  height: 80px;
}
.calendar-table {
  margin: 0 auto;
  width: 700px;
}
.selected {
  background-color: #eee;
}
.outside .date {
  color: #ccc;
}
.timetitle {
  white-space: nowrap;
  text-align: right;
}
.event {
  border-top: 1px solid #dba1a1;
  border-bottom: 1px solid #dba1a1;
  background-image: linear-gradient(to bottom, #dba1a1 0px, #e5bcbc 100%);
  background-repeat: repeat-x;
  color: #763c3c;
  border-width: 1px;
  font-size: .75em;
  padding: 0 .75em;
  line-height: 2em;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-bottom: 1px;
}
.event.begin {
  border-left: 1px solid #dba1a1;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.event.end {
  border-right: 1px solid #b2dba1;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.event.all-day {
  border-top: 1px solid #9acfea;
  border-bottom: 1px solid #9acfea;
  background-image: linear-gradient(to bottom, #d9edf7 0px, #b9def0 100%);
  background-repeat: repeat-x;
  color: #31708f;
  border-width: 1px;
}
.event.all-day.begin {
  border-left: 1px solid #9acfea;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.event.all-day.end {
  border-right: 1px solid #9acfea;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.event.clear {
  background: none;
  border: 1px solid transparent;
}
.table-tight > thead > tr > th,
.table-tight > tbody > tr > th,
.table-tight > tfoot > tr > th,
.table-tight > thead > tr > td,
.table-tight > tbody > tr > td,
.table-tight > tfoot > tr > td {
  padding-left: 0;
  padding-right: 0;
}
.table-tight-vert > thead > tr > th,
.table-tight-vert > tbody > tr > th,
.table-tight-vert > tfoot > tr > th,
.table-tight-vert > thead > tr > td,
.table-tight-vert > tbody > tr > td,
.table-tight-vert > tfoot > tr > td {
  padding-top: 0;
  padding-bottom: 0;
}

</style>
@extends('template')

@section('css')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{ asset('css/calendario.css') }}" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@endsection
<!------ Include the above in your HEAD tag ---------->

@section('conteudo')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  
@if(session()->has('msg'))
  <div class="alert alert-warning">{{session('msg')}}</div>
  {{ session()->forget(['msg']) }}
@endif

@if(session()->has('m'))
  <div class="alert alert-success">{{session('m')}}</div>
  {{ session()->forget(['m']) }}
@endif

<div class="container theme-showcase">
  <h1>Agenda</h1>
<div id="holder" class="row" ></div>
</div>


<script type="text/tmpl" id="tmpl">
  @verbatim
  {{ 
  var date = date || new Date(),
      month = date.getMonth(), 
      year = date.getFullYear(), 
      first = new Date(year, month, 1), 
      last = new Date(year, month + 1, 0),
      startingDay = first.getDay(), 
      thedate = new Date(year, month, 1 - startingDay),
      dayclass = lastmonthcss,
      today = new Date(),
      i, j; 
  if (mode === 'week') {
    thedate = new Date(date);
    thedate.setDate(date.getDate() - date.getDay());
    first = new Date(thedate);
    last = new Date(thedate);
    last.setDate(last.getDate()+6);
  } else if (mode === 'day') {
    thedate = new Date(date);
    first = new Date(thedate);
    last = new Date(thedate);
    last.setDate(thedate.getDate() + 1);
  }
  
  }}

  <table class="calendar-table table table-condensed table-tight">
    <thead>
      <tr>
        <td colspan="7" style="text-align: center">
          <table style="white-space: nowrap; width: 100%">
            <tr>
              <td style="text-align: left;">
                <span class="btn-group">
                  <button class="js-cal-prev btn btn-default"><</button>
                  <button class="js-cal-next btn btn-default">></button>
                </span>
                <button class="js-cal-option btn btn-default {{: first.toDateInt() <= today.toDateInt() && today.toDateInt() <= last.toDateInt() ? 'active':'' }}" data-date="{{: today.toISOString()}}" data-mode="month">{{: todayname }}</button>
              </td>
              <td>
                <span class="btn-group btn-group-lg">
                  {{ if (mode !== 'day') { }}
                    {{ if (mode === 'month') { }}<button class="js-cal-option btn btn-link" data-mode="year">{{: months[month] }}</button>{{ } }}
                    {{ if (mode ==='week') { }}
                      <button class="btn btn-link disabled">{{: shortMonths[first.getMonth()] }} {{: first.getDate() }} - {{: shortMonths[last.getMonth()] }} {{: last.getDate() }}</button>
                    {{ } }}
                    <button class="js-cal-years btn btn-link">{{: year}}</button> 
                  {{ } else { }}
                    <button class="btn btn-link disabled">{{: date.toDateString() }}</button> 
                  {{ } }}
                </span>
              </td>
              <td style="text-align: right">
                <span class="btn-group">
                  <button class="js-cal-option btn btn-default {{: mode==='year'? 'active':'' }}" data-mode="year">Ano</button>
                  <button class="js-cal-option btn btn-default {{: mode==='month'? 'active':'' }}" data-mode="month">Mes</button>
                  <button class="js-cal-option btn btn-default {{: mode==='week'? 'active':'' }}" data-mode="week">Semana</button>
                  <button class="js-cal-option btn btn-default {{: mode==='day'? 'active':'' }}" data-mode="day">Dia</button>
                </span>
              </td>
            </tr>
          </table>
          
        </td>
      </tr>
    </thead>
    {{ if (mode ==='year') {
      month = 0;
    }}
    <tbody>
      {{ for (j = 0; j < 3; j++) { }}
      <tr>
        {{ for (i = 0; i < 4; i++) { }}
        <td class="calendar-month month-{{:month}} js-cal-option" data-date="{{: new Date(year, month, 1).toISOString() }}" data-mode="month">
          {{: months[month] }}
          {{ month++;}}
        </td>
        {{ } }}
      </tr>
      {{ } }}
    </tbody>
    {{ } }}
    {{ if (mode ==='month' || mode ==='week') { }}
    <thead>
      <tr class="c-weeks">
        {{ for (i = 0; i < 7; i++) { }}
          <th class="c-name">
            {{: days[i] }}
          </th>
        {{ } }}
      </tr>
    </thead>
    <tbody>
      {{ for (j = 0; j < 6 && (j < 1 || mode === 'month'); j++) { }}
      <tr>
        {{ for (i = 0; i < 7; i++) { }}
        {{ if (thedate > last) { dayclass = nextmonthcss; } else if (thedate >= first) { dayclass = thismonthcss; } }}
        <td class="calendar-day {{: dayclass }} {{: thedate.toDateCssClass() }} {{: date.toDateCssClass() === thedate.toDateCssClass() ? 'selected':'' }} {{: daycss[i] }} js-cal-option" data-date="{{: thedate.toISOString() }}">
          <div class="date">{{: thedate.getDate() }}</div>
          {{ thedate.setDate(thedate.getDate() + 1);}}
        </td>
        {{ } }}
      </tr>
      {{ } }}
    </tbody>
    {{ } }}
    {{ if (mode ==='day') { }}
    <tbody>
      <tr>
        <td colspan="7">
          <table class="table table-striped table-condensed table-tight-vert" >
            <thead>
              <tr>
                <th> </th>
                <th style="text-align: center; width: 100%">{{: days[date.getDay()] }}</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th class="timetitle" >Diária</th>
                <td class="{{: date.toDateCssClass() }}">  </td>
              </tr>
              <tr>
                <th class="timetitle" >Início do dia 6 Horas</th>
                <td class="time-0-0"> </td>
              </tr>
              {{for (i = 6; i < 22; i++) { }}
              <tr> <!-- Hora cheia 08:00 -->
                <th class="timetitle" >{{: i <= 12 ? i : i  }}:00 {{: i < 12 ? "" : ""}}</th>
                <td class="time-{{: i}}-0"> </td>
              </tr>
              <tr> <!-- Hora quebrada 08:30 -->
                <th class="timetitle" >{{: i <= 12 ? i : i  }}:30 {{: i < 12 ? "" : ""}}</th>
                <td class="time-{{: i}}-30"> </td>
              </tr>
              {{ } }}
              <tr>
                <th class="timetitle" >Fim do dia 22 Horas</th>
                <td class="time-22-0"> </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
    {{ } }}
  </table>
</script>


<script>
    var $currentPopover = null;
  $(document).on('shown.bs.popover', function (ev) {
    var $target = $(ev.target);
    if ($currentPopover && ($currentPopover.get(0) != $target.get(0))) {
      $currentPopover.popover('toggle');
    }
    $currentPopover = $target;
  }).on('hidden.bs.popover', function (ev) {
    var $target = $(ev.target);
    if ($currentPopover && ($currentPopover.get(0) == $target.get(0))) {
      $currentPopover = null;
    }
  });


//quicktmpl is a simple template language I threw together a while ago; it is not remotely secure to xss and probably has plenty of bugs that I haven't considered, but it basically works
//the design is a function I read in a blog post by John Resig (http://ejohn.org/blog/javascript-micro-templating/) and it is intended to be loosely translateable to a more comprehensive template language like mustache easily
$.extend({
    quicktmpl: function (template) {return new Function("obj","var p=[],print=function(){p.push.apply(p,arguments);};with(obj){p.push('"+template.replace(/[\r\t\n]/g," ").split("{{").join("\t").replace(/((^|\}\})[^\t]*)'/g,"$1\r").replace(/\t:(.*?)\}\}/g,"',$1,'").split("\t").join("');").split("}}").join("p.push('").split("\r").join("\\'")+"');}return p.join('');")}
});

$.extend(Date.prototype, {
  //provides a string that is _year_month_day, intended to be widely usable as a css class
  toDateCssClass:  function () { 
    return '_' + this.getFullYear() + '_' + (this.getMonth() + 1) + '_' + this.getDate(); 
  },
  //this generates a number useful for comparing two dates; 
  toDateInt: function () { 
    return ((this.getFullYear()*12) + this.getMonth())*32 + this.getDate(); 
  },
  /*Funcao responsavel por mostrar o horario na agenda*/
  toTimeString: function() {
    var hours = this.getHours(),
        minutes = this.getMinutes(),
        hour = (hours > 24) ? (hours) : hours,
        ampm = (hours >= 24) ? ' ' : ' ';
    if (hours === 0 && minutes===0) { return ''; }
    if (minutes > 0 && minutes <10){
      return hour + ':0' + minutes + ampm;
    }else{
      if (minutes > 0) {
        return hour + ':' + minutes + ampm;
      }else{
        return hour + ':' + '00' ;
      }
      return hour + ampm;
    }
  }
});


(function ($) {

  //t here is a function which gets passed an options object and returns a string of html. I am using quicktmpl to create it based on the template located over in the html block
  var t = $.quicktmpl($('#tmpl').get(0).innerHTML);
  
  function calendar($el, options) {
    //actions aren't currently in the template, but could be added easily...
    $el.on('click', '.js-cal-prev', function () { /*Botão "<" da agenda*/
      switch(options.mode) {
      case 'year': options.date.setFullYear(options.date.getFullYear() - 1); break;
      case 'month': options.date.setMonth(options.date.getMonth() - 1); break;
      case 'week': options.date.setDate(options.date.getDate() - 7); break;
      case 'day':  options.date.setDate(options.date.getDate() - 1); break;
      }
      draw();
    }).on('click', '.js-cal-next', function () {  /*Botão ">" da agenda*/
      switch(options.mode) {
      case 'year': options.date.setFullYear(options.date.getFullYear() + 1); break;
      case 'month': options.date.setMonth(options.date.getMonth() + 1); break;
      case 'week': options.date.setDate(options.date.getDate() + 7); break;
      case 'day':  options.date.setDate(options.date.getDate() + 1); break;
      }
      draw();
    }).on('click', '.js-cal-option', function () {
      var $t = $(this), o = $t.data();
      if (o.date) { o.date = new Date(o.date); }
      $.extend(options, o);
      draw();
    }).on('click', '.js-cal-years', function () {
      var $t = $(this), 
          haspop = $t.data('popover'),
          s = '', 
          y = options.date.getFullYear() - 2, 
          l = y + 5;
      if (haspop) { return true; }
      for (; y < l; y++) {
        s += '<button type="button" class="btn btn-default btn-lg btn-block js-cal-option" data-date="' + (new Date(y, 1, 1)).toISOString() + '" data-mode="year">'+y + '</button>';
      }
      $t.popover({content: s, html: true, placement: 'auto top'}).popover('toggle');
      return false;
    }).on('click', '.event', function () {
      var $t = $(this), 
          index = +($t.attr('data-index')), 
          haspop = $t.data('popover'),
          data, time;
          
      if (haspop || isNaN(index)) { return true; }
      data = options.data[index];
      time = data.start.toTimeString();
      if (time && data.end) { time = time + ' - ' + data.end.toTimeString(); }
      $t.data('popover',true);
      $t.popover({content: '<p><strong>' + time + '</strong></p>'+data.text, html: true, placement: 'auto left'}).popover('toggle');
      return false;
    });
    function dayAddEvent(index, event) {
      if (!!event.allDay) {
        monthAddEvent(index, event);
        return;
      }
      var $event = $('<div/>', {'class': 'event', text: event.title, title: event.title, 'data-index': index}),
          start = event.start,
          end = event.end || start,
          time = event.start.toTimeString(),
          hour = start.getHours(),
          timeclass = '.time-22-0',
          startint = start.toDateInt(),
          dateint = options.date.toDateInt(),
          endint = end.toDateInt();
      if (startint > dateint || endint < dateint) { return; }
      
      if (!!time) {
        $event.html('<strong>' + time + '</strong> ' + $event.html());
      }
      $event.toggleClass('begin', startint === dateint);
      $event.toggleClass('end', endint === dateint);
      if (hour < 6) {
        timeclass = '.time-0-0';
      }
      if (hour < 22) {
        timeclass = '.time-' + hour + '-' + (start.getMinutes() < 30 ? '0' : '30');
      }
      $(timeclass).append($event);
    }
    
    function monthAddEvent(index, event) {
      var $event = $('<div/>', {'class': 'event', text: event.title, title: event.title, 'data-index': index}),
          e = new Date(event.start),
          dateclass = e.toDateCssClass(),
          day = $('.' + e.toDateCssClass()),
          empty = $('<div/>', {'class':'clear event', html:' '}), 
          numbevents = 0, 
          time = event.start.toTimeString(),
          endday = event.end && $('.' + event.end.toDateCssClass()).length > 0,
          checkanyway = new Date(e.getFullYear(), e.getMonth(), e.getDate()+40),
          existing,
          i;
      $event.toggleClass('all-day', !!event.allDay);
      if (!!time) {
        $event.html('<strong>' + time + '</strong> ' + $event.html());
      }
      if (!event.end) {
        $event.addClass('begin end');
        $('.' + event.start.toDateCssClass()).append($event);
        return;
      }
            
      while (e <= event.end && (day.length || endday || options.date < checkanyway)) {
        if(day.length) { 
          existing = day.find('.event').length;
          numbevents = Math.max(numbevents, existing);
          for(i = 0; i < numbevents - existing; i++) {
            day.append(empty.clone());
          }
          day.append(
            $event.
            toggleClass('begin', dateclass === event.start.toDateCssClass()).
            toggleClass('end', dateclass === event.end.toDateCssClass())
          );
          $event = $event.clone();
          $event.html(' ');
        }
        e.setDate(e.getDate() + 1);
        dateclass = e.toDateCssClass();
        day = $('.' + dateclass);
      }
    }
    /*Conta quantos agendamentos tem em cada mes do ano*/
    function yearAddEvents(events, year) {
      var counts = [0,0,0,0,0,0,0,0,0,0,0,0];
      $.each(events, function (i, v) {
        if (v.start.getFullYear() === year) {
            counts[v.start.getMonth()]++
            ;
        }
      });
      $.each(counts, function (i, v) {
        if (v!==0) {
            $('.month-'+i).append('<span class="badge">'+v+'</span>');
        }
      });
    }
    
    function draw() {
      $el.html(t(options));
      //potential optimization (untested), this object could be keyed into a dictionary on the dateclass string; the object would need to be reset and the first entry would have to be made here
      $('.' + (new Date()).toDateCssClass()).addClass('today');
      if (options.data && options.data.length) {
        if (options.mode === 'year') {
            yearAddEvents(options.data, options.date.getFullYear());
        } else if (options.mode === 'month' || options.mode === 'week') {
            $.each(options.data, monthAddEvent);
        } else {
            $.each(options.data, dayAddEvent);
        }
      }
    }
    
    draw();    
  }
  
  ;(function (defaults, $, window, document) {
    $.extend({
      calendar: function (options) {
        return $.extend(defaults, options);
      }
    }).fn.extend({
      calendar: function (options) {
        options = $.extend({}, defaults, options);
        return $(this).each(function () {
          var $this = $(this);
          calendar($this, options);
        });
      }
    });
  })({
    days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado"],
    months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    shortMonths: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
    date: (new Date()),
        daycss: ["c-sunday", "", "", "", "", "", "c-saturday"],
        todayname: "  Hoje",
        thismonthcss: "current",
        lastmonthcss: "outside",
        nextmonthcss: "outside",
    mode: "month",
    data: []
  }, jQuery, window, document);
    
})(jQuery);

var data = [],
    date = new Date(),
    d = date.getDate(),
    d1 = d,
    m = date.getMonth(),
    y = date.getFullYear(),
    i,
    end, 
    j, 
    c = 1063, 
    c1 = 3329,
    h, 
    m,
    names = ['All Day Event', 'Long Event', 'Birthday Party', 'Repeating Event', 'Training', 'Meeting', 'Mr. Behnke', 'Date', 'Ms. Tubbs'];

  @endverbatim

  @foreach($agenda as $a)
  @php
    $y = date('Y', strtotime($a->data));
    $m = date('m', strtotime($a->data)) -1;
    $d = date('d', strtotime($a->data));
    $h = date('H', strtotime($a->hora));
    $i = date('i', strtotime($a->hora));

    $hf = date('H', strtotime($a->hora) + 60*60);
  @endphp
  data.push({ title: 'Profissional: {{ $a->profissionais->nome }}|Cliente: {{ $a->clientes->nome }}|Valor da Consulta: R${{$a->valor_consulta}}', start: new Date({{ $y }}, {{ $m }}, {{ $d }}, {{ $h }}, {{ $i }}), end: new Date({{ $y }}, {{ $m }}, {{ $d }}, {{ $hf }}, {{ $i }}), allDay: false, text: '{{  $a->profissionais->nome }}'  });
  @endforeach

  @verbatim
  data.sort(function(a,b) { return (+a.start) - (+b.start); });
  
//data must be sorted by start date

//Actually do everything
$('#holder').calendar({
  data: data
});
</script>
@endverbatim

@endsection