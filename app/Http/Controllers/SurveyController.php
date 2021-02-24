<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Exports\ResponsesExport;
use Excel;

class SurveyController extends Controller
{
    public function submit(Request $request)
    {
        try {
            DB::table('responses')->insert([
                'answers' => json_encode($request->except('_token')),
                'added_on' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
            Log::info('Response saved successfully');
            return Redirect::back()->with('thankYou', "");
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            return Redirect::back()->with('error', "");
        }
    }
    public function getReports()
    {
        try {
            $result = [];
            $responses = DB::table('responses')->get();
            foreach ($responses as $response) {
                $formattedResponses = [];
                $answers = json_decode($response->answers);
                $formattedResponses = [\Carbon\Carbon::createFromDate($response->added_on)->format('Y-m-d')];
                $formattedResponses = array_merge($formattedResponses, $this->getObjectValues($answers->bioInfo), $this->getObjectValues($answers->test));

                $words = (array)$answers->words;
                $wordsCount = $this->getWordsCount($words["'writeManyWords'"]); $lettersCount = $this->getWordsCount($words["'writeManyLetters'"]);
                array_push($formattedResponses, $words["'writeManyWords'"], $wordsCount, $words["'writeManyLetters'"], $lettersCount);

                $problems = ((array)$answers->problems);
                $formattedResponses = array_merge($formattedResponses, $this->getObjectValues($problems['How often have you been bothered by any of the following problems recently'], true));

                $concerns = ((array)$answers->concerns);
                $formattedResponses = array_merge($formattedResponses, $this->getObjectValues($concerns['How have you been concerned by the following problems'], true));

                $ratings = ((array)$answers->ratings);
                $sleepData = (array)$ratings['Please kindly rate the severity of your sleep patterns recently'];
                if (sizeof($sleepData) < 3) {
                    $sleepData = array_merge($sleepData, (array)reset($ratings));
                }
                $formattedResponses = array_merge($formattedResponses, $this->getObjectValues($sleepData));
                array_push($formattedResponses, $ratings['How SATISFIED/DISSATISFIED are you with your CURRENT sleep pattern']);

                $formattedResponses = array_merge($formattedResponses, $this->getObjectValues($ratings['Kindly answer to the best of your knowledge']));

                $activity = ((array)$answers->activity);
                array_push($formattedResponses, $activity['Do you play video game']);
                if ($activity['Do you play video game'] === 'Yes') {
                    array_push($formattedResponses, $this->stringifyArray($activity['What devices do you use in playing video game. Select as many as applicable']), $this->stringifyArray($activity['What kind of games do you play. Select as many as applicable']));
                } else {
                    array_push($formattedResponses, '', '');
                }
                array_push($formattedResponses, $activity['Do you use the internet']);
                if ($activity['Do you use the internet'] === 'Yes') {
                    $act1 = (array)$activity['Kindly select the most applicable 1'];
                    $act2 = (array)$activity['Kindly select the most applicable 2'];
                    array_push($formattedResponses, $act1['How often do you play VIDEO GAME per day'], $act2['How often do you spend on the INTERNET per day']);
                    array_push($formattedResponses, $this->stringifyArray($activity['What activities do you often engage on the internet. Select as many as applicable']));
                } else {
                    array_push($formattedResponses, '', '', '');
                }
                array_push($formattedResponses, $activity["Have you noticed any physical, psychological, academic or work effects on you due to video game playing or internet ativity'"]);
                if ($activity["Have you noticed any physical, psychological, academic or work effects on you due to video game playing or internet ativity'"] === 'Yes') {
                    array_push($formattedResponses, $this->stringifyArray($activity['Are the following some of the effects as a result of video game playing or internet use. Select as many as applicable']));
                } else {
                    array_push($formattedResponses, '');
                }
                array_push($result, $formattedResponses);
            }
            $export = new ResponsesExport([
                $this->getHeaders(),
                $result
            ]);
            return Excel::download($export, 'responses.xlsx');
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            return Redirect::back()->with('error', "");
        }
    }
    private function getWordsCount($string) {
        return sizeof(preg_split('/\s+/', $string));
    }
    private function filterCustomerData($str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
    private function stringifyArray($array)
    {
        $result = '';
        foreach ($array as $key => $value) {
            $result .= $value;
            if ($key !== array_key_last($array) || sizeof($array) > 1) {
                $result .= ', ';
            }
        }
        return $result;
    }
    private function getObjectValues($object, $convertValues = false)
    {
        $array = (array)$object;
        $values = [];
        $sum = 0;
        foreach (array_keys($array) as $key) {
            $value = '0';

            if($convertValues) {
                switch ($array[$key]) {
                    case 'Not at all':
                        $value = '0';
                        break;
                    case 'Several days':
                        $value = 1;
                        break;
                    case 'More than half the days':
                        $value = 2;
                        break;
                        case 'Nearly everyday':
                            $value = 3;
                            break;
                    default:
                        break;
                }
                $sum+=$value;
            }
            array_push($values, $convertValues ? $value : $array[$key]);
        }
        $convertValues ? array_push($values, $sum > 0 ? $sum : '0'): "";
        return $values;
    }
    private function getHeaders()
    {
        return  [
            "Added On",
            'Age',
            'Education',
            "Country",
            "Gender",
            "Profession",
            "Language",
            "Test Score",
            "Written Words",
            'Total',
            "Written Letters",
            "Total",
            "Little interest or pleasure in doing things(How often have you been bothered by any of the following problems recently)",
            "Feeling down, depressed or hopeless(How often have you been bothered by any of the following problems recently)",
            "Trouble falling or staying asleep(How often have you been bothered by any of the following problems recently)",
            'Feeling tired or having little energy(How often have you been bothered by any of the following problems recently)',
            'Poor appetite or overeating(How often have you been bothered by any of the following problems recently)',
            'Feeling bad about yourself or that you are a failure(How often have you been bothered by any of the following problems recently)',
            'Trouble concentrating on things such as reading the newspaper(How often have you been bothered by any of the following problems recently)',
            'Moving or speaking so slowly that other people could not have noticed(How often have you been bothered by any of the following problems recently)',
            'Thoughts that you would be better off dead(How often have you been bothered by any of the following problems recently)',
            'Total',
            'Feeling nervous, anxious(How have you been concerned by the following problems)',
            'Not being able to stop or control worrying(How have you been concerned by the following problems)',
            'Worrying too much about different things(How have you been concerned by the following problems)',
            'Trouble relaxing(How have you been concerned by the following problems)',
            'Being so restless that its hard to sit still(How have you been concerned by the following problems)',
            'Becoming easily annoyed or irritable(How have you been concerned by the following problems)',
            'Feeling afraid as if something awful might happen(How have you been concerned by the following problems)',
            'Total',
            'Difficult falling asleep(Please kindly rate the severity of your sleep patterns recently)',
            'Difficult staying asleep(Please kindly rate the severity of your sleep patterns recently)',
            'Problems waking up too early(Please kindly rate the severity of your sleep patterns recently)',
            'How SATISFIED/DISSATISFIED are you with your current sleep pattern',
            'To what extent do you consider your sleep problem to INTERFERE with your daily functioning',
            'How NOTICEABLE to others do you think your sleep problems is',
            'How WORRIED/DISTRESSED are you about your current sleep problem',
            'Do you play video game',
            'What devices do you use in playing video game',
            'What kind of games do you play',
            'Do you use the internet',
            'How often do you play VIDEO GAME per day',
            'How often do you spend on the INTERNET per day',
            'What activities do you often engage on the internet',
            'Have you noticed any physical, psychological, academic or work effects on you due to video game playing or internet ativity',
            'Are the following some of the effects as a result of video game playing or internet use'

        ];
    }
}
