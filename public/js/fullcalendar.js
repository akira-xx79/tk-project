document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid' ],
        //プラグイン読み込み
        defaultView: 'dayGridMonth',
        //カレンダーを月ごとに表示
        editable: true,
        //イベント編集
        firstDay : 1,
        //秋の始まりを設定。1→月曜日。defaultは0(日曜日)
        eventDurationEditable : false,
        //イベントの期間変更
        selectLongPressDelay:0,
        // スマホでタップしたとき即反応
        events: [
            {
                title: 'イベント',
                start: '2019-01-01'
            }
        ],
        //一旦イベントのサンプルを表示。動作確認用。

        eventDrop: function(info){
        //eventをドラッグしたときの処理
             editEventDate(info);
            //あとで使う関数
        },

        // eventClick: function(item, jsEvent, view) {
        //     //クリックしたイベントのタイトルが取れるよ
        //     alert('Clicked on: ' + item.title);
        //   },
        eventClick: function(event, jsEvent, view) {

            alert('顧客yy名:    ' + event.company + '\n製品名:     ' + event.name + '\n数量:     ' + event.numcer);
            alert('View: ' + info.view.type);

            info.el.style.borderColor = 'red';
          },
    });
    calendar.render();
});
