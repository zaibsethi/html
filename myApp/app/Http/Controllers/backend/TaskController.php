<?php
//
//namespace App\Http\Controllers\backend;
//
//use App\Http\Controllers\Controller;
//use App\Models\Task;
//use Carbon\Carbon;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class TaskController extends Controller
//{
//    public function addTask()
//    {
//        return view('backend.task.add-task');
//    }
//
//    public function createTask(Request $request)
//    {
//        $getAllRequestData = $request->all();
//        $getAllRequestData['belong_to_gym'] = Auth::user()->belong_to_gym;
//        Task::create($getAllRequestData);
//        return redirect(route('addTask'))->with('success', 'Task created successfully.');
//    }
//
//    public function taskList()
//    {
//        $cDate = now()->addDay(10)->format('Y-m-d');
//        $taskData = Task::where('belong_to_gym', Auth::user()->belong_to_gym)->where('status', 'pending')->where('task_date', '<=', $cDate)->get();
//        return view('backend.task.task-list', compact('taskData'));
//    }
//
//    public function updateStatus($id)
//    {
//        $allTaskData = Task::where('id', $id)->get();
//        foreach ($allTaskData as $allTaskDataVar) {
//            if ($allTaskDataVar->task_type == "daily") {
//                $addDays = Carbon::Parse($allTaskDataVar->task_date)->addDay(1)->format('Y-m-d');
//                Task::where('id', $id)->update(['status' => "pending", 'task_date' => $addDays]);
//                return redirect(route('taskList'))->with('success', 'Task complete.');
//            } elseif ($allTaskDataVar->task_type == "weekly") {
//                $addDays = Carbon::Parse($allTaskDataVar->task_date)->addDay(7)->format('Y-m-d');
//                Task::where('id', $id)->update(['status' => "pending", 'task_date' => $addDays]);
//                return redirect(route('taskList'))->with('success', 'Task complete.');
//            } elseif ($allTaskDataVar->task_type == "monthly") {
//                $addDays = Carbon::Parse($allTaskDataVar->task_date)->addMonth(1)->format('Y-m-d');
//                Task::where('id', $id)->update(['status' => "pending", 'task_date' => $addDays]);
//                return redirect(route('taskList'))->with('success', 'Task complete.');
//            } elseif ($allTaskDataVar->task_type == "yearly") {
//                $addDays = Carbon::Parse($allTaskDataVar->task_date)->addYear(1)->format('Y-m-d');
//                Task::where('id', $id)->update(['status' => "pending", 'task_date' => $addDays]);
//                return redirect(route('taskList'))->with('success', 'Task complete.');
//            } elseif ($allTaskDataVar->task_type == "one_time") {
//                Task::where('id', $id)->update(['status' => "complete"]);
//                return redirect(route('taskList'))->with('success', 'Task complete.');
//            }
//        }
//
////        $a = Task::where('id', $id)->update(['status' => "complete"]);
////        return redirect(route('taskList'))->with('success', 'Task complete.');
//    }
//
//
//    public function editTask($id)
//    {
//        $taskData = Task::find($id);
//        return view('backend.task.edit-task', compact('taskData'));
//    }
//
//    public function updateTask(Request $request, Task $id)
//    {
//        $taskRequestData = $request->all();
//        $id->update($taskRequestData);
//        return redirect(route('taskList'))->with('success', 'Task updated successfully.');
//    }
//}
