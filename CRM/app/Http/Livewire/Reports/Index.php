<?php

namespace App\Http\Livewire\Reports;

/********************************************
 * Author: Nhi Banh
 * Purpose: Report page component
 *******************************************/

use Livewire\Component;
use App\Models\Contact;
use App\Models\Task;
use App\Models\ContactInfo;
use App\Models\ContactNote;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\WithPagination;
use Carbon\Carbon;

class Index extends Component
{
    //Colors for the graphs
    public $colors = [
        '#103062',
        '#00FFFF',
        '#006400',
        '#FF69B4',
        '#FF8C00',
        '#A0522D',
        '#6A5ACD',
        '#800000',
        '#708090',
        '#9966CC',
    ];
    public function render()
    {
        //get the current user
        $currentUser =  Auth::user()->id;

        //get all users
        $users = User::all();

        //get all tasks
        $tasks = Task::all();

        //get all tasks by the current user
        $tasksByUser = $tasks->where('user_id', $currentUser);

        //get all contacts
        $contacts = Contact::all();

        //get the contacts by the current user
        $contactsByUser = $contacts->where('user_id', $currentUser);

        //get all contact notes
        $contactNotes = ContactNote::all();

        //get all the notes by the current user
        $contactNotesByAuthor = $contactNotes->where('author', $currentUser);

        //using LivewireCharts to create Pie Chart for contacts by user
        $contactsByUserPieChart = $contacts->groupBy('user_id')
            ->reduce(
                function ($contactsByUserPieChart, $data) {

                    $userid = $data->first()->user_id;
                    $type = $this->getAuthorName($userid);
                    //dd($type);
                    $value = $data->count('id');
                    //title, value, color, extras
                    return $contactsByUserPieChart->addSlice($type, $value, $this->colors[$userid % 10]);
                },
                LivewireCharts::pieChartModel()
                    ->setTitle('Contacts By User')
                    ->setAnimated(true)
                    ->setType('pie')
                    //->withOnSliceClickEvent('onSliceClick')
                    //->withoutLegend()
                    ->legendPositionBottom()
                    ->legendHorizontallyAlignedCenter()
                    ->setDataLabelsEnabled(true)
                //->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            );

        //using LivewireCharts to create Pie Chart for tasks by user
        $tasksByUserPieChart = $tasks->groupBy('user_id')
            ->reduce(
                function ($tasksByUserPieChart, $data) {

                    $userid = $data->first()->user_id;
                    $type = $this->getAuthorName($userid);

                    //dd($type);
                    $value = $data->count('id');
                    //title, value, color, extras
                    return $tasksByUserPieChart->addSlice($type, $value, $this->colors[$userid % 10]);
                },
                LivewireCharts::pieChartModel()
                    ->setTitle('Tasks By User')
                    ->setAnimated(true)
                    ->setType('pie')
                    //->withOnSliceClickEvent('onSliceClick')
                    //->withoutLegend()
                    ->legendPositionBottom()
                    ->legendHorizontallyAlignedCenter()
                    ->setDataLabelsEnabled(true)
                //->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            );

        //using LivewireCharts to create Column Chart for contact notes
        $contactNotesByAuthorColumnChart = $contactNotes->groupBy('author')
            ->reduce(
                function ($columnChartModel, $data) {

                    $userid = $data->first()->author;
                    $type = $this->getAuthorName($userid);
                    $value = $data->count('id');

                    return $columnChartModel->addColumn($type, $value, $this->colors[$userid % 10]);
                },
                LivewireCharts::columnChartModel()
                    ->setTitle('Contact Notes By User')
                    ->setAnimated(true)
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility(false)
                    ->setDataLabelsEnabled(true)
                    //->setOpacity(0.25)
                    //->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
                    ->setColumnWidth(90)
                    ->withGrid()
            );

        //pass all the data to the view
        return view('livewire.reports.index', [
            'users' => $users,
            'tasks' => $tasks,
            'tasksByUser' => $tasksByUser,
            'contacts' => $contacts,
            'contactsByUser' => $contactsByUser,
            'tasksByUser' => $tasksByUser,
            'contactNotes' => $contactNotes,
            'contactNotesByAuth' => $contactNotesByAuthor,
            'contactsByUserPieChart' => $contactsByUserPieChart,
            'tasksByUserPieChart' => $tasksByUserPieChart,
            'contactNotesByAuthorColumnChart' => $contactNotesByAuthorColumnChart
        ]);
    }

    public function getAuthorName($id)
    {
        //find the user 
        $user = User::findOrFail($id);

        //return the user name
        return $user->name;
    }
}
