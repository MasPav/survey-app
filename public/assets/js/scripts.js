let wordsSectionTimeUp = false;
function scroll_to_class(element_class, removed_height) {
  var scroll_to = $(element_class).offset().top - removed_height;
  if ($(window).scrollTop() != scroll_to) {
    $("html, body").stop().animate({ scrollTop: scroll_to }, 0);
  }
}

function bar_progress(progress_line_object, direction) {
  var number_of_steps = progress_line_object.data("number-of-steps");
  var now_value = progress_line_object.data("now-value");
  var new_value = 0;
  if (direction == "right") {
    new_value = now_value + 100 / number_of_steps;
  } else if (direction == "left") {
    new_value = now_value - 100 / number_of_steps;
  }
  progress_line_object
    .attr("style", "width: " + new_value + "%;")
    .data("now-value", new_value);
}

jQuery(document).ready(function () {
  /*
        Fullscreen background
    */

  $("#top-navbar-1").on("shown.bs.collapse", function () {
    $.backstretch("resize");
  });
  $("#top-navbar-1").on("hidden.bs.collapse", function () {
    $.backstretch("resize");
  });

  /*
        Form
    */
  $(".f1 fieldset:first").fadeIn("slow");

  $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on(
    "focus",
    function () {
      $(this).removeClass("input-error");
    }
  );

  // next step
  $(".f1 .btn-next").on("click", function () {
    const parent_fieldset = $(this).parents("fieldset");
    if(!passedValidation(parent_fieldset)) {
        if(!$('.notification-bar').is(':visible')) {
            $('.notification-bar').slideToggle();
        } else {
           shake($('.notification-bar'));
        }
        return false;
    }
    if($('.notification-bar').is(':visible')){
       $('.notification-bar').slideToggle();
    }
    var next_step = true;
    // navigation steps / progress steps
    var current_active_step = $(this).parents(".f1").find(".f1-step.active");
    var progress_line = $(this).parents(".f1").find(".f1-progress-line");

    if (next_step) {
      parent_fieldset.fadeOut(400, function () {
        // change icons
        current_active_step
          .removeClass("active")
          .addClass("activated")
          .next()
          .addClass("active");
        // progress bar
        bar_progress(progress_line, "right");
        // show next step
        $(this).next().fadeIn();
        // scroll window to beginning of the form
        scroll_to_class($(".f1"), 20);
      });
    }
  });

  const passedValidation = (fieldset) => {
      let result = true;
      const notificationTextEl = $('.notification-text strong');
      switch (true) {
            case fieldset.hasClass('problemsSection'):
            case fieldset.hasClass('concernsSection'):
                notificationTextEl.text('Please fill out all entries to continue');
            result = arrayAnswersValidation(fieldset, result);
          break;
          case fieldset.hasClass('ratingsSection'):
              notificationTextEl.text('Please fill out all entries to continue')
              if($(fieldset).find('div.radio input[type=radio]:checked').size() > 0) {
                result = arrayAnswersValidation(fieldset, result);
              } else {
                  result = false;
              }
          break;
          case fieldset.hasClass('activitySection'):
              notificationTextEl.text('Please fill out all entries to continue')
              result = activitySectionValidation(fieldset);
              break;
          default:
              if(fieldset.hasClass('testSection')) {
                notificationTextEl.text('Please complete the test to continue');
              } else if (fieldset.hasClass('wordsSection')){
                notificationTextEl.text('Please type the words to continue');
                if(!wordsSectionTimeUp) {
                    result = false;
                    return
                }
              } else {
                notificationTextEl.text('Please fill out all entries to continue')
              }
             result = normValidation(fieldset, result);
              break;
      }

    return result;
  }
  const normValidation = (fieldset, result) => {
    fieldset.find('[name]').each(function(index, element) {
            if($(element).val() === '') {
                result = false;
                return;
            }
        });
        return result;
  }
  const activitySectionValidation = (fieldset) => {
      if($(fieldset).find('.firstSet input[type=radio]:checked').val() === 'Yes') {
          const condDivs = $(fieldset).find('.firstSet').next();
          const firstConDiv = condDivs.find('div.first');
          const secondConDiv = condDivs.find('div.second');
          if(firstConDiv.find('input[type=checkbox]:checked').size() <= 0 || secondConDiv.find('input[type=checkbox]:checked').size() <= 0) {
              return false;
          }
      }
      if($(fieldset).find('.secondSet input[type=radio]:checked').val() === 'Yes'){
        const condDivs = $(fieldset).find('.secondSet').next();
        const checkedRadios = arrayAnswersValidation($(condDivs).find('table'));
        const checkedboxes = condDivs.find('input[type=checkbox]:checked').size();
        if(!checkedRadios || checkedboxes <= 0) {
            return false;
        }
      }
      if($(fieldset).find('.thirdSet input[type=radio]:checked').val() === 'Yes') {
          const condDivs = $(fieldset).find('.thirdSet').next();
          const checkedOptions = condDivs.find('input[type=checkbox]:checked').size();
          if(checkedOptions <= 0) {
              return false;
          }
      }
      return true;
  }
  const arrayAnswersValidation = (fieldset, result) => {
      const rows = fieldset.find('tbody tr');
      let rowI, abort = false;
      for (rowI = 0; rowI <= rows.size() - 1 && !abort; rowI++) {
          const checkedOptions = $(rows[rowI]).find('input[type=radio]:checked').size();
            if(checkedOptions <= 0) {
                abort = true;
                result = false
            } else {
                result = true;
            }
        }
        return result;
  }

  function shake(element) {
        var interval = 100;
        var distance = 10;
        var times = 4;
        for (var iter = 0; iter < (times + 1) ; iter++) {
            element.animate({
                left: ((iter % 2 == 0 ? distance : distance * -1))
            }, interval);
        }
        element.animate({ left: 0 }, interval);
    }

  // previous step
  $(".f1 .btn-previous").on("click", function () {
    // navigation steps / progress steps
    var current_active_step = $(this).parents(".f1").find(".f1-step.active");
    var progress_line = $(this).parents(".f1").find(".f1-progress-line");

    $(this)
      .parents("fieldset")
      .fadeOut(400, function () {
        // change icons
        current_active_step
          .removeClass("active")
          .prev()
          .removeClass("activated")
          .addClass("active");
        // progress bar
        bar_progress(progress_line, "left");
        // show previous step
        $(this).prev().fadeIn();
        // scroll window to beginning of the form
        scroll_to_class($(".f1"), 20);
      });
  });

  // submit
  $(".f1").on("submit", function (e) {
        e.preventDefault();
    if(!passedValidation($('.activitySection'))) {
        if(!$('.notification-bar').is(':visible')) {
            $('.notification-bar').slideToggle();
        } else {
           shake($('.notification-bar'));
        }
        return false;
    }
    if($('.notification-bar').is(':visible')){
       $('.notification-bar').slideToggle();
    }
    $('.btn-submit').attr('disabled', true);
    $('.container').hide('slow');
    $('.loader-wrapper').show('slow');
    this.submit();
  });

  $(".timedEntries").on("keyup", function () {
    const display = $(this).parent().find("#time");
    if (display.is(":hidden") && $(this).attr("readonly") === undefined) {
      display.show();
      handleTimer(display, $(this));
    }
  });

  $(".readmoreBtn").on("click", function () {
    const text = $(this).text();
    text.includes("Read More")
      ? $(this).text("Read Less")
      : $(this).text("Read More");
  });
});

function handleTimer(display, textareaEl) {
  const duration = 60 * 1;
  var timer = duration,
    minutes,
    seconds;
  const interval = setInterval(function () {
    minutes = parseInt(timer / 60, 10);
    seconds = parseInt(timer % 60, 10);

    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    display.text(minutes + ":" + seconds);

    if (--timer < 0) {
      textareaEl.attr("readonly", true);
      display.hide();
      wordsSectionTimeUp = true;
      clearInterval(interval);
    }
  }, 1000);
}
