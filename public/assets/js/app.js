const namesOfImages = [{
        key: "G",
        value: "G.png",
    },
    {
        key: "H",
        value: "H.png",
    },
    {
        key: "E",
        value: "E.png",
    },
    {
        key: "B",
        value: "B.png",
    },
    {
        key: "I",
        value: "I.png",
    },
    {
        key: "N",
        value: "N.png",
    },
    {
        key: "K",
        value: "K.png",
    },
    {
        key: "S",
        value: "S.png",
    },
    {
        key: "L",
        value: "L.png",
    },
];

// using font awsome 4 icons as symbols
const symbols = [{
        key: "circle-notch",
        value: "fa-circle-notch",
    },
    {
        key: "equals",
        value: "fa-equals",
    },
    {
        key: "minus",
        value: "fa-minus",
    },
    {
        key: "times",
        value: "fa-times",
    },
    {
        key: "greater-than",
        value: "fa-greater-than",
    },
    {
        key: "less-than",
        value: "fa-less-than",
    },
    {
        key: "divide",
        value: "fa-divide",
    },
    {
        key: "percentage",
        value: "fa-percentage",
    },
    {
        key: "infinity",
        value: "fa-infinity",
    },
];
let prevRandomNumber;
let prevSymbol;
let scores = {
    correct: 0,
    wrong: 0,
};
let usedRandomNumbers = [];
const onBeginTest = () => {
    $(".test-div, .begin-test-div").toggle("slow");
    let symbolsCount = symbols.length;
    let availableAttempts = 0;
    const interval = setInterval(function () {
        availableAttempts++;
        symbolsCount -= 1;
        changeElectedSymbol(symbolsCount);
        if (symbolsCount <= 0) {
            clearInterval(interval);
            setTimeout(() => {
                displayScores(availableAttempts);
            }, 3000);
            setTimeout(() => {
                $(".symbol-list li button").attr("disabled", true);
            }, 1000);
            updateProgressBar(symbolsCount);
        } else {
            updateProgressBar(symbolsCount);
        }
    }, 1000);
};

const updateProgressBar = (value) => {
    const perc = (value / 9) * 100;
    $(".progress-bar").attr("aria-valuenow", perc);
    $(".progress-bar").width(`${perc}%`);
    switch (true) {
        case perc <= 60 && perc > 20:
            $(".progress-bar")
                .addClass("progress-bar-warning")
                .removeClass("progress-bar-success");
            break;
        case perc <= 20:
            $(".progress-bar")
                .addClass("progress-bar-danger")
                .removeClass("progress-bar-warning");
            break;
        default:
            break;
    }
};
const changeElectedSymbol = (symbolsCount) => {
    if ($(".elected-symbol-icon").hasClass(prevSymbol)) {
        $(".elected-symbol-icon").removeClass(prevSymbol);
    }
    $(".elected-symbol-icon").addClass(symbols[symbolsCount].value);
    $(".elected-symbol-icon").attr(
        "data-elected-symbol-value",
        symbols[symbolsCount].key
    );
    prevSymbol = symbols[symbolsCount].value;
};
const onSelectSymbol = (symbolValue) => {
    let outcomeToShow;
    if (
        $(".elected-symbol-icon").attr("data-elected-symbol-value") === symbolValue
    ) {
        scores.correct++;
        outcomeToShow = $(".correct-selected-symbol");
    } else {
        scores.wrong++;
        outcomeToShow = $(".wrong-selected-symbol");
    }
    $(outcomeToShow).show();
    setTimeout(() => {
        $(outcomeToShow).hide();
    }, 2000);
};
displayScores = (availableAttempts) => {
    $(".correct-selected-symbol .panel-heading").text(scores.correct);
    $(".wrong-selected-symbol .panel-heading").text(scores.wrong);
    $(".correct-selected-symbol").show("slow");
    $(".wrong-selected-symbol").show("slow");
    $('#test-score').val(scores.correct);
};
const toggleOtherTextbox = (event, element) => {

    const otherTextbox = element.parent().parent().next();
    otherTextbox.toggle("show");
    event.target.checked ?
        otherTextbox.find("input").attr("disabled", false) :
        otherTextbox.find("input").attr("disabled", true);
};
const toggleAgeEntry = (event, element) => {
    if(event.target.value === 'Yes') {
       $('.age-entry').show('slow')
    } else {
        $('.age-entry').hide('slow');
        $('.surveyForm').hide('slow');
        $('.invaid-age-error').hide('slow');
    }
};
const proceedToForm = (event) => {
    if($('.age-entry #age').val() >= 18) {
        $('.surveyForm').show('slow');
        $('.pre-form-settings').hide('slow');
        $('#hidden-age-input').val($('.age-entry #age').val());
    }
}
const toggleConditionalDivs = (event, element) => {
    event.target.value === "Yes" ?
        element.parent().parent().next().show("slow") :
        element.parent().parent().next().hide("slow");
};

const toggleDropdownOtherText = (event, element) => {
     const otherTextbox = element.next();
    if(element.children("option:selected").val() === 'Other') {
        otherTextbox.find("input").attr("disabled", false);
        otherTextbox.show('slow');
    } else {
        otherTextbox.hide('slow');
        otherTextbox.find("input").attr("disabled", true);
    }
}

const closeNotifier = (element) => {
    element.parent().slideToggle();
}
