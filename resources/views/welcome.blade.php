<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Form</title>

  <!-- CSS -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,100,300,500" />
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('assets/css/form-elements.css') }} " />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} " />
  <link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }} " />
</head>

<body>
  <!-- Top content -->
  <div class="top-content">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2 text">
          <h1>
            Exploring the impact of everyday life events on affective state
            and social behaviors
          </h1>
          <div class="description">
            <p>
              Dear Respondent, <br />
              My name is Ernest OKYERE-TWUM, a PhD student in psychology
              conducting this survey under the supervision of Pr Farzaneh
              Pahlavan on behalf of the Social Psychology laboratory at Paris
              Descartes University. We will be most grateful if you could
              complete this survey as best as you can. Kindly proceed to
              complete the survey if you are 18 years and above.
              <a class="btn btn-primary readmoreBtn" data-toggle="collapse" href="#readmore" role="button"
                aria-expanded="false" aria-controls="readmore">
                Read More
              </a>
              <span id="readmore" class="collapse">Also remember, there is no right or wrong answer and
                participation in this study is completely anonymous and you
                can withdraw from the study at any time without penalty. There
                are no risks in participating. If you are completing the
                survey on a mobile device, kindly remember to keep your device
                in landscape (horizontal) mode. For further information kindly
                contact us on
                <a href="mailto:ernest.okyere-twum@parisdescartes.fr"
                  style="color: tomato;"><em>ernest.okyere-twum@parisdescartes.fr</em></a></span>
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group text-center" style="color: whitesmoke;">
          <label>Do you agree to participate in this survey</label><br />
          <label class="radio-inline">
            <input type="radio" name="section1[agreeToParticipate]" id="agreeToParticipateYes" value="Yes"
              onclick="toggleConditionalDivs(event, $(this))" />
            <span>Yes</span>
          </label>
          <label class="radio-inline">
            <input type="radio" name="section1[agreeToParticipate]" id="agreeToParticipateNo" value="No"
              onclick="toggleConditionalDivs(event, $(this))" />
            <span>No</span>
          </label>
        </div>
        <div class="col-md-12 form-box conditionalDivs">
          <form role="form" action="{{ route('submitForm') }}" method="post" class="f1">
            @csrf
            <div class="f1-steps">
              <div class="f1-progress">
                <div class="f1-progress-line" data-now-value="5.66" data-number-of-steps="7" style="width: 5.66%;">
                </div>
              </div>
              <div class="f1-step active">
                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                <p>Bio</p>
              </div>
              <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                <p>Test</p>
              </div>
              <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                <p>Words</p>
              </div>
              <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                <p>Problems</p>
              </div>
              <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                <p>Concerns</p>
              </div>
              <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                <p>Ratings</p>
              </div>
              <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                <p>Activity</p>
              </div>
            </div>
            <div class="form-wrapper">
              <!-- Bio Start -->
              <fieldset>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input type="number" name="bioInfo[age]" class="form-control" id="age"
                      placeholder="kindly complete if 18 years and above" min="18" />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="bioInfo[gender]">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Prefer not to say">Prefer not to say</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="country">Where do you live (country)</label>
                    <input type="text" class="form-control" id="country" placeholder="Your Answer"
                      name="bioInfo[country]" />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="education">What is your level of education</label>
                    <input type="text" class="form-control" id="education" placeholder="Your Answer"
                      name="bioInfo[education]" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="profession">What is your profession</label>
                    <input type="text" class="form-control" id="profession" placeholder="Your Answer"
                      name="bioInfo[profession]" />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="native-language">What is your native language</label>
                    <input type="text" class="form-control" id="native-language" placeholder="Your Answer"
                      name="bioInfo[native_language]" />
                  </div>
                </div>
                <div class="f1-buttons">
                  <button type="button" class="btn btn-previous">
                    Previous
                  </button>
                  <button type="button" class="btn btn-next btn-primary">
                    Next
                  </button>
                </div>
              </fieldset>
              <!-- Section 1 End -->
              <!-- Test Start -->
              <fieldset style="width: 80%;">
                <div class="row begin-test-div">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 style="text-align: center;">Symbol Substitution Test</h3>
                    </div>
                    <div class="panel-body">
                      <h3><strong>Instructions</strong></h3>
                      <p>You will see a list of 9 symbols that each matches a number. One of the symbols will also be
                        inside a blue box. Tap the number of the symbol that matches the one inside the box. Use only
                        the number keys lined in the row. Be as accurate and as fast as you can.</p>
                      <button type="button" class="btn btn-primary" onclick="onBeginTest()">Begin Test</button>
                    </div>
                  </div>
                </div>
                <!-- test start -->
                <div class="row test-div" style="display: none;">
                    <input type="hidden" name="test[score]" id="test-score"/>
                  <div class="progress" style="height: 5px;">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="10"
                      aria-valuemin="0" aria-valuemax="100" style="width: 100%;" min-width="0%">
                    </div>
                  </div>
                  <div class="panel panel-default" style="padding: 0px 10px 0px 10px;">
                    <div class="panel-body">
                      <!-- elected symbol start -->
                      <div class="row col-12">
                        <div class="col-xs-3 col-md-4 correct-wrapper">
                          <div class="panel panel-success correct-selected-symbol"
                            style="text-align: center; display: none;">
                            <div class="panel-heading"></div>
                            <div class="panel-body"><i class="fa fa-check"></i></div>
                          </div>
                        </div>
                        <div class="col-xs-6 col-md-4">
                          <div class="panel panel-default">
                            <div class="panel-body text-center">
                              <i class="fas elected-symbol-icon" data-elected-symbol-value=""></i>
                              <!-- <img src="" alt="Elected Symbol" class="elected-symbol-img" data-elected-symbol-value=""> -->
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-3 col-md-4 wrong-wrapper">
                          <div class="panel panel-danger wrong-selected-symbol"
                            style="text-align: center; display: none;">
                            <div class="panel-heading"></div>
                            <div class="panel-body"><i class="fa fa-times"></i></div>
                          </div>
                        </div>
                      </div>
                      <!-- elected symbol end -->
                      <hr>
                      <!-- symbols list start -->
                      <div class="row" style="margin-top: 50px;">
                        <ul class="list-inline symbol-list" style="text-align: center;">
                          <li>
                            <i class="fa fa-minus" style="display: block; text-align: center;"></i>
                            <button type="button" onclick="onSelectSymbol('minus')" class="btn btn-primary">1</button>
                          </li>
                          <li>
                            <i class="fa fa-equals" style="display: block; text-align: center;"></i>
                            <button type="button" onclick="onSelectSymbol('equals')" class="btn btn-primary">2</button>
                          </li>
                          <li>
                            <i class="fa fa-times" style="display: block; text-align: center;"></i>
                            <button type="button" onclick="onSelectSymbol('times')" class="btn btn-primary">3</button>
                          </li>
                          <li>
                            <i class="fa fa-greater-than" style="display: block; text-align: center;"></i>
                            <button type="button" onclick="onSelectSymbol('greater-than')"
                              class="btn btn-primary">4</button>
                          </li>
                          <li>
                            <i class="fa fa-divide" style="display: block; text-align: center;"></i>
                            <button type="button" onclick="onSelectSymbol('divide')" class="btn btn-primary">5</button>
                          </li>
                          <li>
                            <i class="fa fa-less-than" style="display: block; text-align: center;"></i>
                            <button type="button" onclick="onSelectSymbol('less-than')"
                              class="btn btn-primary">6</button>
                          </li>
                          <li>
                            <i class="fa fa-circle-notch" style="display: block; text-align: center;"></i>
                            <button type="button" onclick="onSelectSymbol('circle-notch')"
                              class="btn btn-primary">7</button>
                          </li>
                          <li>
                            <i class="fa fa-percentage" style="display: block; text-align: center;"></i>
                            <button type="button" onclick="onSelectSymbol('percentage')"
                              class="btn btn-primary">8</button>
                          </li>
                          <li>
                            <i class="fa fa-infinity" style="display: block; text-align: center;"></i>
                            <button type="button" onclick="onSelectSymbol('infinity')"
                              class="btn btn-primary">9</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- test end -->
                <div class="f1-buttons">
                    <button type="button" class="btn btn-previous">
                    Previous
                  </button>
                  <button type="button" class="btn btn-next btn-primary">
                    Next
                  </button>
                </div>
              </fieldset>
              <!-- Test End -->

              <!-- Words Start -->
              <fieldset>
                <h4>
                  This task has a time limit and we will appreciate if you
                  keep the time limit for us.
                </h4>
                <div class="form-group">
                  <label class="sr-only" for="writeManyWords">Write as many words as possible beginning with LETTER-M
                    in 60 seconds. Separate them with commas</label>
                  <label for="writeManyWords">Write as many words as possible beginning with LETTER-M
                    in 60 seconds. Separate them with commas</label>
                  <textarea name="words['writeManyWords']" id="writeManyWords" rows="5"
                    class="form-control timedEntries" placeholder="Your Answer"></textarea>
                  <span id="time" style="display: none;" class="pull-right"></span>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="writeManyLetters">Write as many words as possible beginning with LETTER-M
                    in 60 seconds. Separate them with commas</label>
                  <label for="writeManyLetters">Write as many words as possible beginning with LETTER-P
                    in 60 seconds. Separate them with commas</label>
                  <textarea name="words['writeManyLetters']" id="writeManyLetters" rows="5"
                    class="form-control timedEntries" placeholder="Your Answer"></textarea>
                  <span id="time" style="display: none;" class="pull-right"></span>
                </div>
                <div class="f1-buttons" style="margin-top: 40px !important;">
                  <button type="button" class="btn btn-previous">
                    Previous
                  </button>
                  <button type="button" class="btn btn-next">Next</button>
                </div>
              </fieldset>
              <!-- Words 2 End -->
                <!-- Problems Starts -->
              <fieldset style="width: 80%;">
                <h4>
                  How often have you been bothered by any of the following
                  problems recently
                </h4>
                <div style="overflow-x: auto;">
                  <table class="table table-borderless table-striped">
                    <thead>
                      <tr>
                        <th style="width: 20%;"></th>
                        <th class="formTableHeader">
                          Not at all
                        </th>
                        <th class="formTableHeader">
                          Several days
                        </th>
                        <th class="formTableHeader">
                          More than half the days
                        </th>
                        <th class="formTableHeader">
                          Nearly everyday
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Little interest or pleasure in doing things
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Little interest or pleasure in doing things]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Little interest or pleasure in doing things]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Little interest or pleasure in doing things]"
                              value="More than half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Little interest or pleasure in doing things]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Feeling down, depressed or hopeless
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling down, depressed or hopeless]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling down, depressed or hopeless]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling down, depressed or hopeless]"
                              value="More than half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling down, depressed or hopeless]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Trouble falling or staying asleep or sleeping too
                          much
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Trouble falling or staying asleep]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Trouble falling or staying asleep]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Trouble falling or staying asleep]"
                              value="More than half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Trouble falling or staying asleep]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Feeling tired or having little energy
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling tired or having little energy]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling tired or having little energy]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling tired or having little energy]"
                              value="More than half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling tired or having little energy]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Poor appetite or overeating
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Poor appetite or overeating]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Poor appetite or overeating]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Poor appetite or overeating]"
                              value="More than half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Poor appetite or overeating]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Feeling bad about yourself or that you are a failure
                          or have let yourself or family down
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling bad about yourself or that you are a failure]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling bad about yourself or that you are a failure]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling bad about yourself or that you are a failure]"
                              value="More than half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Feeling bad about yourself or that you are a failure]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Trouble concentrating on things such as reading the
                          newspaper or watching television
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Trouble concentrating on things such as reading the newspaper]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Trouble concentrating on things such as reading the newspaper]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Trouble concentrating on things such as reading the newspaper]"
                              value="More than half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Trouble concentrating on things such as reading the newspaper]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Moving or speaking so slowly that other people could
                          not have noticed or the opposite-being so figety or
                          restless that you have been moving a lot more than
                          usual
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Moving or speaking so slowly that other people could not have noticed]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Moving or speaking so slowly that other people could not have noticed]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Moving or speaking so slowly that other people could not have noticed]"
                              value="More than half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Moving or speaking so slowly that other people could not have noticed]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Thoughts that you would be better off dead or of
                          hurting yourself
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Thoughts that you would be better off dead]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Thoughts that you would be better off dead]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Thoughts that you would be better off dead]"
                              value="More than half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="problems[How often have you been bothered by any of the following problems recently][Thoughts that you would be better off dead]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="f1-buttons">
                  <button type="button" class="btn btn-previous">
                    Previous
                  </button>
                  <button type="button" class="btn btn-next">Next</button>
                </div>
              </fieldset>
              <!-- Problems End -->
              <!-- Concerns Starts -->
              <fieldset style="width: 80%;">
                <h4>
                  How have you been concerned by the following problems
                </h4>
                <div style="overflow-x: auto;">
                  <table class="table table-borderless table-striped">
                    <thead>
                      <tr>
                        <th style="width: 20%;"></th>
                        <th class="formTableHeader">
                          Not at all sure
                        </th>
                        <th class="formTableHeader">
                          Several days
                        </th>
                        <th class="formTableHeader">
                          Over half the days
                        </th>
                        <th class="formTableHeader">
                          Nearly everyday
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Feeling nervous, anxious or on edge
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Feeling nervous, anxious]"
                              value="Not at all sure" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Feeling nervous, anxious]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Feeling nervous, anxious]"
                              value="Over half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Feeling nervous, anxious]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Not being able to stop or control worrying
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Not being able to stop or control worrying]"
                              value="Not at all sure" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Not being able to stop or control worrying]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Not being able to stop or control worrying]"
                              value="Over half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Not being able to stop or control worrying]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Worrying too much about different things
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Worrying too much about different things]"
                              value="Not at all sure" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Worrying too much about different things]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Worrying too much about different things]"
                              value="Over half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Worrying too much about different things]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Trouble relaxing
                        </td>
                        <td class="text-center vertical-align-diff">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Trouble relaxing]"
                              value="Not at all sure" />
                          </label>
                        </td>
                        <td class="text-center vertical-align-diff">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Trouble relaxing]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center vertical-align-diff">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Trouble relaxing]"
                              value="Over half the days" />
                          </label>
                        </td>
                        <td class="text-center vertical-align-diff">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Trouble relaxing]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Being so restless that its hard to sit still
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Being so restless that its hard to sit still]"
                              value="Not at all sure" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Being so restless that its hard to sit still]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Being so restless that its hard to sit still]"
                              value="Over half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Being so restless that its hard to sit still]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Becoming easily annoyed or irritable
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Becoming easily annoyed]"
                              value="Not at all sure" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Becoming easily annoyed or irritable]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Becoming easily annoyed or irritable]"
                              value="Over half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Becoming easily annoyed or irritable]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Feeling afraid as if something awful might happen
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Feeling afraid as if something awful might happen]"
                              value="Not at all sure" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Feeling afraid as if something awful might happen]"
                              value="Several days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Feeling afraid as if something awful might happen]"
                              value="Over half the days" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="concerns[How have you been concerned by the following problems][Feeling afraid as if something awful might happen]"
                              value="Nearly everyday" />
                          </label>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="f1-buttons">
                  <button type="button" class="btn btn-previous">
                    Previous
                  </button>
                  <button type="button" class="btn btn-next">Next</button>
                </div>
              </fieldset>
              <!-- Concerns End -->
              <!-- Ratings Starts -->
              <fieldset style="width: 80%;">
                <h4>
                  Please kindly rate the severity of your sleep patterns
                  recently
                </h4>
                <div style="overflow-x: auto;">
                  <table class="table table-borderless table-striped">
                    <thead>
                      <tr>
                        <th style="width: 20%;"></th>
                        <th class="formTableHeader">
                          None
                        </th>
                        <th class="formTableHeader">
                          Mild
                        </th>
                        <th class="formTableHeader">
                          Moderate
                        </th>
                        <th class="formTableHeader">
                          Severe
                        </th>
                        <th class="formTableHeader">
                          Very Severe
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Difficult falling asleep
                        </td>
                        <td class="text-center vertical-align-diff">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently'][Difficult falling asleep]"
                              value="None" class="" />
                          </label>
                        </td>
                        <td class="text-center vertical-align-diff">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Difficult falling asleep]"
                              value="Mild" />
                          </label>
                        </td>
                        <td class="text-center vertical-align-diff">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Difficult falling asleep]"
                              value="Moderate" />
                          </label>
                        </td>
                        <td class="text-center vertical-align-diff">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Difficult falling asleep]"
                              value="Severe" />
                          </label>
                        </td>
                        <td class="text-center vertical-align-diff">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Difficult falling asleep]"
                              value="Very Severe" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Difficult staying asleep
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Difficult staying asleep]"
                              value="None" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Difficult staying asleep]"
                              value="Mild" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Difficult staying asleep]"
                              value="Moderate" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Difficult staying asleep]"
                              value="Severe" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Difficult staying asleep']"
                             value="Very Severe" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Problems waking up too early
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Problems waking up too early]"
                              value="None" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Problems waking up too early]"
                              value="Mild" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Problems waking up too early]"
                              value="Moderate" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Problems waking up too early]"
                              value="Severe" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Please kindly rate the severity of your sleep patterns recently][Problems waking up too early]"
                              value="Very Severe" />
                          </label>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="form-group" style="margin: 20px auto 20px auto;">
                  <h4></h4>
                  How SATISFIED/DISSATISFIED are you with your CURRENT sleep
                  pattern
                  </h4>
                  <div class="radio">
                    <label><input type="radio"
                        name="ratings[How SATISFIED/DISSATISFIED are you with your CURRENT sleep pattern]"
                        value="Very satisfied"><span>Very satisfied</span></label>
                  </div>
                  <div class="radio">
                    <label><input type="radio"
                        name="ratings[How SATISFIED/DISSATISFIED are you with your CURRENT sleep pattern]"
                        value="Satisfied"><span>Satisfied</span></label>
                  </div>
                  <div class="radio">
                    <label><input type="radio"
                        name="ratings[How SATISFIED/DISSATISFIED are you with your CURRENT sleep pattern]"
                        value="Moderately Satisfied"><span>Moderately Satisfied</span></label>
                  </div>
                  <div class="radio">
                    <label><input type="radio"
                        name="ratings[How SATISFIED/DISSATISFIED are you with your CURRENT sleep pattern]"
                        value="Dissatisfied"><span>Dissatisfied</span></label>
                  </div>
                  <div class="radio">
                    <label><input type="radio"
                        name="ratings[How SATISFIED/DISSATISFIED are you with your CURRENT sleep pattern]"
                        value="Very dissatisfied"><span>Very dissatisfied</span></label>
                  </div>
                </div>
                <h4>
                  Kindly answer to the best of your knowledge
                </h4>
                <div style="overflow-x: auto;">
                  <table class="table table-borderless table-striped">
                    <thead>
                      <tr>
                        <th style="width: 20%;"></th>
                        <th class="formTableHeader">
                          Not at all
                        </th>
                        <th class="formTableHeader">
                          A little
                        </th>
                        <th class="formTableHeader">
                          Somewhat
                        </th>
                        <th class="formTableHeader">
                          Much
                        </th>
                        <th class="formTableHeader">
                          Very Much
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          To what extent do you consider your sleep problem to INTERFERE with your daily functioning
                          (e.g. daytime fatigue, mood, ability to function at work/daily chores, concentration, memory,
                          mood etc) CURRENTLY
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][To what extent do you consider your sleep problem to INTERFERE with your daily functioning]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][To what extent do you consider your sleep problem to INTERFERE with your daily functioning]"
                              value="Somewhat" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][To what extent do you consider your sleep problem to INTERFERE with your daily functioning]"
                              value="Much" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][To what extent do you consider your sleep problem to INTERFERE with your daily functioning]"
                              value="Very Much" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][To what extent do you consider your sleep problem to INTERFERE with your daily functioning]"
                              value="Very Much" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          How NOTICEABLE to others do you think your sleep problems is in terms of impairing the quality
                          of your life
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][How NOTICEABLE to others do you think your sleep problems is]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][How NOTICEABLE to others do you think your sleep problems is]"
                              value="Somewhat" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][How NOTICEABLE to others do you think your sleep problems is]"
                              value="Much" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][How NOTICEABLE to others do you think your sleep problems is]"
                              value="Very Much" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][How NOTICEABLE to others do you think your sleep problems is]"
                              value="Very Much" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          How WORRIED/DISTRESSED are you about your current sleep problem
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][How WORRIED/DISTRESSED are you about your current sleep problem]"
                              value="Not at all" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][How WORRIED/DISTRESSED are you about your current sleep problem]"
                              value="A little" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][How WORRIED/DISTRESSED are you about your current sleep problem]"
                              value="Somewhat" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][How WORRIED/DISTRESSED are you about your current sleep problem]"
                              value="Much" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="ratings[Kindly answer to the best of your knowledge][How WORRIED/DISTRESSED are you about your current sleep problem]"
                              value="Very Much" />
                          </label>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="f1-buttons">
                  <button type="button" class="btn btn-previous">
                    Previous
                  </button>
                  <button type="button" class="btn btn-next">Next</button>
                </div>
              </fieldset>
              <!-- Ratings End -->
              <!-- Activity Starts -->
              <fieldset style="width: 80%;">
                <div class="form-group">
                  <label>Do you play video game</label><br />
                  <label class="radio-inline" for="playVideoGameyes">
                    <input type="radio" name="activity[Do you play video game]" id="playVideoGameyes" value="Yes"
                      onclick="toggleConditionalDivs(event, $(this))" />
                    <span>Yes</span>
                  </label>
                  <label class="radio-inline" for="playVideoGameno">
                    <input type="radio" name="activity[Do you play video game]" id="playVideoGameno" value="No"
                      onclick="toggleConditionalDivs(event, $(this))" />
                    <span>No</span>
                  </label>
                </div>
                <div class="form-group row col-md-12 conditionalDivs">
                  <h4>What devices do you use in playing video game. Select as many as applicable</h4>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What devices do you use in playing video game. Select as many as applicable][]"
                        value="Computer/Laptop"><span>Computer/Laptop</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What devices do you use in playing video game. Select as many as applicable][]"
                        value="Play Station"><span>Play Station</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What devices do you use in playing video game. Select as many as applicable][]"
                        value="Xbox"><span>Xbox</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" value="Other"
                        onchange="toggleOtherTextbox(event, $(this))"><span>Other</span></label>
                  </div>
                  <div class="col-md-4 otherTextBox">
                    <input type="text" class="form-control" disabled placeholder="Your Answer"
                      name="activity[What devices do you use in playing video game. Select as many as applicable][]">
                  </div>
                  <br>
                  <h4>What kind of games do you play. Select as many as applicable</h4>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What kind of games do you play. Select as many as applicable][]"
                        value="Computer/Laptop"><span>Action</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What kind of games do you play. Select as many as applicable][]"
                        value="Play Station"><span>Adventure</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What kind of games do you play. Select as many as applicable][]"
                        value="Xbox"><span>Role play</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What kind of games do you play. Select as many as applicable][]"
                        value="Sports"><span>Sports</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What kind of games do you play. Select as many as applicable][]"
                        value="Simulations"><span>Simulations</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What kind of games do you play. Select as many as applicable][]"
                        value="Strategy"><span>Strategy</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What kind of games do you play. Select as many as applicable][]"
                        value="Shooter"><span>Shooter</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What kind of games do you play. Select as many as applicable][]"
                        value="Puzzle"><span>Puzzle</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" value="Other"
                        onchange="toggleOtherTextbox(event, $(this))"><span>Other</span></label>
                  </div>
                  <div class="col-md-4 otherTextBox">
                    <input type="text" class="form-control" disabled placeholder="Your Answer"
                      name="activity[What kind of games do you play. Select as many as applicable][]">
                  </div>
                </div>

                <div class="form-group">
                  <label>Do you use the internet</label><br />
                  <label class="radio-inline" for="useTheInternetyes">
                    <input type="radio" name="activity[Do you use the internet]" id="useTheInternetyes" value="Yes"
                      onclick="toggleConditionalDivs(event, $(this))" />
                    <span>Yes</span>
                  </label>
                  <label class="radio-inline" for="useTheInternetno">
                    <input type="radio" name="activity[Do you use the internet]" id="useTheInternetno" value="No"
                      onclick="toggleConditionalDivs(event, $(this))" />
                    <span>No</span>
                  </label>
                </div>
                <div style="overflow-x: auto;" class="conditionalDivs">
                  <h4>Kindly select the most applicable</h4>
                  <table class="table table-borderless table-striped">
                    <thead>
                      <tr>
                        <th style="width: 20%;"></th>
                        <th class="formTableHeader">
                          Not Applicable
                        </th>
                        <th class="formTableHeader">
                          1-3 hours
                        </th>
                        <th class="formTableHeader">
                          4-6 hours
                        </th>
                        <th class="formTableHeader">
                          7-9 hours
                        </th>
                        <th class="formTableHeader">
                          10 hours or more
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          How often do you play VIDEO GAME per day
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="activity[Kindly select the most applicable 1][How often do you play VIDEO GAME per day]"
                              value="Not Applicable" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="activity[Kindly select the most applicable 1][How often do you play VIDEO GAME per day]"
                              value="1-3 hours" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="activity[Kindly select the most applicable 1][How often do you play VIDEO GAME per day]"
                              value="4-6 hours" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="activity[Kindly select the most applicable 1][How often do you play VIDEO GAME per day]"
                              value="7-9 hours" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="activity[Kindly select the most applicable 1]['How often do you play VIDEO GAME per day]"
                              value="10 hours or more" />
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          How often do you spend on the INTERNET per day
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="activity[Kindly select the most applicable 2][How often do you spend on the INTERNET per day]"
                              value="Not Applicable" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="activity[Kindly select the most applicable 2][How often do you spend on the INTERNET per day]"
                              value="1-3 hours" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="activity[Kindly select the most applicable 2][How often do you spend on the INTERNET per day]"
                              value="4-6 hours" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="activity[Kindly select the most applicable 2][How often do you spend on the INTERNET per day]"
                              value="7-9 hours" />
                          </label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio"
                              name="activity[Kindly select the most applicable 2][How often do you spend on the INTERNET per day]"
                              value="10 hours or more" />
                          </label>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="form-group row col-md-12">
                  <h4>What activities do you often engage on the internet. Select as many as applicable</h4>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What activities do you often engage on the internet. Select as many as applicable][]"
                        value="Entertainment"><span>Entertainment</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What activities do you often engage on the internet. Select as many as applicable][]"
                        value="Educational"><span>Educational</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What activities do you often engage on the internet. Select as many as applicable][]"
                        value="Communication"><span>Communication</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What activities do you often engage on the internet. Select as many as applicable][]"
                        value="Health related issues"><span>Health related issues</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[What activities do you often engage on the internet. Select as many as applicable][]"
                        value="Business"><span>Business</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" value="Other"
                        onchange="toggleOtherTextbox(event, $(this))"><span>Other</span></label>
                  </div>
                  <div class="col-md-4 otherTextBox">
                    <input type="text" class="form-control" disabled placeholder="Your Answer"
                      name="activity[What activities do you often engage on the internet. Select as many as applicable][]">
                  </div>
                </div>
                <div class="form-group">
                  <label>Have you noticed any physical, psychological, academic or work effects on you due to video game
                    playing or internet activity</label><br />
                  <label class="radio-inline" for="gamePlayEffectyes">
                    <input type="radio"
                      name="activity[Have you noticed any physical, psychological, academic or work effects on you due to video game playing or internet ativity']"
                      id="gamePlayEffectyes" value="Yes" onclick="toggleConditionalDivs(event, $(this))" />
                    <span>Yes</span>
                  </label>
                  <label class="radio-inline" for="gamePlayEffectno">
                    <input type="radio"
                      name="activity[Have you noticed any physical, psychological, academic or work effects on you due to video game playing or internet ativity']"
                      id="gamePlayEffectno" value="No" onclick="toggleConditionalDivs(event, $(this))" />
                    <span>No</span>
                  </label>
                </div>
                <div class="form-group row col-md-12 conditionalDivs">
                  <h4>Are the following some of the effects as a result of video game playing or internet use. Select as
                    many as applicable</h4>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[Are the following some of the effects as a result of video game playing or internet use. Select as many as applicable][]"
                        value="Entertainment"><span>lack of sleep</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[Are the following some of the effects as a result of video game playing or internet use. Select as many as applicable][]"
                        value="Educational"><span>Aggressive thoughts/behavior</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[Are the following some of the effects as a result of video game playing or internet use. Select as many as applicable][]"
                        value="Communication"><span>Fatigue/Migraines</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[Are the following some of the effects as a result of video game playing or internet use. Select as many as applicable][]"
                        value="Health related issues"><span>Financial challenges</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[Are the following some of the effects as a result of video game playing or internet use. Select as many as applicable][]"
                        value="Depression"><span>Depression</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[Are the following some of the effects as a result of video game playing or internet use. Select as many as applicable][]"
                        value="Anxiety"><span>Anxiety</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[Are the following some of the effects as a result of video game playing or internet use. Select as many as applicable][]"
                        value="Socially isolated"><span>Socially isolated</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[Are the following some of the effects as a result of video game playing or internet use. Select as many as applicable][]"
                        value="Problem solving skills"><span>Problem solving skills</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"
                        name="activity[Are the following some of the effects as a result of video game playing or internet use. Select as many as applicable][]"
                        value="Improved decision skills"><span>Improved decision skills</span></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" value="Other"
                        onchange="toggleOtherTextbox(event, $(this))"><span>Other</span></label>
                  </div>
                  <div class="col-md-4 otherTextBox">
                    <input type="text" class="form-control" disabled placeholder="Your Answer"
                      name="activity[Are the following some of the effects as a result of video game playing or internet use. Select as many as applicable][]">
                  </div>
                </div>
                <div class="f1-buttons">
                  <button type="submit" class="btn btn-submit">Submit</button>
                </div>
              </fieldset>
              <!-- Activity End -->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Javascript -->
  <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }} "></script>
  <script src="{{ asset('assets/js/jquery.backstretch.min.js') }} "></script>
  <script src="{{ asset('assets/js/retina-1.1.0.min.js') }} "></script>
  <script src="{{ asset('assets/js/scripts.js') }} "></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
  <!--[if lt IE 10]>
      <script src="assets/js/placeholder.js"></script>
    <![endif]-->
</body>

</html>
