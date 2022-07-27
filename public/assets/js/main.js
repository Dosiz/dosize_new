// use strict mode
'use strict';


let auth_in = $(".auth_in");
let auth_up = $(".auth_up");

$(".auth_in").click(function (e) {
  e.preventDefault();
  // click on btn
  $("#signin-tab").trigger("click");
});

$(".auth_up").click(function (e) {
  e.preventDefault();
  // click on btn
  $("#signup-tab").trigger("click");
});

// increament and decreament
var incrementPlus;
var incrementMinus;

var buttonPlus = $(".cart-qty-plus");
var buttonMinus = $(".cart-qty-minus");

var incrementPlus = buttonPlus.click(function () {
  var $n = $(this)
    .parent(".button-container")
    .parent(".contain")
    .find(".qty");
  $n.val(Number($n.val()) + 1);
});

var incrementMinus = buttonMinus.click(function () {
  var $n = $(this)
    .parent(".button-container")
    .parent(".contain")
    .find(".qty");
  var amount = Number($n.val());
  if (amount > 0) {
    $n.val(amount - 1);
  }
});



// fade out all color_model
$(".color_model").fadeOut();

// pick specific color
$('.pick_color').click(function () {
  // alert(1)
  // fade toggle children
  $(this).children('.color_model').fadeToggle();
});


// // simple color picker library integration
// $(function(){
//   $('.simple_color').simpleColor();
// });

try {
  $('.simple_color').simpleColor({ 
    displayColorCode: false,
    colorCodeAlign: 'center',
    colorCodeColor: false,
    colors: ['990033', 'ff3366', 'cc0033', '990033', 'ff3366', 'cc0033', 'ff0033', 'cc0033', '990033', 'ff3366', 'cc0033', 'ff0033', 'cc0033', '990033', 'ff3366', 'cc0033', 'ff0033'],
    hideInput: true, 
    inputCSS: { 
      'border-style': 'dashed', 
      'width': '70px', 
      'margin-bottom': '2px'
    },
    livePreview:true,
    cellWidth: 20,
    cellHeight: 20,
    cellMargin: 1,
    boxWidth: '0px',
    boxHeight: '24px',
    columns: 8,
    insert: 'after',
    onSelect: function(colorCode, inputElement){
      // do something
    },
    onCellEnter: function(colorCode, inputElement){
      // do something
    },
    onClose: function(inputElement){
      // do something
    }
  });

  $('.simple_color').closeChooser();
} catch (error) {
  console.log('simpleColor not found');
}


$('.player_info .plus_sign').click(function(e){
  e.preventDefault();
  $('#addPlayerBtn').trigger('click');
})

$('.add_player .plus_sign').click(function(e){
  e.preventDefault();
  // select this parent

  let ch = $(this).parent();

  
  $('#addTodraft').click(function(e){
    let playerName = $('#add_PlayerName').val();
    let round = $('#add_Round').val();
    e.preventDefault();
    // if playername and round is not empty
    if(playerName != '' && round != ''){
      // create new player
      ch.append(` <div class="player_label">
      ${playerName} ${round}
    </div>`)

      // clear inputs
      $('#add_PlayerName').val('');
      $('#add_Round').val('');
  
    }

    console.log($('a[data-bs-dismiss="modal"]'));

    // $('a[data-bs-dismiss="modal"]').trigger('click');
  })

})

// insvisble 
$('.timer_setting_model').fadeOut();

// fade toggle timer_setting_model
$('#setting_timer_btn').click(function(e){
  e.preventDefault();
  $('.timer_setting_model').fadeToggle();
})
// 


// copy to clipboard full functionality
$('#copyClip_btn').click(function(e){
  e.preventDefault();
  function copyToClipboard(text) {
    let sampleTextarea = document.createElement("textarea");
    document.body.appendChild(sampleTextarea);
    sampleTextarea.value = text; //save main text in it
    sampleTextarea.select(); //select textarea contenrs
    document.execCommand("copy");
    document.body.removeChild(sampleTextarea);
  }
  
  let copyText = document.getElementById("urlInput");
  copyToClipboard(copyText.value);

  // add green border to copyText
  // $('#urlInput').css('border-color', 'green');
  alert('Copied to clipboard');
})

// $('.leaque_box_body').fadeOut();
$('#gm_dash').click(function(){
  // $('.leaque_box_body').fadeToggle();
  $('#leaqueBox').toggleClass('active');
  $('.GmContent').toggleClass('mb_12P')
  console.log($('#leaqueBox'))
  // $('#GM_toggle').click();
})

$('#GM_toggle').click(function(){
  // $('.leaque_box_body').fadeToggle();
  $('#leaqueBox').toggleClass('active');
  $('.GmContent').toggleClass('mb_12P')
  console.log($('#leaqueBox'))
  // alert(1)
})


// let width = $('#zoomFTN').width();
let defaultWidth = 100;
$('#zoomIn').click(function(e){
  defaultWidth = defaultWidth + 10;
  // alert('zoom out');
  e.preventDefault();
  // add 10% width on every click
  // let newWidth = width + 50;
  console.log(`${defaultWidth}%`);
  $('#zoomFTN').width(`${defaultWidth}%`);
  // increase font size
  $('#zoomFTN td, #zoomFTN th').css('font-size', `${defaultWidth}%`);
  // $('#zoomFTN ')
})

// zoom out
$('#zoomOut').click(function(e){
  e.preventDefault();
  if(defaultWidth > 99){
    defaultWidth = defaultWidth - 10;
    console.log(`${defaultWidth}%`);
    $('#zoomFTN').width(`${defaultWidth}%`);
    $('#zoomFTN td, #zoomFTN th').css('font-size', `${defaultWidth}%`);
  }
})


// change title in draf room title
$('.ch_CREATE_LEAGUE').click(function(){
  $('#drafRoomTitle').html(`<span class="text_green">CREATE </span> LEAGUE`)
})
$('.ch_DRAFT_ROOM').click(function(){
  $('#drafRoomTitle').html(`<span class="text_green">DRAFT </span> ROOM`)
})


// sortable number
console.log($('.ui-sortable-handle'))
 

// generate number between 1 and 20
function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}


// set timer setting
$('#submitSetTimer').click(function(e){
  const hour = Number($('#setTimerHour').val());
  const min = Number($('#setTimerMin').val());
  const sec = Number($('#setTimerSec').val());
  console.log(`Total mins ${hour * 60 + min + sec / 60}`);
  console.log(hour, min, sec);

  // start counter down
  startCounterDown(hour, min, sec);
  $('.timer_setting_model').fadeOut();
})



let hours;
let mins;
let secs;

function startCounterDown(hour, min, sec){
  let totalSec = hour * 3600 + min * 60 + sec;
  let initialSec = hour * 3600 + min * 60 + sec;
  let counter = setInterval(function(){
    totalSec--;
    let h = Math.floor(totalSec / 3600);
    let m = Math.floor((totalSec % 3600) / 60);
    let s = Math.floor(totalSec % 60);

    // set bar
    let percentage = (totalSec / initialSec) * 100;
        
    $('#timerProgress').css('width', `${100 - percentage}%`);

    if(s < 10){
      s = '0' + s;
    }
  

  // reset counter
  $('#timerReset').click(function(e){
    e.preventDefault();
    const hour = 0;
    const min = 0;
    const sec = 0;
    startCounterDown(hour, min, sec);
    clearInterval(counter);
    $('#timerText').text(`00:00`);
    $('#timerProgress').css('width', `0%`);
  })

  hours = h;
  mins = m;
  secs = s;

  // pause and play counter
  $('#pauseTimer').click(function(e){
    e.preventDefault();
    clearInterval(counter);
    
    $('#pauseTimer').addClass('d-none')
    $('#playTimer').removeClass('d-none')
  })
 

    $('#timerText').text(`${h * 60 + m}:${s}`);

   


    if(totalSec <= 0){
      clearInterval(counter);
      $('#timerText').text(`00:00`);
    }
  }
  , 1000);
}



$('#playTimer').click(function(e){
  e.preventDefault();
  // totalSecF(totalSec);
  startCounterDown(hours, mins, secs);

  
  $('#pauseTimer').removeClass('d-none')
  $('#playTimer').addClass('d-none')
  })

$('.fa-star').click(function(e){
  e.preventDefault();
  $(this).toggleClass('fa-solid', 'fa-regular');
})

// play
// function totalSecF(totalSec){
//   // set interval
//   const counter = setInterval(function(){
//     totalSec--;
//     let h = Math.floor(totalSec / 3600);
//     let m = Math.floor((totalSec % 3600) / 60);
//     let s = Math.floor(totalSec % 60);
//     if(s < 10){
//       s = '0' + s;
//     }
//     $('#timerText').text(`${h * 60 + m}:${s}`);
//     if(totalSec <= 0){
//       clearInterval(counter);
//       $('#timerText').text(`00:00`);
//     }
//   }, 1000);
// }

let trashIcon = $('.table_link.trash');
console.log(trashIcon)
trashIcon.click(function(e){
  e.preventDefault()
  $(this).parent().parent().fadeOut();
})